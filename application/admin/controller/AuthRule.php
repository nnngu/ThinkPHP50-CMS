<?php

namespace app\admin\controller;


class AuthRule extends Common
{
    public function lst()
    {
        return view();
    }

    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $plevel = db('auth_rule')->where('id', $data['pid'])->field('level')->find();
            if ($plevel) {
                $data['level'] = $plevel['level']+1;
            } else {
                $data['level'] = 0;
            }
            $add = db('auth_rule')->insert($data);
            if ($add) {
                $this->success('添加权限成功！', url('lst'));
            } else {
                $this->error('添加权限失败！');
            }
            return;
        }
        $authRuleRes = db('auth_rule')->select();
        $this->assign('authRuleRes', $authRuleRes);
        return view();
    }
}
