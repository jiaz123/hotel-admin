<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Exception;
use think\Request;

class Detail extends Controller
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
        $homestayWhere=['sid'=>$id];
        $recommendWhere = [
            'sid'=>['<>',$id]
        ];
        try {
            $homestay=Db::table('homestay')->where($homestayWhere)->find();
            $homestay['sbanner'] = explode(',',$homestay['sbanner']);
            $recommend=Db::table('homestay')->where($recommendWhere)->field('sid,sthumb,sname,sprice,sscore,scity,sarea')->order('sid','desc')->limit(0,4)->select();

            return json([
                'code'=>200,
                'msg'=>'',
                'data'=>[
                    'homestay'=>$homestay,
                    'recommend'=>$recommend
                ]
            ]);
        }catch (Exception $exception){
            return json([
                'code'=>404,
                'msh'=>'服务器错误'
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
