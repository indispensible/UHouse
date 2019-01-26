<?php
namespace Admin\Model;
use Think\Model;

class landlordModel extends Model{

    private $_db="";

    public function __construct(){
        $this->_db=M('landlord');
    }

    public function releaseHouse($username='',$data=''){
        if(!$data || !is_array($data)){
            throw_exception("提交的房源数据有问题！");
        }

        return $this->_db->add($data);
    }

    public function displayByLvgang($username='',$page='',$pageSize=''){
    if(!$username){
        throw_exception("操作错误，得不到用户名！");
    }

    $data=Array(
        'username' => $username,
        'status'   => 1
    );

    $offset=($page-1)*$pageSize;

    return $this->_db->where($data)->order('house_id desc')->limit($offset,$pageSize)->select();
    }

    public function displayByLvgangOld($username=''){
        if(!$username){
            throw_exception("操作错误，得不到用户名！");
        }

        $data=Array(
            'username' => $username,
            'status'   => 1
        );


        return $this->_db->where($data)->select();
    }

    public function getHouseCount($username=''){
        if(!$username){
            throw_exception("尼玛，又错了，用户名又不见了！");
        }

        $data=Array(
            'username' => $username,
            'status'   => 1
        );

        return $this->_db->where($data)->count();
    }

    public function editHouse($house_id=''){
        if(!$house_id){
            throw_exception("我的妈啊，house_id没有传过来！");
        }

        return $this->_db->where('house_id="'.$house_id.'"')->find();
    }

    public function deleteByLvgang($username='',$house_id=''){
        if(!$username){
            throw_exception("尼玛，这次是delete中的用户名找不到了！");
        }
        if(!$username){
            throw_exception("尼玛，这次是delete中的house_id找不到了！");
        }

        $data=Array(
            'status'=>-1
        );

        $query=Array(
            'username'=>$username,
            'house_id'=>$house_id
        );

        return $this->_db->where($query)->save($data);
    }

    public function updateByLvGang($house_id='',$data=''){
        if(!$house_id || !$data || !is_array($data)){
            throw_exception("又出错了！在Landlord的updateByLvGang中出错！");
        }

        return $this->_db->where('house_id="'.$house_id.'"')->save($data);
    }

}