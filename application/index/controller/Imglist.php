<?php

namespace app\index\controller;


class Imglist extends Common
{
    public function index()
    {
        $article = new \app\index\model\Article();
        $artRes = $article->getAllArticles(input('cateid'));
        $this->assign('artRes', $artRes);

        return view('imglist');
    }
}
