<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Collection extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        checkUserToken();
        $uid = $this->request->uid;
        $collectionlist=Db::table('User')->field('collection')->where('uid',$uid)->find();
        if ($collectionlist){
            $collection=Db::table('homestay')->field('sid,sname,sprice,sdesc,sthumb,stag')->where('sid','in',$collectionlist['collection'])->select();
            if ($collection){
                return json([
                    'code'=>200,
                    'msg'=>'数据获取成功',
                    'data'=>$collection
                ]);
            }else{
                return json([
                    'code'=>404,
                    'msg'=>'数据获取失败'
                ]);
            }
        }
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
     * 当前用户的收藏
     * sid
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //

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
