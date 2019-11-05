<?php


namespace app\models;

use app\engine\Db;
use app\interfaces\IModels;

abstract class Model implements IModels
{
    protected $db;
    public function __construct()
    {
    $this->db = Db::getInstance();
    }

    public function insert() {
        $tableKey ='';
        $tableValue ='';
        foreach ($this as $key => $value){
            if ($key === 'db'){
                continue;
            }
            if ($key === 'id' && is_null($this->$key)){
                continue;
            }
            $tableKey .= " `{$key}`,";
            $tableValue.= "'{$value}',";

        }
        $tableKey = mb_substr($tableKey,0,-1);
        $tableValue = mb_substr($tableValue,0,-1);

        $tableName = $this->getTableName();

        $sql = "INSERT INTO `{$tableName}` ($tableKey) VALUES ($tableValue)";

        $this->db->queryOne($sql);

        $this->id = $this->db->lastId();
    }

    public function delete() {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM `{$tableName}` where id = {$this->id}";
        $this->db->queryOne($sql);
    }

    public function update() {
        $tableName = $this->getTableName();
        $sql = "UPDATE `{$tableName}` SET where id = {$this->id}";
    }

    public function getOne($id){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id =:id";
        $result =  $this->db->queryClass($sql,['id' => $id], get_class());
//        $result = $this->db->queryOne($sql,['id' => $id]);
//        foreach ($result as $key => $value){
//            $this->$key = $value;
//        }

    }
    public function getAll(){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return $this->db->queryAll($sql);
    }

    abstract public function getTableName();
}