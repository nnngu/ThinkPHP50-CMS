<?php

namespace app\admin\controller;


class AuthGroup extends Common
{
    public function lst()
    {
        $authGroupRes = \app\admin\model\AuthGroup::paginate(3);
        $this->assign('authGroupRes', $authGroupRes);
        return view();
    }

    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $add = db('auth_group')->insert($data);
            if ($add) {
                $this->success('添加用户组成功！', url('lst'));
            } else {
                $this->error('添加用户组失败！');
            }
            return;
        }
        return view();
    }
}
