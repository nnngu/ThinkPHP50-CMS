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
}
