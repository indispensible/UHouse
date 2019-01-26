<?php
namespace Admin\Model;
use Think\Model;

class PersonModel extends Model{

    private $_db="";
    private $_database="";
    private $_uploadObj="";
    private $_uploadImageData="";
    const UPLOAD='upload';

    public function __construct(){
        $this->_db=M('user');
        $this->_database=M('renter');
        $this->_uploadObj=new \Think\Upload();
        $this->_uploadObj->rootPath='./'.self::UPLOAD.'/';
        $this->_uploadObj->subName=date(Y).'/'.date(m).'/'.date(d);
    }

    public function upload(){
        $res=$this->_uploadObj->upload();

        if($res){
            return '/'.self::UPLOAD.'/'.$res['imgFile']['savepath'].$res['imgFile']['savename'];
        }else{
            return false;
        }
    }

    public function imageUpload(){
        $res=$this->_uploadObj->upload();

        if($res){
            return '/'.self::UPLOAD.'/'.$res['file']['savepath'].$res['file']['savename'];
        }else{
            return false;
        }
    }

    public function updatePersonInfo($username="",$data=""){
        if(!$data || !is_array($data)){
            throw_exception("更新的数据出现异常！");
        }

        return $this->_db->where('username="'.$username.'"')->save($data);
    }

    public function updateRenterInfo($username="",$data=""){
        if(!$data || !is_array($data)){
            throw_exception("更新的数据出现异常！");
        }

        return $this->_database->where('username="'.$username.'"')->save($data);
    }

}