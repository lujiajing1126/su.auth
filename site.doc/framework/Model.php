<?php
use Doctrine\DBAL\DriverManager;

require '../../su.prog/phplib/composer/vendor/autoload.php';

class SuModel  {
	protected $conn;
	protected $connectionParams;
	protected $config;
	protected $queryBuilder;
	public $result;
	public function __construct()  {
		$this->config = new \Doctrine\DBAL\Configuration();
		$this->connect();
		//return $this->queryBuilder();
	}
	public function test()  {
		$sql = "SELECT * FROM testdb";
		$stmt = $this->conn->query($sql);
		var_dump($stmt->fetch());
	}
	private function connect()  {
		$this->connectionParams = $GLOBALS['connectionParams'];
		$this->conn = DriverManager::getConnection($this->connectionParams, $this->config);
		$this->queryBuilder = $this->conn->createQueryBuilder();
	}
	public function getBuilder()  {
		return $this->queryBuilder;
	}
}