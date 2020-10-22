<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/*
 * 1. 获取token
*   1.1 GET token
 *  1.2 POST token
 *  1.3 header token
 * 2. 解析    JWT：：verify
 *  2.1 成功
 *  2.2 失败
 * */
function checkToken(){
    $get_token = request()->get('token');
    $post_token = request()->post('token');
    $header_token = request()->header('token');
    if ($get_token){
        $token = $get_token;
    }else if($post_token){
        $token = $post_token;
    }else if($header_token){
        $token = $header_token;
    }else{
        json([
            'code'=>404,
            'msg'=>'token不能为空'
        ],
        401)->send();
        exit();
    }
    $tokenResult = \think\JWT::verify($token,config('jwtkey'));
    if (!$tokenResult){
        json([
            'code'=>404,
            'msg'=>'token不能为空'
        ],
            401)->send();
        exit();
    }
    request()->id=$tokenResult['id'];
    request()->username=$tokenResult['username'];
}

function checkUserToken(){
    $get_token = request()->get('token');
    $post_token = request()->post('token');
    $header_token = request()->header('token');
    if ($get_token){
        $token = $get_token;
    }else if($post_token){
        $token = $post_token;
    }else if($header_token){
        $token = $header_token;
    }else{
        json([
            'code'=>404,
            'msg'=>'token不能为空'
        ],
            401)->send();
        exit();
    }
    $tokenResult = \think\JWT::verify($token,config('jwtkey'));
    if (!$tokenResult){
        json([
            'code'=>404,
            'msg'=>'token不能为空'
        ],
            401)->send();
        exit();
    }
    request()->uid=$tokenResult['uid'];
    request()->nickname=$tokenResult['nickname'];
}

function secretpassword($pass){
    return md5(crypt($pass,config('salt')));
}

function sexCodeToText($code){
    $text = '男';
    $sexArr = ['未填写','男','女'];
    if(isset($sexArr[$code])){
        $text=$sexArr[$code];
    }
    return $text;
}