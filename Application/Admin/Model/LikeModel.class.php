<?php
namespace Admin\Model;
use Think\Model;

class LikeModel extends Model{
    private $_db="";
    private $_dabs;

    public function __construct(){
        $this->_db=M('like');
        $this->_dabs=M('rent_condo');
    }

    public function addLikeCondo($data=""){
        if(!$data || !is_array($data)){
            throw_exception("错误发生于Admin\Model\LikeModel");
        }

        return $this->_db->add($data);
    }

    public function getAllLikeHouse($username=''){
        if(!$username){
            throw_exception("于LikeModel中没有发现username!");
        }

        return $this->_db->where('username="'.$username.'"')->select();
    }

    public function queryLike($data=""){
        $dataArray=Array(
            "username"=>$data['username'],
            "rent_condo_id"=>$data['rent_condo_id']
        );

        $this->_db->where($data)->find();
    }

    public function getLike($ret='',$count=''){
        $data=Array();
        $num=0;
        for($num;$num<$count;$num++){
            $res=$this->_dabs->where('rent_condo_id="'.$ret[$num]['rent_condo_id'].'"')->find();
            $data[$num]=$res;
        }

        return $data;
    }

    public function deleteLike($data=''){
        if(!$data){
            throw_exception("data缺失！");
        }
        $delete=Array(
            'status'=>-1
        );

        return $this->_db->where($data)->save($delete);
    }
}