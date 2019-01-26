<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;

class PersonController extends Controller{

    private $_uploadObi;

   //房东登录
    public function index(){

        $username=getLoginUsername();
        $ret=D('Admin')->getAdminByUsername($username);
        $this->assign('ret',$ret);
        $this->display();
    }

    public function renter(){
        $username=getRenterUsername();
        $ret=D('Renterlogin')->getAdminByUsername($username);
        $this->assign('ret',$ret);
        $this->display();
    }

    public function check(){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $realname=$_POST['realname'];
        $phone=$_POST['phone'];
        $image=$_POST['thumb'];

        if(!trim($username)){
            return show(0,"用户名不能为空");
        }
        if(!trim($password)){
            return show(0,"密码不能为空");
        }
        if(!trim($realname)){
            return show(0,"真实姓名不能为空！");
        }
        if(!trim($phone)){
            return show(0,"电话号码不能为空");
        }

        if(!trim($image)){
            $data=Array(
                "username"=>$username,
                "password"=>$password,
                "realname"=>$realname,
                "phone"=>$phone,
                'image'=>'/uhouse/Public/images/img.jpg'
            );
        }else{
            $data=Array(
                "username"=>$username,
                "password"=>$password,
                "realname"=>$realname,
                "phone"=>$phone,
                'image'=>$image
            );
        }


        D('Person')->updatePersonInfo($username,$data);

        $ret=D('Admin')->getAdminByUsername($username);

        if(!ret){
            return show(0,"更新失败");
        }

        session('adminUser',$ret);

        return show(1,"更新成功");

    }

   //租客登录
    public function checkRenter(){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $realname=$_POST['realname'];
        $phone=$_POST['phone'];
        $image=$_POST['thumb'];

        if(!trim($username)){
            return show(0,"用户名不能为空");
        }
        if(!trim($password)){
            return show(0,"密码不能为空");
        }
        if(!trim($realname)){
            return show(0,"真实姓名不能为空！");
        }
        if(!trim($phone)){
            return show(0,"电话号码不能为空");
        }

        if(!trim($image)){
            $data=Array(
                "username"=>$username,
                "password"=>$password,
                "realname"=>$realname,
                "phone"=>$phone,
                'image'=>'/uhouse/Public/images/img.jpg'
            );
        }else{
            $data=Array(
                "username"=>$username,
                "password"=>$password,
                "realname"=>$realname,
                "phone"=>$phone,
                'image'=>$image
            );
        }


        D('Person')->updateRenterInfo($username,$data);

        $ret=D('Renterlogin')->getAdminByUsername($username);

        if(!ret){
            return show(0,"更新失败");
        }

        session('adminRenter',$ret);

        return show(1,"更新成功");

    }

    public function ajaxuploadimage(){
       $res=D('Person')->imageUpload();
       if($res === false){
           return show(0,"上传失败！",'');
       }else{
           return show(1,"上传成功！",$res);
       }

    }

}