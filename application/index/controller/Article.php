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

    public function zan()
    {
        db('article')->where(['id'=>input('artId')])->setInc('zan');
        $zanCount = db('article')->field('zan')->where(['id'=>input('artId')])->find();
        return $zanCount;
    }
}
