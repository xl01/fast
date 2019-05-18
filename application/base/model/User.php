<?php
namespace app\base\model;

use think\Model;

class User extends Model{
    //设置完整的数据表(包含前缀)
    protected $table='fa_user';
    //设置数据表(不含前缀)
    protected $name="user";
    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = true;
    // 设置单独的数据库连接
    // protected $connection = [
    //     // 数据库类型
    //     'type' => 'mysql',
    //     // 服务器地址
    //     'hostname' => '127.0.0.1',
    //     // 数据库名
    //     'database' => 'test',
    //     // 数据库用户名
    //     'username' => 'root',
    //     // 数据库密码
    //     'password' => '',
    //     // 数据库连接端口
    //     'hostport' => '',
    //     // 数据库连接参数
    //     'params' => [],
    //     // 数据库编码默认采用utf8
    //     'charset' => 'utf8',
    //     // 数据库表前缀
    //     'prefix' => 'think_',
    //     // 数据库调试模式
    //     'debug' => true,
    //     ];
    protected $dateFormat='Y-m-d';
    protected $type=[
        //设置birthday为时间戳类型
        'birthday'=>'timestamp',
        'travel'=>'json'
    ];
    // 定义自动完成的属性 除了 insert 属性之外，自动完成共有三个属性定义，分别是：auto insert update
    protected $insert = ['status' => 1];
    //status查询范围
    protected function scopeStatus($query){
        $query->where('status',1);
    }
}