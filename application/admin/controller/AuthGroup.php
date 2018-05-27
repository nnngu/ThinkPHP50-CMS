<?php

namespace app\admin\controller;


class AuthGroup extends Common
{
    public function lst()
    {
        $authGroupRes = \app\admin\model\AuthGroup::paginate(5);
        $this->assign('authGroupRes', $authGroupRes);
        return view();
    }

    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            if (array_key_exists('status', $data)) {
                $data['status'] = 1;
            } else {
                $data['status'] = 0;
            }

            if (array_key_exists('rules', $data)) {
                $data['rules'] = implode(',', $data['rules']);
            } else {
                $data['rules'] = -1;
            }

            $add = db('auth_group')->insert($data);
            if ($add) {
                $this->success('添加用户组成功！', url('lst'));
            } else {
                $this->error('添加用户组失败！');
            }
            return;
        }
        $authRule = new \app\admin\model\AuthRule();
        $authRuleRes = $authRule->authRuleTree();
        $this->assign('authRuleRes', $authRuleRes);
        return view();
    }

    public function edit()
    {
        if (request()->isPost()) {
            $data = input('post.');
            if (array_key_exists('status', $data)) {
                $data['status'] = 1;
            } else {
                $data['status'] = 0;
            }

            if (array_key_exists('rules', $data)) {
                $data['rules'] = implode(',', $data['rules']);
            } else {
                $data['rules'] = -1;
            }

            $save = db('auth_group')->update($data);
            if ($save !== false) {
                $this->success('修改用户组成功！', url('lst'));
            } else {
                $this->error('修改用户组失败！');
            }
            return;
        }

        $authGroups = db('auth_group')->find(input('id'));
        $this->assign('authGroups', $authGroups);
        $authRule = new \app\admin\model\AuthRule();
        $authRuleRes = $authRule->authRuleTree();
        $this->assign('authRuleRes', $authRuleRes);
        return view();
    }

    public function del()
    {
        $del = db('auth_group')->delete(input('id'));
        if ($del) {
            $this->success('删除用户组成功！', url('lst'));
        } else {
            $this->error('删除用户组失败！');
        }
    }
}
