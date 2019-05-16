<?php
namespace app\index\controller;

use app\base\controller\Base;
use think\Request;
use think\Config;

class Index extends Base
{
    public function index()
    {

        return $this->fetch();
    }
    public function hello($name='thinkphp'){
        return 'hello '.$name;
    }

    public function req(){
        //方式一 传统方式
        //$request=Request::instance();
        // halt($request->url());
        //方式二 继承了Controller
        halt($this->request->url());
    }
    //方式三 注入。参数为系统自动注入，访问时不需要传参。
    public function req2(Request $request){
        halt($request->url());
    }
    public function test(Request $request){
        $param=[
            'name'=>'tom',
            'age'=>'18'
        ];
        Config::set('default_return_type','json');
        return $param;
        // halt($request->host());
        // halt($this->request->param('name','word','strtoupper'));
        // halt(request()->param());
        // halt(request()->param());
    }
}
