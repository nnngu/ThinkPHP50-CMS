<?php

namespace app\index\controller;


use app\index\model\Cate;

class Artlist extends Common
{
    public function index()
    {
        $article = new \app\index\model\Article();
        $artRes = $article->getAllArticles(input('cateid'));
        $hotRes = $article->getHotArticles(input('cateid'));
        $cate = new Cate();
        $cateInfo = $cate->getCateInfo(input('cateid'));
        $this->assign('artRes', $artRes);
        $this->assign('hotRes', $hotRes);
        $this->assign('cateInfo', $cateInfo);
        return view('artlist');
    }
}
