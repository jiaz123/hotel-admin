<?php


namespace app\admin\validate;


use think\Validate;

class Category extends Validate
{
    protected $rule = [
      'cname'=>'require|chsAlphaNum',
      'cdesc'=>'require|chsAlphaNum'
    ];
    protected $message = [
        'cname.require'=>'分类名称必填',
        'cname.chaAlphaNum'=>'分类名称只能包含汉字字母和数字',
        'cdesc.require'=>'分类名称必填',
        'cdesc.chaAlphaNum'=>'分类名称只能包含汉字字母和数字'
    ];
}