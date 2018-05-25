<?php

namespace app\admin\controller;


use think\Loader;

class Admin extends Common
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
            $validate = Loader::validate('Admin');
            if(!$validate->scene('add')->check(input('post.'))){
                $this->error($validate->getError());
            }

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
            $validate = Loader::validate('Admin');
            if(!$validate->scene('edit')->check(input('post.'))){
                $this->error($validate->getError());
            }

            $data = input('post.');
            $adminModel = new \app\admin\model\Admin();
            $savenum = $adminModel->saveadmin($data, $admins);
            if ($savenum == '2') {
                $this->error('管理员的用户名不能为空！');
            }
            if ($savenum !== false) {
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

    public function del($id)
    {
        $adminModel = new \app\admin\model\Admin();
        $delnum = $adminModel->deladmin($id);
        if ($delnum == 1) {
            $this->success('删除管理员成功！', url('lst'));
        } else {
            $this->error('删除管理员失败！');
        }
    }

    public function logout()
    {
        session(null);
        $this->success('退出系统成功！', url('login/index'));
    }
}
