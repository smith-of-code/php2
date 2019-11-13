<?php


namespace app\models;


use app\engine\Db;

abstract class DbModel extends Model
{
    public function save() {
        if (is_null($this->id)){
            $this->insert();
        }else{
            $this->update();
        }
    }
    public function insert() {
        $params = [];
        $columns = [];

        foreach ($this as $key => $value){
            if (!isset($this->props[$key])){
                continue;
            }
            $params[":{$key}"] = $value;
            $columns[] = $key;
        }
        $columns = implode(', ', $columns );
        $values = implode(', ',array_keys($params));

        $tableName = static::getTableName();

        $sql = "INSERT INTO `{$tableName}` ({$columns}) VALUES ($values)";

        Db::getInstance()->execute($sql,$params);

        $this->id = Db::getInstance()->lastId();

        return $this;
    }

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM `{$tableName}` where id = :id";
        return Db::getInstance()->execute($sql,['id' => $this->id]);
    }

    public function update() {
        $params = [];
        $columns = [];
        foreach ($this->props as $key => $value){
            if (!$this->props[$key]){
                continue;
            }
            $params[":{$key}"] = $this->$key;
            $columns[] = "$key = :{$key}";
        }
        $columns = implode(', ', $columns );

        $tableName = static::getTableName();
        $sql = "UPDATE `{$tableName}` SET $columns where id = {$this->id}";
        Db::getInstance()->execute($sql,$params);
        $this->resetProps();
    }


    public static function getOne($id){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id =:id";
        return Db::getInstance()->queryClass($sql,['id' => $id], static::class);
    }

    public static function getAll(){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return Db::getInstance()->queryAll($sql);
    }

    private function resetProps(){
        foreach ($this->props as $key => $value){
            $this->props[$key] = false;
        }
    }
    abstract public static function getTableName();
}