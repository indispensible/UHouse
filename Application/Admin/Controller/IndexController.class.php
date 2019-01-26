<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if(!session('adminUser')) {
            $this->redirect('/uhouse/admin.php?c=Login');
        }
        $this->display();
    }
}