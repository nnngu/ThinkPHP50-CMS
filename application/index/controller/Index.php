<?php

namespace app\index\controller;


class Index extends Common
{
    public function index()
    {
        // 首页最新文章调用
        $articleM = new \app\index\model\Article();
        $newArticleRes = $articleM->getNewArticle();
        $this->assign([
            'newArticleRes'=>$newArticleRes,
        ]);
        return view();
    }
}
