<?php
namespace app\index\controller;

use app\base\controller\Base;
use think\Request;
use think\Config;
use think\Db;

class Index extends Base
{
    public function index($name='')
    {
        
    }
    public function hello2(){
        return 'hello thinkphp!';
    }
    public function guest(){
        return 'hello guest';
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
    public function testdb(){
        $result=Db::execute('insert into fa_user (id,name) value (?,?)',['10','xiaoliu2']);
        $result=Db::execute('insert into fa_user (id,name) value (:id,:name)',['id'=>'11','name'=>'xiaoliu3']);
        halt($result);
    }

    public function testtransaction(){
        //事务方式一
        Db::transaction(function(){
            Db::table('fa_user')->delete(3);
            Db::table('fa_user')->insert(['id' => 28, 'name' => 'thinkphp', 'status' => 1]);
        });
        //事务方式二
        Db::startTrans();
        try{
            Db::table('fa_user')->delete(3);
            Db::table('fa_user')->insert(['id' => 28, 'name' => 'thinkphp', 'status' => 1]); 
            Db::commit();
        }catch(\Exception $e){
            Db::rollback();
        }
    }

}
