<?php
namespace App\Conexion;
use PDO;

abstract class Conexion{
    protected $dbCnx;
    protected string $sql;
    public function newConection(){
        $this->dbCnx??=(function(){
            $config = require_once('db.php');
            return new PDO(...$config);
        })();
        return $this;
    }
    public function sql($sql){
        $this->sql = $sql;
        return $this;
    }
    public function data(array $data){
        $this->data = $data;
        return $this;
    }
    public function execute(){
        $stmt = $this->$dbCnx->prepare($this->sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->execute($this->data);
    }
}