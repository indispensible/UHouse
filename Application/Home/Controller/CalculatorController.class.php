<?php

//命名空间
namespace Home\Controller;
use Think\Controller;

class CalculatorController extends Controller {
    

    function calculator(){


        /*
        $condo=new \Model\rent_condoModel(); 
        $condo -> limit(100);
        $info=$condo->select();
        */
        //$this -> assign('info',$info);

        $this -> display();

        }
}
