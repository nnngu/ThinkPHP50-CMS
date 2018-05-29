<?php

namespace app\index\controller;


use app\index\model\Cate;

class Index extends Common
{
    public function index()
    {
        // 首页最新文章调用
        $articleM = new \app\index\model\Article();
        $newArticleRes = $articleM->getNewArticle();
        $siteHotArt = $articleM->getSiteHot();
        // 获取推荐文章
        $recArt = $articleM->getRecArt();
        // 获取推荐栏目
        $cateM = new Cate();
        $recIndex = $cateM->getRecIndex();
        // 友情链接
        $linkRes = db('link')->order('sort desc')->select();
        $this->assign([
            'newArticleRes'=>$newArticleRes,
            'siteHotArt'=>$siteHotArt,
            'linkRes'=>$linkRes,
            'recArt'=>$recArt,
            'recIndex'=>$recIndex,
        ]);
        return view();
    }
}
