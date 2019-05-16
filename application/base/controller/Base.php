<?php
namespace app\base\controller;

use think\Controller;
use think\Request;
use app\base\model\User;
class Base extends Controller{
    public function _initialize(){
        $user=User::get(2);
        Request::instance()->bind('user',$user);
    }
}