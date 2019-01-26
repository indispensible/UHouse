<?php
namespace Admin\Model;
use Think\Model;

class RenterloginModel extends Model{
    private $_db='';

    public function __construct(){
        $this->_db=M('renter');
    }

    public function getAdminByUsername($username=''){
        $res=$this->_db->where('username="'.$username.'"')->find();
        return $res;
    }

    public function addByUsername($data){
        if(!$data || !is_array($data)){
            throw_exception("新增的用户数据不合法！");
        }
        return $this->_db->add($data);

    }

}