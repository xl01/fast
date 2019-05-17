<?php
namespace app\index\controller;

use app\base\controller\Base;

class User extends Base{
    //初始化模型
    private $obj='';
    public function _initialize()
    {
        $this->obj=model('base/user');
    }
    public function add(){
        $map=[
            'nickname'=>'xiaoming',
        ];
        $this->obj->save($map);
    }
}