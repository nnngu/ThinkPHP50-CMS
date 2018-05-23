<?php

namespace app\admin\controller;


class Cate extends Common
{
    public function lst()
    {
        $cate = new \app\admin\model\Cate();
        $adminres = db('admin')->select();
        $this->assign('adminres', $adminres);
        return view();
    }

    public function add()
    {
        return view();
    }
}
