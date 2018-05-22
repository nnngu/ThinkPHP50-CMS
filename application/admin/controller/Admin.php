<?php

namespace app\admin\controller;

use think\Controller;

class Admin extends Controller
{
    public function lst()
    {
        $admin = new \app\admin\model\Admin();
        $adminres = $admin->getadmin();
        $this->assign('adminres', $adminres);
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

    public function edit($id)
    {
        $admins = db('admin')->find($id);

        if (request()->isPost()) {
            $param = input('post.');
            if (!$param['name']) {
                $this->error('管理员的用户名不得为空！');
            }
            if (!$param['password']) {
                $param['password'] = $admins['password'];
            } else {
                $param['password'] = md5($param['password']);
            }

            $adminModel = new \app\admin\model\Admin();
            $res = $adminModel->update($param);
            if ($res !== false) {
                $this->success('修改成功！', url('lst'));
            } else {
                $this->error('修改失败！');
            }
            return;
        }

        if (!$admins) {
            $this->error('该管理员不存在！');
        }
        $this->assign('admin', $admins);
        return view();
    }
}
