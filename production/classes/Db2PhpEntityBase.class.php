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
 * base class for entity classes
 */
abstract class Db2PhpEntityBase implements Db2PhpEntity {

	/**
	 * store for old instance after object has been modified
	 *
	 * @var Db2PhpEntityBase
	 */
	private $oldInstance=null;

	/**
	 * get old instance if this has been modified, otherwise return null
	 *
	 * @return Db2PhpEntityBase
	 */
	public function getOldInstance() {
		return $this->oldInstance;
	}

	/**
	 * called when the field with the passed id has changed
	 *
	 * @param int $fieldId
	 * @param mixed $oldValue
	 * @param mixed $newValue
	 */
	protected function notifyChanged($fieldId, $oldValue, $newValue) {
		if (null===$this->oldInstance) {
			$this->oldInstance=clone $this;
			$this->oldInstance->notifyPristine();
		}
	}

	/**
	 * return true if this instance has been modified since the last notifyPristine() call
	 *
	 * @return bool
	 */
	public function isChanged() {
		return null!==$this->oldInstance;
	}

	/**
	 * return array with the field id as index and the new value as value of values which have been changed since the last notifyPristine call
	 *
	 * @return array
	 */
	public function getFieldsValuesChanged() {
		$changed=array();
		if (!$this->isChanged()) {
			return $changed;
		}
		$old=$this->oldInstance->toArray();
		$new=$this->toArray();
		foreach ($old as $fieldId=>$value) {
			if ($new[$fieldId]!==$value) {
				$changed[$fieldId]=$new[$fieldId];
			}
		}
		return $changed;
	}

	/**
	 * return array with the field ids of values which have been changed since the last notifyPristine call
	 *
	 * @return array
	 */
	public function getFieldsChanged() {
		return array_keys($this->getFieldsValuesChanged());
	}

	/**
	 * set this instance into pristine state
	 */
	public function notifyPristine() {
		$this->oldInstance=null;
	}

	/**
	 * get object as string
	 *
	 * @return string
	 */
	public function __toString() {
		$s=null;
		foreach ($this->toHash() as $fieldName=>$value) {
			$s.=$fieldName . ": " . $value . "\n";
		}
		return $s;
	}
	
	/**
	 * create hash from dom node
	 *
	 * @param DOMNode $node
	 * @param array $fieldNames
	 * @return array
	 */
	protected static function domNodeToHash($node, $fieldNames, $defaultValues=null, $fieldTypes=null) {
		$result=array();
		foreach ($node->childNodes as $child) {
			if ($child instanceof DOMElement && in_array($child->localName, $fieldNames)) {
				if (0==strlen($child->nodeValue) && null!==$defaultValues) {
					$result[$child->localName]=$defaultValues[array_search($child->localName, $fieldNames)];
				} else {
					$result[$child->localName]=$child->nodeValue;
				}
			}
		}
		return $result;
	}
	
	/**
	 * create DOM document from passed hash
	 *
	 * @param array $hash
	 * @param string $rootNodeName 
	 * @return DOMDocument
	 */
	protected static function hashToDomDocument($hash, $rootNodeName) {
		$doc=new DOMDocument();
		$root=$doc->createElement($rootNodeName);
		foreach ($hash as $fieldName=>$value) {
			if (null!==$value) {
				$fElem=$doc->createElement($fieldName);
				$fElem->appendChild($doc->createTextNode($value));
				$root->appendChild($fElem);
			}
		}
		$doc->appendChild($root);
		return $doc;
	}

}
?>