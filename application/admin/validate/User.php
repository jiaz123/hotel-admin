<?php

namespace app\admin\validate;


use think\Validate;

class User extends Validate{
    protected $rule = [
        'oldpassword'=>"require",
        'newpassword'=>"require|alphaNum"
    ];

    protected $message = [
        'oldpassword.require'=>'旧密码必填',
        'newpassword.require'=>'新密码必填',
        'newpassword.alphaNum'=>'新密码由数字和字母组成',
    ];

}
