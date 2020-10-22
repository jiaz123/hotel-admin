<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{


    public function index(){
        // 轮播图
        $banner = Db::table('homestay')->field('sid,sname,sthumb')->order('sid','asc')->limit(0,3)->select();
//        分类
        $category = Db::table('category')->field('cid,cname,cdesc')->order('cid','asc')->limit(0,4)->select();

        for ($i=0,$count=count($category);$i<$count;$i++){
            $cid=$category[$i]['cid'];
            $homestay=Db::table('homestay')->field('sid,sthumb,sname,sdesc,sprice,sscore,stag,scity,sarea')->where('cid',$cid)->order('sid','asc')->limit(0,4)->select();
            $category[$i]['children']=$homestay;
        }
        return json([
            'code'=>200,
            'msg'=>'数据获取成功',
            'data'=>[
                'banner'=>$banner,
                'category'=>$category
            ]
        ]);
       /* $banner = Db::table('')->order()->limit(0,3)->select();
        // 分类
        $category = Db::table()->order()->select();
        foreach ($category as $item){
            $cid = $item['cid'];
            $goods=Db::table()->where('cid',$cid)->order()->limit();
            $item['goods']=$goods;
        }
        return json([
            'code'=>200,
            'msg'=>'',
            'data'=>[
                'banner'=>$banner,
                'category'=>$category
            ]
        ]);*/
       /*$pass=md5(crypt(config("defaultPassword"),config('salt')));
        echo $pass;
        $user=Db::table('admin')->where( 'username'=='admin')->find();
        var_dump($user);*/
        /*$student=Db::table('student')->select();

        return json([
            'code'=>200,
            'msg'=> 'success',
            'data'=>$student
        ]) ;*/
    }
//    public function lists(){
//        $student=Db::table('student')->select();
//        $skill=['html','css','js'];
//        $data=['name'=>'zhangsan','age'=>20];
//        $this->assign('person',$data);
//        $this->assign('skill',$skill);
//        $this->assign('student',$student);
//        return $this->fetch();
//    }
}
