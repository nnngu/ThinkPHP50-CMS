<?php

namespace app\admin\controller;

use think\Controller;

class Common extends Controller
{
    protected function _initialize()
    {
        if (!session('id') || !session('name')) {
            $this->error('你尚未登录！', url('login/index'));
        }
    }
}
