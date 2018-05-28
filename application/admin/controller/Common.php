<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Common extends Controller
{
    protected function _initialize()
    {
        if (!session('id') || !session('name')) {
            $this->error('你尚未登录！', url('login/index'));
        }
        $auth = new Auth();
        $request = Request::instance();
        $con = $request->controller();
        $action = $request->action();
        $name = $con . '/' . $action;
        $notCheck = array('Index/index', 'Admin/lst', 'Admin/logout');
        if (session('id') != 1) {
            if (!in_array($name, $notCheck)) {
                if (!$auth->check($name, session('id'))) {
                    $this->error('没有权限！', url('index/index'));
                }
            }
        }
    }
}
