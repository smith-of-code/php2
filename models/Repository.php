<?php


namespace app\models;

use app\engine\Db;
use app\interfaces\IModels;

abstract class Repository implements IModels
{
    public function save(Model $entity) {
        if (is_null($entity->id)){
            $this->insert($entity);
        }else{
            $this->update($entity);
        }
    }
    public function insert(Model $entity) {
        $params = [];
        $columns = [];
        foreach ($entity->props as $key => $value){
        if ($key === 'id'){
            continue;
        }
            $params[":{$key}"] = $entity->$key;
            $columns[] = $key;
        }
        $columns = implode(', ', $columns );
        $values = implode(', ',array_keys($params));

        $tableName = static::getTableName();

        $sql = "INSERT INTO `{$tableName}` ({$columns}) VALUES ($values)";
        Db::getInstance()->execute($sql,$params);

        $entity->id = Db::getInstance()->lastId();

    }

    public function update(Model $entity) {
        $params = [];
        $columns = [];
        foreach ($entity->props as $key => $value){
            if (!$entity->props[$key]){
                continue;
            }
            $params[":{$key}"] = $entity->$key;
            $columns[] = "$key = :{$key}";

            $entity->props[$key] = false;
        }
        $columns = implode(', ', $columns );

        $tableName = static::getTableName();
        $sql = "UPDATE `{$tableName}` SET $columns where id = {$entity->id}";
        Db::getInstance()->execute($sql,$params);
    }

    public function delete(Model $entity) {
        $tableName = static::getTableName();
        $sql = "DELETE FROM `{$tableName}` where id = :id";
        return Db::getInstance()->execute($sql,['id' => $entity->id]);
    }



    public function getLimit($from = 0, $to = 1) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT :from, :to";
        $result =  Db::getInstance()->queryLimit($sql, $from, $to);
        return $result;
    }

    public function getWhere($field, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:value";
         return Db::getInstance()->queryClass($sql, ["value" => $value], $this->getEntityClass());
    }
    public function getCountWhere($field, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE `$field`=:value";
        return Db::getInstance()->queryOne($sql, ["value"=>$value])['count'];
    }
    public function deleteWhere($id, $field, $value){
        $tableName = static::getTableName();
        $sql = "DELETE FROM `{$tableName}` where id = :id AND `$field`=:value";
        return Db::getInstance()->execute($sql,['id' => $id, 'value' => $value]);
    }

    public function getOne($id){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id =:id";
        return Db::getInstance()->queryClass($sql, ['id' => $id], $this->getEntityClass());
    }

    public function getAll(){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return Db::getInstance()->queryAll($sql);
    }

}