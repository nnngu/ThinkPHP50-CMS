<?php

namespace app\index\controller;


use app\index\model\Cate;

class Search extends Common
{
    public function index()
    {
//        $article = new \app\index\model\Article();
//        $artRes = $article->getAllArticles(input('cateid'));
//        $hotRes = $article->getHotArticles(input('cateid'));
//        $cate = new Cate();
//        $cateInfo = $cate->getCateInfo(input('cateid'));
//        $this->assign('artRes', $artRes);
//        $this->assign('hotRes', $hotRes);
//        $this->assign('cateInfo', $cateInfo);

        $keywords = input('keywords');
        $serRes = db('article')->order('id desc')->where('title', 'like', '%'.$keywords.'%')->paginate(3, false, $config=[]);
        $this->assign('serRes', $serRes);
        return view('search');
    }
}
