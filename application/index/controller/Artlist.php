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
        $posArr = $cate->getParents(input('cateid'));
        $this->assign('artRes', $artRes);
        $this->assign('hotRes', $hotRes);
        $this->assign('posArr', $posArr);
        return view('artlist');
    }
}
