<?php

namespace app\admin\validate;

use think\Validate;

class Cate extends Validate
{
    protected $rule = [
        'catename' => 'require|max:25|unique:cate',
    ];

    protected $message = [
        'catename.require' => ' 栏目名称不能为空！',
        'catename.max' => '栏目名称长度不能大于25个字符！',
        'catename.unique' => '栏目名称不能重复！',
    ];

    protected $scene = [
        'add' => ['catename'],
        'edit' => ['catename'],
    ];
}
