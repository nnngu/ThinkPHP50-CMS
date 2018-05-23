<?php

namespace app\admin\controller;


class Article extends Common
{
    public function lst()
    {
        return view();
    }

    public function add()
    {
        $cate = new \app\admin\model\Cate();
        $cateres = $cate->cateTree();
        $this->assign('cateres', $cateres);
        return view();
    }

    public function edit()
    {
        return view();
    }
}
