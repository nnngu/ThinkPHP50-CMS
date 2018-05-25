<?php

namespace app\admin\validate;

use think\Validate;

class Conf extends Validate
{
    protected $rule = [
        'cnname' => 'require|max:60|unique:conf',
        'enname' => 'require|max:60|unique:conf',
        'type' => 'require',
    ];

    protected $message = [
        'cnname.require' => '中文名称不能为空！',
        'cnname.max' => '中文名称不能大于60个字符！',
        'cnname.unique' => '中文名称不能重复！',
        'enname.require' => '英文名称不能为空！',
        'enname.max' => '英文名称不能大于60个字符！',
        'enname.unique' => '英文名称不能重复！',
        'type.require' => '请选择配置类型！',
    ];

    protected $scene = [
        'edit' => ['cnname', 'enname'],
    ];
}
