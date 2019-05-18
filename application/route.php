<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    // '__pattern__' => [
    //     'name' => '\w+',
    // ],
    // '[hello]'     => [
    //     ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
    //     ':name' => ['index/hello', ['method' => 'post']],
    // ],
    // //添加路由规则 路由到 index控制器的hello操作方法
    // 'hello/[:name]'=>'index/index/hello',
    // //闭包定义
    // 'nihao/[:name]'=>function($name='thinkphp'){
    //     return '你好 '.$name.'!';
    // },
    // //路由规则
    // 'blog/:year/:month'=>['blog/archive',['method'=>'get'],['year'=>'\d{4}','month'=>'\d{2}']],
    // 'blog/:id'         =>['blog/get',['method'=>'get'],['id'=>'\d+']],
    // 'blog/:name'         =>['blog/read',['method'=>'get'],['name'=>'\w+']],
    // //路由分组
    // '[blog]'=>[
    //     ':year/:month'=>['blog/archive',['method'=>'get'],['year'=>'\d{4}','month'=>'\d{2}']],
    //     ':id'=>['blog/get',['method'=>'get'],['id'=>'\d+']],
    //     ':name' => ['blog/read', ['method' => 'get'], ['name' => '\w+']],
    // ],
    //变量规则统一定义
    '__pattern__'=>[
        'name'=>'\w+',
        'id'  =>'\d+',
        'year'=>'\d{4}',
        'month'=>'\d{2}',
    ],
    //路由规则定义
    'blog/:id'  =>'blog/get',
    'blog/:name'  =>'blog/read',
    'blog-<year>-<month>'  =>'blog/archive',
    //用户路由规则定义
    'user/index'=>'index/user/index',
    'user/create'=>'index/user/create',
    'user/add'=>'index/user/add',
    'user/add_list'=>'index/user/add_list',
    'user/update/:id'=>'index/user/update',
    'user/delete/:id'=>'index/user/delete',
    'user/:id'=>'index/user/read',
];
