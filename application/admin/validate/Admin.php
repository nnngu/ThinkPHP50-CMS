<?php

namespace app\admin\validate;

use think\Validate;

class Admin extends Validate
{
    protected $rule = [
        'name' => 'require|max:25|unique:admin',
        'password' => 'require|min:6',
    ];

    protected $message = [
        'name.require' => ' 管理员名称不能为空！',
        'name.max' => '管理员名称长度不能大于25个字符！',
        'name.unique' => '管理员名称不能重复！',
        'password.require' => ' 密码不能为空！',
        'password.min' => '密码长度不能小于6位！',
    ];

    protected $scene = [
        'add' => ['name', 'password'],
        'edit' => ['name', 'password'=>'min:6'],
    ];
}
