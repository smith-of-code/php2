<?php

namespace  app\engine;

use app\traits\TSingletone;
use PDO;

class Db
{
    use TSingletone;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'php2',
        'charset' => 'utf8'
        ];

    private $connection = null;

    private function getConnection(){
        if (is_null($this->connection)){
            $this->connection =new \PDO($this->prepareDSNstring(),
                $this->config['login'],
                $this->config['password']
            );
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    //Запрос вида "SELECT * FROM goods WHERE id = :id"
    // :id - для вставки из параметров
    // $params = ["id" => 1]
    private function query($sql, $params){
        $pdoStatement = $this->getConnection()->prepare($sql);

        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    private function execute($sql,$params){
        return $this->query($sql, $params);
    }
    private function prepareDSNstring(){
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
        $this->config['charset']
            );
    }

    public function lastId(){
       return $this->connection->lastInsertId();
    }

    public function __toString()
    {
     return $this->prepareDSNstring();
    }


    public function queryOne($sql,$params = [])
    {
        return $this->queryAll($sql,$params)[0];
    }
    public function queryAll($sql,$params = [])
    {
        return $this->query($sql,$params)->fetchAll();
    }

    public function queryClass($sql, $params, $class){
        $pdoStatement = $this->query($sql,$params);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);

        return $pdoStatement;
    }


}