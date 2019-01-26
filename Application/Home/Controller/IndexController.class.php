<?php

//命名空间
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    

    function index(){


        /*
        $condo=new \Model\rent_condoModel(); 
        $condo -> limit(100);
        $info=$condo->select();
        */
        //$this -> assign('info',$info);

        $this -> display();

        }



        
       

    function marker(){
 
    	$condo=D('housing');
    	$sql="select rent_housing
    	     from uhouse_housing
    	     limit 1000";
        $data=$condo->query($sql);
        
        return show(0,'登录成功',$data);
    }

    function info(){

        $loc = $_POST['loc'];
    


        $condo=D('rent_condo');
    
        
   
            
        $sql="select *
             from uhouse_rent_condo
             where rent_housing='$loc'
             order by (rent_condo_price/rent_condo_area)
             ";
        


        $data=$condo->query($sql);
        
        return show(0,'登录成功',$data);

    }

    function housing(){
    
        $loc = $_POST['loc'];
        $condo=D('rent_condo');
        $sql="select *
             from uhouse_housing
             where rent_housing='$loc'
             ";
        $data=$condo->query($sql);
        
        return show(0,'登录成功',$data);
        
        
    }

function Login(){


        $this -> display();

        }


}



    
