<?php

namespace app\index\controller;

use app\index\model\Conf;
use think\Controller;

class Common extends Controller
{
    protected function _initialize()
    {
        $conf = new Conf();
        $_confRes = $conf->getAllConf();
        $confRes = array();
        foreach ($_confRes as $k => $v) {
            $confRes[$v['enname']] = $v['value'];
        }
        $this->assign('confRes', $confRes);
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
}
