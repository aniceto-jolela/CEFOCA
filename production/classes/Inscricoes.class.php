<?php

/**
 * 
 *
 * @version 1.107
 * @package entity
 */
class Inscricoes extends Db2PhpEntityBase implements Db2PhpEntityModificationTracking {
	private static $CLASS_NAME='Inscricoes';
	const SQL_IDENTIFIER_QUOTE='`';
	const SQL_TABLE_NAME='inscricoes';
	const SQL_INSERT='INSERT INTO `inscricoes` (`id`,`nome`,`telefone`,`bi`,`fotografia`,`id_curso`,`estado`) VALUES (?,?,?,?,?,?,?)';
	const SQL_INSERT_AUTOINCREMENT='INSERT INTO `inscricoes` (`nome`,`telefone`,`bi`,`fotografia`,`id_curso`,`estado`) VALUES (?,?,?,?,?,?)';
	const SQL_UPDATE='UPDATE `inscricoes` SET `id`=?,`nome`=?,`telefone`=?,`bi`=?,`fotografia`=?,`id_curso`=?,`estado`=? WHERE `id`=?';
	const SQL_SELECT_PK='SELECT * FROM `inscricoes` WHERE `id`=?';
	const SQL_DELETE_PK='DELETE FROM `inscricoes` WHERE `id`=?';
	const FIELD_ID=1463924931;
	const FIELD_NOME=-1917251391;
	const FIELD_TELEFONE=1377089682;
	const FIELD_BI=1463924719;
	const FIELD_FOTOGRAFIA=-531496684;
	const FIELD_ID_CURSO=-1875034592;
	const FIELD_ESTADO=-191377138;
	private static $PRIMARY_KEYS=array(self::FIELD_ID);
	private static $AUTOINCREMENT_FIELDS=array(self::FIELD_ID);
	private static $FIELD_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_NOME=>'nome',
		self::FIELD_TELEFONE=>'telefone',
		self::FIELD_BI=>'bi',
		self::FIELD_FOTOGRAFIA=>'fotografia',
		self::FIELD_ID_CURSO=>'id_curso',
		self::FIELD_ESTADO=>'estado');
	private static $PROPERTY_NAMES=array(
		self::FIELD_ID=>'id',
		self::FIELD_NOME=>'nome',
		self::FIELD_TELEFONE=>'telefone',
		self::FIELD_BI=>'bi',
		self::FIELD_FOTOGRAFIA=>'fotografia',
		self::FIELD_ID_CURSO=>'idCurso',
		self::FIELD_ESTADO=>'estado');
	private static $PROPERTY_TYPES=array(
		self::FIELD_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_NOME=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_TELEFONE=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_BI=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_FOTOGRAFIA=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_ID_CURSO=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_ESTADO=>Db2PhpEntity::PHP_TYPE_INT);
	private static $FIELD_TYPES=array(
		self::FIELD_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_NOME=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,225,0,false),
		self::FIELD_TELEFONE=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,20,0,true),
		self::FIELD_BI=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,20,0,true),
		self::FIELD_FOTOGRAFIA=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,225,0,true),
		self::FIELD_ID_CURSO=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_ESTADO=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,true));
	private static $DEFAULT_VALUES=array(
		self::FIELD_ID=>null,
		self::FIELD_NOME=>'',
		self::FIELD_TELEFONE=>null,
		self::FIELD_BI=>null,
		self::FIELD_FOTOGRAFIA=>null,
		self::FIELD_ID_CURSO=>0,
		self::FIELD_ESTADO=>null);
	private $id;
	private $nome;
	private $telefone;
	private $bi;
	private $fotografia;
	private $idCurso;
	private $estado;

	/**
	 * set value for id 
	 *
	 * type:INT,size:10,default:null,primary,unique,autoincrement
	 *
	 * @param mixed $id
	 * @return Inscricoes
	 */
	public function &setId($id) {
		$this->notifyChanged(self::FIELD_ID,$this->id,$id);
		$this->id=$id;
		return $this;
	}

	/**
	 * get value for id 
	 *
	 * type:INT,size:10,default:null,primary,unique,autoincrement
	 *
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * set value for nome 
	 *
	 * type:VARCHAR,size:225,default:null
	 *
	 * @param mixed $nome
	 * @return Inscricoes
	 */
	public function &setNome($nome) {
		$this->notifyChanged(self::FIELD_NOME,$this->nome,$nome);
		$this->nome=$nome;
		return $this;
	}

	/**
	 * get value for nome 
	 *
	 * type:VARCHAR,size:225,default:null
	 *
	 * @return mixed
	 */
	public function getNome() {
		return $this->nome;
	}

	/**
	 * set value for telefone 
	 *
	 * type:VARCHAR,size:20,default:null,nullable
	 *
	 * @param mixed $telefone
	 * @return Inscricoes
	 */
	public function &setTelefone($telefone) {
		$this->notifyChanged(self::FIELD_TELEFONE,$this->telefone,$telefone);
		$this->telefone=$telefone;
		return $this;
	}

	/**
	 * get value for telefone 
	 *
	 * type:VARCHAR,size:20,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getTelefone() {
		return $this->telefone;
	}

	/**
	 * set value for bi 
	 *
	 * type:VARCHAR,size:20,default:null,nullable
	 *
	 * @param mixed $bi
	 * @return Inscricoes
	 */
	public function &setBi($bi) {
		$this->notifyChanged(self::FIELD_BI,$this->bi,$bi);
		$this->bi=$bi;
		return $this;
	}

	/**
	 * get value for bi 
	 *
	 * type:VARCHAR,size:20,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getBi() {
		return $this->bi;
	}

	/**
	 * set value for fotografia 
	 *
	 * type:VARCHAR,size:225,default:null,nullable
	 *
	 * @param mixed $fotografia
	 * @return Inscricoes
	 */
	public function &setFotografia($fotografia) {
		$this->notifyChanged(self::FIELD_FOTOGRAFIA,$this->fotografia,$fotografia);
		$this->fotografia=$fotografia;
		return $this;
	}

	/**
	 * get value for fotografia 
	 *
	 * type:VARCHAR,size:225,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getFotografia() {
		return $this->fotografia;
	}

	/**
	 * set value for id_curso 
	 *
	 * type:INT,size:10,default:null,index
	 *
	 * @param mixed $idCurso
	 * @return Inscricoes
	 */
	public function &setIdCurso($idCurso) {
		$this->notifyChanged(self::FIELD_ID_CURSO,$this->idCurso,$idCurso);
		$this->idCurso=$idCurso;
		return $this;
	}

	/**
	 * get value for id_curso 
	 *
	 * type:INT,size:10,default:null,index
	 *
	 * @return mixed
	 */
	public function getIdCurso() {
		return $this->idCurso;
	}

	/**
	 * set value for estado 
	 *
	 * type:INT,size:10,default:null,nullable
	 *
	 * @param mixed $estado
	 * @return Inscricoes
	 */
	public function &setEstado($estado) {
		$this->notifyChanged(self::FIELD_ESTADO,$this->estado,$estado);
		$this->estado=$estado;
		return $this;
	}

	/**
	 * get value for estado 
	 *
	 * type:INT,size:10,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getEstado() {
		return $this->estado;
	}

	/**
	 * Get table name
	 *
	 * @return string
	 */
	public static function getTableName() {
		return self::SQL_TABLE_NAME;
	}

	/**
	 * Get array with field id as index and field name as value
	 *
	 * @return array
	 */
	public static function getFieldNames() {
		return self::$FIELD_NAMES;
	}

	/**
	 * Get array with field id as index and property name as value
	 *
	 * @return array
	 */
	public static function getPropertyNames() {
		return self::$PROPERTY_NAMES;
	}

	/**
	 * get the field name for the passed field id.
	 *
	 * @param int $fieldId
	 * @param bool $fullyQualifiedName true if field name should be qualified by table name
	 * @return string field name for the passed field id, null if the field doesn't exist
	 */
	public static function getFieldNameByFieldId($fieldId, $fullyQualifiedName=true) {
		if (!array_key_exists($fieldId, self::$FIELD_NAMES)) {
			return null;
		}
		$fieldName=self::SQL_IDENTIFIER_QUOTE . self::$FIELD_NAMES[$fieldId] . self::SQL_IDENTIFIER_QUOTE;
		if ($fullyQualifiedName) {
			return self::SQL_IDENTIFIER_QUOTE . self::SQL_TABLE_NAME . self::SQL_IDENTIFIER_QUOTE . '.' . $fieldName;
		}
		return $fieldName;
	}

	/**
	 * Get array with field ids of identifiers
	 *
	 * @return array
	 */
	public static function getIdentifierFields() {
		return self::$PRIMARY_KEYS;
	}

	/**
	 * Get array with field ids of autoincrement fields
	 *
	 * @return array
	 */
	public static function getAutoincrementFields() {
		return self::$AUTOINCREMENT_FIELDS;
	}

	/**
	 * Get array with field id as index and property type as value
	 *
	 * @return array
	 */
	public static function getPropertyTypes() {
		return self::$PROPERTY_TYPES;
	}

	/**
	 * Get array with field id as index and field type as value
	 *
	 * @return array
	 */
	public static function getFieldTypes() {
		return self::$FIELD_TYPES;
	}

	/**
	 * Assign default values according to table
	 * 
	 */
	public function assignDefaultValues() {
		$this->assignByArray(self::$DEFAULT_VALUES);
	}


	/**
	 * return hash with the field name as index and the field value as value.
	 *
	 * @return array
	 */
	public function toHash() {
		$array=$this->toArray();
		$hash=array();
		foreach ($array as $fieldId=>$value) {
			$hash[self::$FIELD_NAMES[$fieldId]]=$value;
		}
		return $hash;
	}

	/**
	 * return array with the field id as index and the field value as value.
	 *
	 * @return array
	 */
	public function toArray() {
		return array(
			self::FIELD_ID=>$this->getId(),
			self::FIELD_NOME=>$this->getNome(),
			self::FIELD_TELEFONE=>$this->getTelefone(),
			self::FIELD_BI=>$this->getBi(),
			self::FIELD_FOTOGRAFIA=>$this->getFotografia(),
			self::FIELD_ID_CURSO=>$this->getIdCurso(),
			self::FIELD_ESTADO=>$this->getEstado());
	}


	/**
	 * return array with the field id as index and the field value as value for the identifier fields.
	 *
	 * @return array
	 */
	public function getPrimaryKeyValues() {
		return array(
			self::FIELD_ID=>$this->getId());
	}

	/**
	 * cached statements
	 *
	 * @var array<string,array<string,PDOStatement>>
	 */
	private static $stmts=array();
	private static $cacheStatements=true;
	
	/**
	 * prepare passed string as statement or return cached if enabled and available
	 *
	 * @param PDO $db
	 * @param string $statement
	 * @return PDOStatement
	 */
	protected static function prepareStatement(PDO $db, $statement) {
		if(self::isCacheStatements()) {
			if (in_array($statement, array(self::SQL_INSERT, self::SQL_INSERT_AUTOINCREMENT, self::SQL_UPDATE, self::SQL_SELECT_PK, self::SQL_DELETE_PK))) {
				$dbInstanceId=spl_object_hash($db);
				if (empty(self::$stmts[$statement][$dbInstanceId])) {
					self::$stmts[$statement][$dbInstanceId]=$db->prepare($statement);
				}
				return self::$stmts[$statement][$dbInstanceId];
			}
		}
		return $db->prepare($statement);
	}

	/**
	 * Enable statement cache
	 *
	 * @param bool $cache
	 */
	public static function setCacheStatements($cache) {
		self::$cacheStatements=true==$cache;
	}

	/**
	 * Check if statement cache is enabled
	 *
	 * @return bool
	 */
	public static function isCacheStatements() {
		return self::$cacheStatements;
	}
	
	/**
	 * check if this instance exists in the database
	 *
	 * @param PDO $db
	 * @return bool
	 */
	public function existsInDatabase(PDO $db) {
		$filter=array();
		foreach ($this->getPrimaryKeyValues() as $fieldId=>$value) {
			$filter[]=new DFC($fieldId, $value, DFC::EXACT_NULLSAFE);
		}
		return 0!=count(self::findByFilter($db, $filter, true));
	}
	
	/**
	 * Update to database if exists, otherwise insert
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function updateInsertToDatabase(PDO $db) {
		if ($this->existsInDatabase($db)) {
			return $this->updateToDatabase($db);
		} else {
			return $this->insertIntoDatabase($db);
		}
	}

	/**
	 * Query by Example.
	 *
	 * Match by attributes of passed example instance and return matched rows as an array of Inscricoes instances
	 *
	 * @param PDO $db a PDO Database instance
	 * @param Inscricoes $example an example instance defining the conditions. All non-null properties will be considered a constraint, null values will be ignored.
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return Inscricoes[]
	 */
	public static function findByExample(PDO $db,Inscricoes $example, $and=true, $sort=null) {
		$exampleValues=$example->toArray();
		$filter=array();
		foreach ($exampleValues as $fieldId=>$value) {
			if (null!==$value) {
				$filter[$fieldId]=$value;
			}
		}
		return self::findByFilter($db, $filter, $and, $sort);
	}

	/**
	 * Query by filter.
	 *
	 * The filter can be either an hash with the field id as index and the value as filter value,
	 * or a array of DFC instances.
	 *
	 * Will return matched rows as an array of Inscricoes instances.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param array $filter array of DFC instances defining the conditions
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return Inscricoes[]
	 */
	public static function findByFilter(PDO $db, $filter, $and=true, $sort=null) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		$sql='SELECT * FROM `inscricoes`'
		. self::buildSqlWhere($filter, $and, false, true)
		. self::buildSqlOrderBy($sort);

		$stmt=self::prepareStatement($db, $sql);
		self::bindValuesForFilter($stmt, $filter);
		return self::fromStatement($stmt);
	}

	/**
	 * Will execute the passed statement and return the result as an array of Inscricoes instances
	 *
	 * @param PDOStatement $stmt
	 * @return Inscricoes[]
	 */
	public static function fromStatement(PDOStatement $stmt) {
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		return self::fromExecutedStatement($stmt);
	}

	/**
	 * returns the result as an array of Inscricoes instances without executing the passed statement
	 *
	 * @param PDOStatement $stmt
	 * @return Inscricoes[]
	 */
	public static function fromExecutedStatement(PDOStatement $stmt) {
		$resultInstances=array();
		while($result=$stmt->fetch(PDO::FETCH_ASSOC)) {
			$o=new Inscricoes();
			$o->assignByHash($result);
			$o->notifyPristine();
			$resultInstances[]=$o;
		}
		$stmt->closeCursor();
		return $resultInstances;
	}

	/**
	 * Get sql WHERE part from filter.
	 *
	 * @param array $filter
	 * @param bool $and
	 * @param bool $fullyQualifiedNames true if field names should be qualified by table name
	 * @param bool $prependWhere true if WHERE should be prepended to conditions
	 * @return string
	 */
	public static function buildSqlWhere($filter, $and, $fullyQualifiedNames=true, $prependWhere=false) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		return $filter->buildSqlWhere(new self::$CLASS_NAME, $fullyQualifiedNames, $prependWhere);
	}

	/**
	 * get sql ORDER BY part from DSCs
	 *
	 * @param array $sort array of DSC instances
	 * @return string
	 */
	protected static function buildSqlOrderBy($sort) {
		return DSC::buildSqlOrderBy(new self::$CLASS_NAME, $sort);
	}

	/**
	 * bind values from filter to statement
	 *
	 * @param PDOStatement $stmt
	 * @param DFCInterface $filter
	 */
	public static function bindValuesForFilter(PDOStatement &$stmt, DFCInterface $filter) {
		$filter->bindValuesForFilter(new self::$CLASS_NAME, $stmt);
	}

	/**
	 * Execute select query and return matched rows as an array of Inscricoes instances.
	 *
	 * The query should of course be on the table for this entity class and return all fields.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param string $sql
	 * @return Inscricoes[]
	 */
	public static function findBySql(PDO $db, $sql) {
		$stmt=$db->query($sql);
		return self::fromExecutedStatement($stmt);
	}

	/**
	 * Delete rows matching the filter
	 *
	 * The filter can be either an hash with the field id as index and the value as filter value,
	 * or a array of DFC instances.
	 *
	 * @param PDO $db
	 * @param array $filter
	 * @param bool $and
	 * @return mixed
	 */
	public static function deleteByFilter(PDO $db, $filter, $and=true) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		if (0==count($filter)) {
			throw new InvalidArgumentException('refusing to delete without filter'); // just comment out this line if you are brave
		}
		$sql='DELETE FROM `inscricoes`'
		. self::buildSqlWhere($filter, $and, false, true);
		$stmt=self::prepareStatement($db, $sql);
		self::bindValuesForFilter($stmt, $filter);
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$stmt->closeCursor();
		return $affected;
	}

	/**
	 * Assign values from array with the field id as index and the value as value
	 *
	 * @param array $array
	 */
	public function assignByArray($array) {
		$result=array();
		foreach ($array as $fieldId=>$value) {
			$result[self::$FIELD_NAMES[$fieldId]]=$value;
		}
		$this->assignByHash($result);
	}

	/**
	 * Assign values from hash where the indexes match the tables field names
	 *
	 * @param array $result
	 */
	public function assignByHash($result) {
		$this->setId($result['id']);
		$this->setNome($result['nome']);
		$this->setTelefone($result['telefone']);
		$this->setBi($result['bi']);
		$this->setFotografia($result['fotografia']);
		$this->setIdCurso($result['id_curso']);
		$this->setEstado($result['estado']);
	}

	/**
	 * Get element instance by it's primary key(s).
	 * Will return null if no row was matched.
	 *
	 * @param PDO $db
	 * @return Inscricoes
	 */
	public static function findById(PDO $db,$id) {
		$stmt=self::prepareStatement($db,self::SQL_SELECT_PK);
		$stmt->bindValue(1,$id);
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$result=$stmt->fetch(PDO::FETCH_ASSOC);
		$stmt->closeCursor();
		if(!$result) {
			return null;
		}
		$o=new Inscricoes();
		$o->assignByHash($result);
		$o->notifyPristine();
		return $o;
	}

	/**
	 * Bind all values to statement
	 *
	 * @param PDOStatement $stmt
	 */
	protected function bindValues(PDOStatement &$stmt) {
		$stmt->bindValue(1,$this->getId());
		$stmt->bindValue(2,$this->getNome());
		$stmt->bindValue(3,$this->getTelefone());
		$stmt->bindValue(4,$this->getBi());
		$stmt->bindValue(5,$this->getFotografia());
		$stmt->bindValue(6,$this->getIdCurso());
		$stmt->bindValue(7,$this->getEstado());
	}


	/**
	 * Insert this instance into the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function insertIntoDatabase(PDO $db) {
		if (null===$this->getId()) {
			$stmt=self::prepareStatement($db,self::SQL_INSERT_AUTOINCREMENT);
			$stmt->bindValue(1,$this->getNome());
			$stmt->bindValue(2,$this->getTelefone());
			$stmt->bindValue(3,$this->getBi());
			$stmt->bindValue(4,$this->getFotografia());
			$stmt->bindValue(5,$this->getIdCurso());
			$stmt->bindValue(6,$this->getEstado());
		} else {
			$stmt=self::prepareStatement($db,self::SQL_INSERT);
			$this->bindValues($stmt);
		}
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$lastInsertId=$db->lastInsertId();
		if (false!==$lastInsertId) {
			$this->setId($lastInsertId);
		}
		$stmt->closeCursor();
		$this->notifyPristine();
		return $affected;
	}


	/**
	 * Update this instance into the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function updateToDatabase(PDO $db) {
		$stmt=self::prepareStatement($db,self::SQL_UPDATE);
		$this->bindValues($stmt);
		$stmt->bindValue(8,$this->getId());
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$stmt->closeCursor();
		$this->notifyPristine();
		return $affected;
	}


	/**
	 * Delete this instance from the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function deleteFromDatabase(PDO $db) {
		$stmt=self::prepareStatement($db,self::SQL_DELETE_PK);
		$stmt->bindValue(1,$this->getId());
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$stmt->closeCursor();
		return $affected;
	}

	/**
	 * Fetch Notificacoes's which this Inscricoes references.
	 * `inscricoes`.`id` -> `notificacoes`.`id_inscrito`
	 *
	 * @param PDO $db a PDO Database instance
	 * @param array $sort array of DSC instances
	 * @return Notificacoes[]
	 */
	public function fetchNotificacoesCollection(PDO $db, $sort=null) {
		$filter=array(Notificacoes::FIELD_ID_INSCRITO=>$this->getId());
		return Notificacoes::findByFilter($db, $filter, true, $sort);
	}

	/**
	 * Fetch Cursos which references this Inscricoes. Will return null in case reference is invalid.
	 * `inscricoes`.`id_curso` -> `cursos`.`id`
	 *
	 * @param PDO $db a PDO Database instance
	 * @param array $sort array of DSC instances
	 * @return Cursos
	 */
	public function fetchCursos(PDO $db, $sort=null) {
		$filter=array(Cursos::FIELD_ID=>$this->getIdCurso());
		$result=Cursos::findByFilter($db, $filter, true, $sort);
		return empty($result) ? null : $result[0];
	}


	/**
	 * get element as DOM Document
	 *
	 * @return DOMDocument
	 */
	public function toDOM() {
		return self::hashToDomDocument($this->toHash(), 'Inscricoes');
	}

	/**
	 * get single Inscricoes instance from a DOMElement
	 *
	 * @param DOMElement $node
	 * @return Inscricoes
	 */
	public static function fromDOMElement(DOMElement $node) {
		$o=new Inscricoes();
		$o->assignByHash(self::domNodeToHash($node, self::$FIELD_NAMES, self::$DEFAULT_VALUES, self::$FIELD_TYPES));
			$o->notifyPristine();
		return $o;
	}

	/**
	 * get all instances of Inscricoes from the passed DOMDocument
	 *
	 * @param DOMDocument $doc
	 * @return Inscricoes[]
	 */
	public static function fromDOMDocument(DOMDocument $doc) {
		$instances=array();
		foreach ($doc->getElementsByTagName('Inscricoes') as $node) {
			$instances[]=self::fromDOMElement($node);
		}
		return $instances;
	}

}
?>