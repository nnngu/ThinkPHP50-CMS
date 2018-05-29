<?php

namespace app\index\controller;


use app\index\model\Cate;

class Page extends Common
{
    public function index()
    {
        $cates = db('cate')->find(input('cateid'));
        $cate = new Cate();
        $cateInfo = $cate->getCateInfo(input('cateid'));
        $this->assign('cates', $cates);
        $this->assign('cateInfo', $cateInfo);
        return view('page');
    }
}
