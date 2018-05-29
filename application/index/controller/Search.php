<?php

namespace app\index\controller;


class Search extends Common
{
    public function index()
    {
        $article = new \app\index\model\Article();
        $searchHot = $article->getSearchHot();

        $keywords = input('keywords');
        $serRes = db('article')->order('id desc')->where('title', 'like', '%'.$keywords.'%')->paginate(3, false, $config=['query'=>['keywords'=>$keywords]]);
        $this->assign('serRes', $serRes);
        $this->assign('keywords', $keywords);
        $this->assign('searchHot', $searchHot);
        return view('search');
    }
}
