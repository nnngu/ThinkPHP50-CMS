<?php

namespace app\index\controller;


class Artlist extends Common
{
    public function index()
    {
        $article = new \app\index\model\Article();
        $artRes = $article->getAllArticles(input('cateid'));
        $hotRes = $article->getHotArticles(input('cateid'));

        $this->assign('artRes', $artRes);
        $this->assign('hotRes', $hotRes);
        return view('artlist');
    }
}
