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
            if ($data['values']) {
                $data['values'] = str_replace('，', ',', $data['values']);
            }
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
        if (request()->isPost()) {
            $data = input('post.');
            if ($data['values']) {
                $data['values'] = str_replace('，', ',', $data['values']);
            }
            $conf = new \app\admin\model\Conf();
            $save = $conf->save($data, ['id' => $data['id']]);
            if ($save !== false) {
                $this->success('修改配置项成功！', url('lst'));
            } else {
                $this->error('修改配置项失败！');
            }
        }
        $confs = \app\admin\model\Conf::find(input('id'));
        $this->assign('confs', $confs);
        return view();
    }

    public function del()
    {
        $del = \app\admin\model\Conf::destroy(input('id'));
        if ($del) {
            $this->success('删除配置项成功！', url('lst'));
        } else {
            $this->error('删除配置项失败！');
        }
    }

    public function conf()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $formArr = array();
            foreach ($data as $k => $v) {
                $formArr[] = $k;
            }
            $_confArr = db('conf')->field('enname')->select();
            $confArr = array();
            foreach ($_confArr as $k => $v) {
                $confArr[] = $v['enname'];
            }
            $checkboxArr = array();
            foreach ($confArr as $k => $v) {
                if (!in_array($v, $formArr)) {
                    $checkboxArr[] = $v;
                }
            }
            foreach ($checkboxArr as $k=>$v) {
                \app\admin\model\Conf::where('enname', $v)->update(['value'=>'']);
            }
            if ($data) {
                foreach ($data as $k=>$v) {
                    \app\admin\model\Conf::where('enname', $k)->update(['value'=>$v]);
                }
                $this->success('修改配置项成功！');
            }
            return;
        }
        $confRes = \app\admin\model\Conf::order('sort desc')->select();
        $this->assign('confRes', $confRes);
        return view();
    }
}
