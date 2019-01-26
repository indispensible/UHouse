<?php
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller{

    public function index(){
        if(session('adminUser')) {
            $this->redirect('/uhouse/admin.php?c=index');
        }
        // admin.php?c=index
        $this->display();
    }

    public function check(){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $ret=D('Admin')->getAdminByUsername($username);

        if(!$ret || intval($ret['status'])!=1)
        {
            return show(0,"该用户不存在");
        }

        if(intval($ret['password'])!=$password){
            return show(0,"密码错误");
        }

        session('adminUser', $ret);
        return show(1,"登录成功");

    }

    public function register(){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $phone=$_POST['phone'];
        $realname=$_POST['realname'];

        $type=1;

        if(!$username || !password){
            return show(0,"你申请的账号或者密码有误！");
        }

        $ret=D('Admin')->getAdminByUsername($username);
        if($ret && intval($ret['status']==1)){
            return show(0,"该用户名已存在，请换一个！");
        }

        $data=array(
            "username" => $username,
            "password" => $password,
            "phone"    => $phone,
            "realname" => $realname,
            "status"   => 1,
            "type"     => $type,
            "image"    => '/uhouse/Public/images/img.jpg'
        );

        $newRet=D('Admin')->addByUsername($data);
        if(!$newRet){
            return show(0,"新增失败！");
        }

        session('adminUser',$data);
        return show(1,"新增成功！");

    }

    public function loginout(){
        session('adminUser',null);
        $this->redirect('/uhouse/admin.php?c=login');
    }
}