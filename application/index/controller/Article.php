<?php

namespace app\index\controller;


class Article extends Common
{
    public function index()
    {
        $artId = input('artid');
        db('article')->where(['id'=>$artId])->setInc('click');
        $articles = db('article')->find($artId);
        $article = new \app\index\model\Article();
        $hotRes = $article->getHotArticles($articles['cateid']);
        $this->assign('articles', $articles);
        $this->assign('hotRes', $hotRes);
        return view('article');
    }
}
