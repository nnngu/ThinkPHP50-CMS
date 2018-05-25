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
    }
}
