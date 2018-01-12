<?php
require( CONFIG."/DBConfig.php");
abstract class DB{
	protected $db;
    protected function connect(){
		try{
			$this->db = new PDO(DBConfig::$conf[DBConfig::$base]['eng'].":host=".DBConfig::$conf[DBConfig::$base]['host'].";dbname=".DBConfig::$conf[DBConfig::$base]['dbname'],DBConfig::$conf[DBConfig::$base]['user'],DBConfig::$conf[DBConfig::$base]['password']);
			$this->db ->exec("set names utf8");
            return true;
		}catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
			return false;
		}
	}
	protected function disconnect(){
		$this->db  = null;
	}
}
?>