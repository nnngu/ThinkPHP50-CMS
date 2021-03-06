<?php

namespace app\index\model;


use think\Model;

class Article extends Model
{
    public function getAllArticles($cateId)
    {
        $cate = new Cate();
        $allCateId = $cate->getChildrenId($cateId);
        $artRes = $this->db('article')->order('id desc')->where("cateid IN($allCateId)")->paginate(2);
        return $artRes;
    }

    public function getHotArticles($cateId)
    {
        $cate = new Cate();
        $allCateId = $cate->getChildrenId($cateId);
        $artRes = $this->db('article')->order('click desc')->where("cateid IN($allCateId)")->limit(5)->select();
        return $artRes;
    }

    public function getSearchHot()
    {
        $artRes = $this->db('article')->order('click desc')->limit(5)->select();
        return $artRes;
    }

    public function getSiteHot()
    {
        $siteHotArt = $this->field('id, title, thumb')->order('click desc')->limit(5)->select();
        return $siteHotArt;
    }

    public function getNewArticle()
    {
        $newArticleRes = db('article')->field('a.id, a.title, a.desc, a.thumb, a.click, a.zan, a.time, c.catename')->alias('a')->join('bk_cate c', 'a.cateid=c.id')->order('a.id desc')->limit(10)->select();
        return $newArticleRes;
    }

    public function getRecArt()
    {
        $recArt = $this->where('rec', '=', 1)->field('id, title, thumb')->order('id desc')->limit(4)->select();
        return $recArt;
    }
}
