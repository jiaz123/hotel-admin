<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\JWT;
use think\Request;

class Login extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
        $data = $this->request->post();
//        Db::table('User')->where()->find();
        $model = model('User');
        $result = $model->queryOne(['phone'=>$data['phone']]);
        if($result){
            $collection = $result['collection'];
            $payload = [
                'uid'=>$result['uid'],
                'nickname'=>$result['nickname']
            ];
            $token = JWT::getToken($payload,config('jwtkey'));
            return json([
                'code'=>200,
                'msg'=>'登陆成功',
                'token'=>$token,
                'collection'=>$collection
            ]);
        }else{
            return json([
                'code'=>404,
                'msg'=>'登陆失败'
            ]);
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
