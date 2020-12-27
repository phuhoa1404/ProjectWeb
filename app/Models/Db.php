<?php
	namespace App\Models;
Class Db{
		private static $instance = NULL;
		private function __construct() {}
		private function __clone() {}
		public static function getInstance() {
			if (!isset(self::$instance)) {
				$driver = 'mysql';
				$host = 'localhost';
				$name = 'wego';
				$option[\PDO::ATTR_ERRMODE] = \PDO::ERRMODE_EXCEPTION;
				$dsn = "$driver:host=$host;dbname=$name;charset=utf8";
				self::$instance = new \PDO($dsn, 'root', '', $option);
			}
			return self::$instance;
		}
	}
/*	$driver = 'mysql';
	$host = 'localhost';
	$dbname = 'wego';
	$password = '';
	$dsn = '';

	try{
		$dsn = 'mysql:host='.$host. ';dbname='.$dbname;
		$conn = new PDO($dsn, $user, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){

	}*/
?>