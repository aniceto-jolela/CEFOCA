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
 * Interface for entity classes
 */
interface Db2PhpEntity {
	const PHP_TYPE_BOOL=1;
	const PHP_TYPE_INT=2;
	const PHP_TYPE_FLOAT=4;
	const PHP_TYPE_STRING=8;
	const PHP_TYPE_ARRAY=16;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>BIT</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_BIT=-7;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>TINYINT</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_TINYINT=-6;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>SMALLINT</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_SMALLINT=5;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>INTEGER</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_INTEGER=4;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>BIGINT</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_BIGINT=-5;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>FLOAT</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_FLOAT=6;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>REAL</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_REAL=7;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>DOUBLE</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_DOUBLE=8;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>NUMERIC</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_NUMERIC=2;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>DECIMAL</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_DECIMAL=3;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>CHAR</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_CHAR=1;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>VARCHAR</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_VARCHAR=12;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>LONGVARCHAR</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_LONGVARCHAR=-1;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>DATE</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_DATE=91;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>TIME</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_TIME=92;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>TIMESTAMP</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_TIMESTAMP=93;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>BINARY</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_BINARY=-2;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>VARBINARY</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_VARBINARY=-3;
	/**
	 * <P>The constant in the Java programming language, sometimes referred
	 * to as a type code, that identifies the generic SQL type
	 * <code>LONGVARBINARY</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_LONGVARBINARY=-4;
	/**
	 * <P>The constant in the Java programming language
	 * that identifies the generic SQL value
	 * <code>NULL</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_NULL=0;
	/**
	 * The constant in the Java programming language that indicates
	 * that the SQL type is database-specific and
	 * gets mapped to a Java object that can be accessed via
	 * the methods <code>getObject</code> and <code>setObject</code>.
	 *
	 * @var int
	 */
	const JDBC_TYPE_OTHER=1111;
	/**
	 * The constant in the Java programming language, sometimes referred to
	 * as a type code, that identifies the generic SQL type
	 * <code>JAVA_OBJECT</code>
	 *
	 * @since 1.2
	 * @var int
	 */
	const JDBC_TYPE_JAVA_OBJECT=2000;
	/**
	 * The constant in the Java programming language, sometimes referred to
	 * as a type code, that identifies the generic SQL type
	 * <code>DISTINCT</code>.
	 *
	 * @since 1.2
	 * @var int
	 */
	const JDBC_TYPE_DISTINCT=2001;
	/**
	 * The constant in the Java programming language, sometimes referred to
	 * as a type code, that identifies the generic SQL type
	 * <code>STRUCT</code>.
	 *
	 * @since 1.2
	 * @var int
	 */
	const JDBC_TYPE_STRUCT=2002;
	/**
	 * The constant in the Java programming language, sometimes referred to
	 * as a type code, that identifies the generic SQL type
	 * <code>ARRAY</code>.
	 *
	 * @since 1.2
	 * @var int
	 */
	const JDBC_TYPE_ARRAY=2003;
	/**
	 * The constant in the Java programming language, sometimes referred to
	 * as a type code, that identifies the generic SQL type
	 * <code>BLOB</code>.
	 *
	 * @since 1.2
	 * @var int
	 */
	const JDBC_TYPE_BLOB=2004;
	/**
	 * The constant in the Java programming language, sometimes referred to
	 * as a type code, that identifies the generic SQL type
	 * <code>CLOB</code>.
	 *
	 * @since 1.2
	 * @var int
	 */
	const JDBC_TYPE_CLOB=2005;
	/**
	 * The constant in the Java programming language, sometimes referred to
	 * as a type code, that identifies the generic SQL type
	 * <code>REF</code>.
	 *
	 * @since 1.2
	 * @var int
	 */
	const JDBC_TYPE_REF=2006;
	/**
	 * The constant in the Java programming language, somtimes referred to
	 * as a type code, that identifies the generic SQL type <code>DATALINK</code>.
	 *
	 * @since 1.4
	 * @var int
	 */
	const JDBC_TYPE_DATALINK=70;
	/**
	 * The constant in the Java programming language, somtimes referred to
	 * as a type code, that identifies the generic SQL type <code>BOOLEAN</code>.
	 *
	 * @since 1.4
	 * @var int
	 */
	const JDBC_TYPE_BOOLEAN=16;

	//------------------------- JDBC 4.0 -----------------------------------

	/**
	 * The constant in the Java programming language, sometimes referred to
	 * as a type code, that identifies the generic SQL type <code>ROWID</code>
	 *
	 * @since 1.6
	 * @var int
	 *
	 */
	const JDBC_TYPE_ROWID=-8;
	/**
	 * The constant in the Java programming language, sometimes referred to
	 * as a type code, that identifies the generic SQL type <code>NCHAR</code>
	 *
	 * @since 1.6
	 * @var int
	 */
	const JDBC_TYPE_NCHAR=-15;
	/**
	 * The constant in the Java programming language, sometimes referred to
	 * as a type code, that identifies the generic SQL type <code>NVARCHAR</code>.
	 *
	 * @since 1.6
	 * @var int
	 */
	const JDBC_TYPE_NVARCHAR=-9;
	/**
	 * The constant in the Java programming language, sometimes referred to
	 * as a type code, that identifies the generic SQL type <code>LONGNVARCHAR</code>.
	 *
	 * @since 1.6
	 * @var int
	 */
	const JDBC_TYPE_LONGNVARCHAR=-16;
	/**
	 * The constant in the Java programming language, sometimes referred to
	 * as a type code, that identifies the generic SQL type <code>NCLOB</code>.
	 *
	 * @since 1.6
	 * @var int
	 */
	const JDBC_TYPE_NCLOB=2011;
	/**
	 * The constant in the Java programming language, sometimes referred to
	 * as a type code, that identifies the generic SQL type <code>XML</code>.
	 *
	 * @since 1.6
	 * @var int
	 */
	const JDBC_TYPE_SQLXML=2009;

	
	/**
	 * Insert this instance into the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function insertIntoDatabase(PDO $db);

	/**
	 * Update this instance into the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function updateToDatabase(PDO $db);

	/**
	 * Delete this instance from the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function deleteFromDatabase(PDO $db);

	/**
	 * Assign default values according to table
	 *
	 */
	public function assignDefaultValues();

	/**
	 * Assign values from array with the field id as index and the value as value
	 *
	 * @param array $array
	 */
	public function assignByArray($array);

	/**
	 *
	 * Assign values from hash where the indexes match the tables field names
	 *
	 * @param array $result
	 */
	public function assignByHash($result);

	/**
	 * return array with the field id as index and the field value as value for the identifier fields.
	 *
	 * @return array
	 */
	public function getPrimaryKeyValues();

	/**
	 * return hash with the field name as index and the field value as value.
	 *
	 * @return array
	 */
	public function toHash();

	/**
	 * return array with the field id as index and the field value as value.
	 *
	 * @return array
	 */
	public function toArray();

	/**
	 * get element as DOM Document
	 *
	 * @return DOMDocument
	 */
	public function toDOM();

}
?>