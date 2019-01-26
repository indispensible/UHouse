<?php
namespace Admin\Controller;
use Think\Controller;

class landlordController extends Controller{

    private $house_id='';

    public function index(){
        $username=getLoginUsername();
        $oldres=D('Landlord')->displayByLvgangOld($username);

        /**
         * 分页逻辑操作@lvgang;
         * 多多加油！
         */
        $page=$_REQUEST['p']?$_REQUEST['p']:1;
        $pageSize=$_REQUEST['pageSize']?$_REQUEST['pageSize']:10;
        $res=D('Landlord')->displayByLvgang($username,$page,$pageSize);

        $houseCount=D('Landlord')->getHouseCount($username);
        $lvgangs=new \Think\Page($houseCount,$pageSize);
        $pageRes=$lvgangs->show();
        $pageLvgang=$lvgangs->showlvgang();

        header('Content-Type:text/html; charset=utf-8');
        $this->assign('lvgang',$res);
        $this->assign('pageLvgang',$pageLvgang);
        $this->assign('houseCount',$houseCount);
        $this->display();

    }

    public function release(){
        $this->display();
    }

    public function check(){
        $username=$_POST['username'];
        $community_city=$_POST['community_city'];
        $community_name=$_POST['community_name'];
        $house_location=$_POST['house_location'];
        $area=$_POST['area'];
        $community_location=$_POST['community_location'];
        $price=$_POST['price'];
        $type=$_POST['type'];
        $detail=$_POST['detail'];
        $data=$_POST;

        if(!trim($community_city)){
            return show(0,"城市名不能为空！");
        }
        if(!trim($community_name)){
            return show(0,"小区不能为空！");
        }
        if(!trim($house_location)){
            return show(0,"房屋地址不能为空！");
        }
        if(!trim($area)){
            return show(0,"面积不能为空！");
        }
        if(!trim($community_location)){
            return show(0,"消去地址不能为空！");
        }
        if(!trim($price)){
            return show(0,"租金不能为空！");
        }
        if(!trim($type)){
            return show(0,"户型不能为空！");
        }
        if(!trim($detail)){
            $detail="啊偶，房屋主人没有给出对房屋的评价！";
            $data['detail']=$detail;
        }

        $res=D('Landlord')->releaseHouse($username,$data);
       if(!$res){
           return show(0,"发布失败！");
       }

           return show(1,"发布成功！");

    }

    public function edit(){
        $house_id=$_POST['house_id'];
        $res=D('Landlord')->editHouse($house_id);

        if(!$res){
            return show(0,"不能编辑！");
        }

        session('Landlord',$res);

        return show(1,"可以编辑！");


    }

    public function update(){
        $house_id=getHouseId();
        $res=D('Landlord')->editHouse($house_id);
        if(!$res){
            throw_exception("house_id不存在！");
        }

        $this->assign('vo',$res);
        $this->display();
    }



    public function ajaxuploadimage(){
        $res=D('Person')->imageUpload();
        if($res===false){
            return show(0,"上传失败！",'');
        }else{
            return show(1,"上传成功！",$res);
        }
    }




    public function delete(){
        $username=$_POST['username'];
        $house_id=$_POST['house_id'];
        $res=D('Landlord')->deleteByLvgang($username,$house_id);

        if(!$res){
            return show(0,"删除失败！");
        }

        return show(1,"删除成功！");

    }

    public function checkId(){
        $house_id=getHouseId();
        $data=$_POST;
        $data['house_id']=$house_id;
        $res=D('Landlord')->updateByLvGang($house_id,$data);
        if(!$res){
            return show(0,"数据更新失败！");
        }

        return show(1,"更新成功！");
    }

    public function prepare(){
        $house_id=$_POST['house_id'];
        $res=D('Landlord')->editHouse($house_id);
        if(!$res){
            return show(0,"由于bug，详情页看不了！");
        }
        session('Landlord',$res);
        return show(1,"可以查看！");
    }

    public function detail(){
        $house_id=getHouseId();
        $username=getLoginUsername();
        $res=D('Landlord')->editHouse($house_id);
        if(!$res){
            throw_exception("house_id没有找到于c=Landlord&a=detail！");
        }

        $ret=D('Admin')->getAdminByUsername($username);
        if(!$ret){
            throw_exception("username没有找到于c=Landlord&a=detail！");
        }

        $this->assign("vo",$res);
        $this->assign("lvvo",$ret);
        $this->display();
    }
}