<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class User extends Controller
{
    public $model;
    public $code;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->model=model('User');
        $this->code=200;
    }

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
        $data=$this->request->post();
        // 验证规则

        $data['password'] = secretpassword($data['password']);
        $data['nickname'] = $data['nickname'] ? $data['nickname'] : '民宿'.time();
        $model = model('User');
        $result = $model->add($data);
        var_dump($result);
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
        checkUserToken();
        $uid = $this->request->uid;
        $result = $this->model->queryOne(['uid'=>$uid],'uid,avatar,nickname,sex');
        if ($result){
            $result['settext']=sexCodeToText($result['sex']);
            return json([
                'code'=>200,
                'msg'=>'数据获取成功',
                'data'=>$result
            ]);
        }else{
            return json([
                'code'=>404,
                'msg'=>'数据获取失败'
            ]);
        }

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
