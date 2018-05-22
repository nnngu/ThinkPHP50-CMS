<?php

namespace app\admin\controller;

use think\Controller;

class Admin extends Controller
{
    public function lst()
    {
//        $res = Db::table('bk_admin')->select();
//        dump($res);die;

        $admin = new \app\admin\model\Admin();
        $res = $admin->select();
        foreach ($res as $key => $value) {
            echo $value->password;
            echo '<br>';
        }
        die;
        return view();
    }

    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');

            $admin = new \app\admin\model\Admin();
            $res = $admin->addadmin($data);
            if ($res) {
                $this->success('添加管理员成功！', url('lst'));
            } else {
                $this->error('添加管理员失败！');
            }
            return;
        }
        return view();
    }

    public function edit()
    {
        return view();
    }
}
