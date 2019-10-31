<?php


interface IModels
{
    public function getOne($id);
    public function getAll();
    public function getTableName();
}