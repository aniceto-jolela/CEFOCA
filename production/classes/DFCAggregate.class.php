<?php
/**
* Copyright (c) 2009, Andreas Schnaiter
*
* All rights reserved.
*
* Redistribution and use in source and binary forms, with or without
* modification, are permitted provided that the following conditions are met:
*
* 1. Redistributions of source code must retain the above copyright notice,
*    this list of conditions and the following disclaimer.
* 2. Redistributions in binary form must reproduce the above copyright notice,
*    this list of conditions and the following disclaimer in the documentation
*    and/or other materials provided with the distribution.
* 3. Neither the name of  Andreas Schnaiter nor the names
*    of its contributors may be used to endorse or promote products derived
*    from this software without specific prior written permission.
*
* THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
* AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
* IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
* ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
* LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
* CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
* SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
* INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
* CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
* ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
* POSSIBILITY OF SUCH DAMAGE.
*/

/**
 * filter aggregator
 */
class DFCAggregate extends ArrayObject implements DFCInterface {
	//public static $queries=0;
	/**
	 * weather to and conditions
	 *
	 * @var bool
	 */
	private $and=true;
	/**
	 * uniq id to identify filter
	 *
	 * @var string
	 */
	private $uniqId;

	/**
	 * CTOR
	 *
	 * @param array $filters
	 * @param bool $and
	 */
	function __construct($filters, $and=true) {
		parent::__construct(array());
		if (!is_array($filters)) {
			$filters=array($filters);
		}
		$this->appendFilters($filters);
		$this->and=$and;
	}

	/**
	 * get anded
	 *
	 * @return bool
	 */
	public function getAnd() {
		return $this->and;
	}

	/**
	 * set anded
	 *
	 * @param bool $and
	 */
	public function setAnd($and) {
		$this->and=$and;
	}

	/**
	 * get unqiq id of filter
	 *
	 * @return string
	 */
	public function getUniqId() {
		return $this->uniqId;
	}

	/**
	 * set unqiq id of filter
	 *
	 * @param string $uniqId
	 */
	public function setUniqId($uniqId) {
		$this->uniqId=$uniqId;
		$i=0;
		/* @var  $dfc DFCInterface */
		foreach ($this as $dfc) {
			$dfc->setUniqId($this->getUniqId() . '_' . $i++);
		}
	}

	/**
	 * build sql WHERE statement
	 *
	 * @param Db2PhpEntity $entity
	 * @param bool $fullyQualifiedNames
	 * @param bool $prependWhere
	 * @return string
	 */
	public function buildSqlWhere(Db2PhpEntity $entity, $fullyQualifiedNames=true, $prependWhere=false) {
		$sql=null;
		if (0==$this->count()) {
			return null;
		}
		if ($prependWhere) {
			$sql.=' WHERE ';
		}
		$andString=$this->getAnd() ? ' AND ' : ' OR ';
		$cnt=0;
		/* @var $dfcInterface DFCInterface */
		foreach ($this->getIterator() as $dfcInterface) {
			$filterSql=$dfcInterface->buildSqlWhere($entity, $fullyQualifiedNames);
			if (null===$filterSql) {
				continue;
			}
			if (0!=$cnt++) {
				$sql.=$andString;
			}
			if ($dfcInterface instanceof DFCAggregate) {
				$sql.='(' . $dfcInterface->buildSqlWhere($entity, $fullyQualifiedNames) . ')';
			} else {
				$sql.=$dfcInterface->buildSqlWhere($entity, $fullyQualifiedNames);
			}
		}
		if (0==$cnt) {
			return null;
		}
		return $sql;
	}

	/**
	 * bind values to statement
	 *
	 * @param Db2PhpEntity $entity
	 * @param PDOStatement $stmt
	 */
	public function bindValuesForFilter(Db2PhpEntity $entity, PDOStatement &$stmt) {
		//++self::$queries;
		/* @var $dfcInterface DFCInterface */
		foreach ($this->getIterator() as $dfcInterface) {
			$sql.=$dfcInterface->bindValuesForFilter($entity, $stmt);
		}
	}

	/**
	 *
	 *
	 * @param DFCInterface $value
	 */
	public function append($value) {
		$value->setUniqId($this->getUniqId() . '_' . $this->count());
		parent::append($value);
	}

	/**
	 * append filters
	 *
	 * @param array<int,DFC> $filters
	 */
	public function appendFilters(array $filters) {
		$cnt=$this->count();
		/* @var $filter DFC */
		foreach ($filters as $fieldId=>$filter) {
			if ($filter instanceof DFCInterface) {
				$dfc=$filter;
			} else {
				$dfc=new DFC($fieldId, $filter, DFC::EXACT);
			}
			$dfc->setUniqId($this->getUniqId() . '_' . ++$i);
			parent::append($dfc);
		}
	}

}
?>