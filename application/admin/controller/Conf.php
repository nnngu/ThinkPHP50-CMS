<?php

namespace app\admin\controller;

class Conf extends Common
{
    public function lst()
    {
        if (request()->isPost()) {
            $sorts = input('post.');
            foreach ($sorts as $k => $v) {
                \app\admin\model\Conf::update(['id' => $k, 'sort' => $v]);
            }
            $this->success('更新排序成功！', url('lst'));
            return;
        }
        $conf = new \app\admin\model\Conf();
        $confRes = $conf->order('sort desc')->paginate(5);
        $this->assign('confRes', $confRes);
        return view();
    }

    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $conf = new \app\admin\model\Conf();
            if ($conf->save($data)) {
                $this->success('添加配置成功！', url('lst'));
            } else {
                $this->error('添加配置失败！');
            }
        }
        return view();
    }

    public function edit()
    {
        return view();
    }
}
