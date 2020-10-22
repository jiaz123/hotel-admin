<?php


namespace app\index\model;


use think\Model;

class User extends Model
{
    protected $autoWriteTimestamp = true;
    public function add($data){
        return $this->allowField(true)->save($data);
    }
    public function queryOne($where,$field="uid,nickname,phone,collection"){
        return $this->field($field)->where($where)->find();
    }
}