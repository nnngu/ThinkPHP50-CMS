<?php

namespace app\index\model;


use think\Model;

class Article extends Model
{
    public function getAllArticles($cateId)
    {
        $cate = new Cate();
        $allCateId = $cate->getChildrenId($cateId);
        $artRes = $this->db('article')->where("cateid IN($allCateId)")->paginate(10);
        return $artRes;
    }
}
