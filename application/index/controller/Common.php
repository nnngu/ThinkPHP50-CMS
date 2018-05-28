<?php

namespace app\index\controller;

use app\index\model\Cate;
use app\index\model\Conf;
use think\Controller;

class Common extends Controller
{
    protected function _initialize()
    {
        if (input('cateid')) {
            $this->getPos(input('cateid'));
        }
        if (input('artid')) {
            $articles = db('article')->field('cateid')->find(input('artid'));
            $cateid = $articles['cateid'];
            $this->getPos($cateid);
        }
        $this->getConf();
        $this->getNavCates();
    }

    public function getNavCates()
    {
        $cateRes = db('cate')->where(array('pid'=>0))->select();
        foreach ($cateRes as $k=>$v) {
            $children = db('cate')->where(array('pid'=>$v['id']))->select();
            if ($children) {
                $cateRes[$k]['children'] = $children;
            } else {
                $cateRes[$k]['children'] = 0;
            }
        }
        $this->assign('cateRes', $cateRes);
    }

    public function getConf()
    {
        $conf = new Conf();
        $_confRes = $conf->getAllConf();
        $confRes = array();
        foreach ($_confRes as $k => $v) {
            $confRes[$v['enname']] = $v['value'];
        }
        $this->assign('confRes', $confRes);
    }

    public function getPos($cateid)
    {
        $cate = new Cate();
        $posArr = $cate->getParents($cateid);
        $this->assign('posArr', $posArr);
    }
}
