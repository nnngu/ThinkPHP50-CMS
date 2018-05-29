<?php

namespace app\index\controller;


use app\index\model\Cate;

class Imglist extends Common
{
    public function index()
    {
        $article = new \app\index\model\Article();
        $artRes = $article->getAllArticles(input('cateid'));
        $cate = new Cate();
        $cateInfo = $cate->getCateInfo(input('cateid'));
        $this->assign('artRes', $artRes);
        $this->assign('cateInfo', $cateInfo);

        return view('imglist');
    }
}
