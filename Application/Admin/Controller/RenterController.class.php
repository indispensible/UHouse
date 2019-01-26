<?php
namespace Admin\Controller;
use Think\Controller;

class RenterController extends Controller{
    public function index(){
        if(!session('adminRenter')) {
            $this->redirect('/uhouse/admin.php?c=Renterlogin');
        }
        $this->display();
    }

    public function liked(){
        $username=getRenterUsername();
        $ret=D('Like')->getAllLikeHouse($username);
        $count=count($ret);
        $res=D('Like')->getLike($ret,$count);
        $this->assign('lvgang',$res);
        $this->display();
    }

    public function recommend(){
        $this->display();
    }

    public function check(){
        $username=getRenterUsername();
        $rent_condo_id=$_POST['rent_condo_id'];
        if(!$rent_condo_id){
            return throw_exception("rent_condo_id缺少！");
        }
        if(!$username){
            return show(0,"没有登录！");
        }
        $data=$_POST;
        $data['status']=1;
        $data['username']=$username;

        $res=D('Like')->queryLike($data);
        if($res){
            return show(1,"已经关注了！");
        }

        $ret=D('Like')->addLikeCondo($data);

        if(!$ret){
            return show(0,"LikeModel存储出错了！");
        }

        return show(1,"关注成功！");

    }

    public function delete(){
        $data=$_POST;
        if(!$data){
            return show(0,"数据缺失于c=Renter&a=delete!");
        }

        $ret=D('like')->deleteLike($data);

        if(!$ret){
            return show(0,"删除失败！");
        }

        return show(1,"删除成功！");
    }
}