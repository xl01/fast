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
        // if($this->obj->allowField(true)->validate(true)->save(input('post.'))){
        //     return  '用户[ ' . $this->obj->nickname . ':' . $this->obj->id . ' ]新增成功';
        // }else{
        //     return $this->obj->getError();
        // }

        $data = input('post.');
        // 数据验证
        $result = $this->validate($data,'User');
        if (true !== $result) {
        return $result;
        }

        // 数据保存
        $this->obj->allowField(true)->save($data);
        return '用户[ ' . $this->obj->nickname . ':' . $this->obj->id . ' ]新增成功';
        //如果有一些个别的验证没有在验证器里面定义，也可以使用静态方法单独处理，例如下面对birthday字段单独
        //验证是否是一个有效的日期格式：
        $data = input('post.');
        // 验证birthday是否有效的日期
        $check = Validate::is($data['birthday'],'date');
        if (false === $check) {
        return 'birthday日期格式非法';
        }
        $user = new UserModel;
        // 数据保存
        $user->save($data);
        return '用户[ ' . $user->nickname . ':' . $user->id . ' ]新增成功';
    }
    public function read($id){
        $m=$this->obj->get($id);
        
        halt($m->travel);
    }
    public function create(){
        return $this->fetch();
    }
    public function lst(){
        halt($this->obj->scope('status')->select());
    }
    public function index(){
        $list=$this->obj->paginate(3);
        $this->view->replace([
            '__PUBLIC__' => '/static',
            ]);
        return $this->fetch('',[
            'list'=>$list,
            'count'=>count($list)
        ]);
    }
}