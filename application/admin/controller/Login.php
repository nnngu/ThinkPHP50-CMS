<?php

namespace app\admin\controller;

use think\Controller;

class Login extends Controller
{
    public function index()
    {
        if (request()->isPost()) {
            $adminModel = new \app\admin\model\Admin();
            $num = $adminModel->login(input('post.'));
            if ($num == 1) {
                $this->error('用户不存在！');
            }
            if ($num == 2) {
                $this->success('登陆成功！', url('index/index'));
            }
            if ($num == 3) {
                $this->error('密码错误！');
            }
            return;
        }
        return view();
    }
}
