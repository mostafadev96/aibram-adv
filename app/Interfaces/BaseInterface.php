<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface BaseInterface
{
    public function getModel();
    
    public function orderBy(array $columns = []);
    
    public function getTable();
    
    public function getFirstBy(array $condition = [], array $select = ['*'], array $with = []);
    
    public function make(array $with = []);
    
    public function findById($id, array $with = []);

    public function findByHashId($id, array $with = []);
    
    public function findOrFail($id, array $with = []);
    
    public function all(array $with = []);
    
    public function pluck($column, $key = null);
    
    public function allBy(array $condition, array $with = [], array $select = ['*'],$ordering=[],$scopes=[]);
    
    public function create(array $data,$checkStatus=true);
    
    public function createOrUpdate($data, $condition = []);
    
    public function delete(Model $model);

    public function deleteById(String $id);

    public function attachMedia($file,&$model = null,$mediaGroup='');

    public function detachMedia(&$model = null,$media=null,$mediaGroup='');
    
    public function mediaUploader($requestFile);
    
    public function firstOrCreate(array $data, array $with = []);
    
    public function update(array $condition, array $data);

    public function updateById(String $id, array $data,$checkStatus=true);
    
    public function select(array $select = ['*'], array $condition = []);
    
    public function deleteBy(array $condition = []);
    
    public function count(array $condition = []);
    
    public function getByCondition(array $args = []);
    
    public function resetModel();
    
    public function advancedGet(array $params = []);
    
    public function forceDelete(array $condition = []);
    
    public function restoreBy(array $condition = []);
    
    public function getFirstByWithTrash(array $condition = [], array $select = []);
    
    public function insert(array $data);
    
    public function firstOrNew(array $condition);
    
    public function checkRequestCheckBoxExists(&$data,$column = "status");

    public function CheckSingleMediaAndAssign($data,$model,$property,$collection,$update=false);

    public function CheckMultipleMedia($data,$model,$property,$collection,$update=false);

    public function passwordCheck($hashedPassword, $password);

}
