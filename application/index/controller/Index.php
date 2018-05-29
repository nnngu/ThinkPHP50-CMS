<?php

namespace app\index\controller;


class Index extends Common
{
    public function index()
    {
        // 首页最新文章调用
        $articleM = new \app\index\model\Article();
        $newArticleRes = $articleM->getNewArticle();
        $siteHotArt = $articleM->getSiteHot();
        $recArt = $articleM->getRecArt();
        // 友情链接
        $linkRes = db('link')->order('sort desc')->select();
        $this->assign([
            'newArticleRes'=>$newArticleRes,
            'siteHotArt'=>$siteHotArt,
            'linkRes'=>$linkRes,
            'recArt'=>$recArt,
        ]);
        return view();
    }
}
