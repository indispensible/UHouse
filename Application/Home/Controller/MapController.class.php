<?php

//命名空间
namespace Home\Controller;
use Think\Controller;

class MapController extends Controller {
    

    function map(){


        /*
        $condo=new \Model\rent_condoModel(); 
        $condo -> limit(100);
        $info=$condo->select();
        */
        //$this -> assign('info',$info);

        $this -> display();

        }

    function markerchange(){

    	$loc = $_POST['loc'];
        $price_min=$_POST['price_min'];
        $price_max=$_POST['price_max'];
        $area_min=$_POST['area_min'];
        $area_max=$_POST['area_max'];
        $room=$_POST['room'];


        $condo=D('rent_condo');
    
        
        if($room==0){
            $sql="select *
             from uhouse_rent_condo
             where rent_housing='$loc' AND
                   rent_condo_price Between '$price_min' and '$price_max' AND
                   rent_condo_area Between '$area_min' and '$area_max'
             ";
        }else{
            $sql="select *
             from uhouse_rent_condo
             where rent_housing='$loc' AND
                   rent_condo_price Between '$price_min' and '$price_max' AND
                   rent_condo_area Between '$area_min' and '$area_max' AND
                   rent_condo_type = '$room'
             ";
        }
        


        $data=$condo->query($sql);
        
        return show(0,'登录成功',$data);
    }
}
