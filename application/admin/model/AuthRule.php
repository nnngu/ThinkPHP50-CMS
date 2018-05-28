<?php

namespace app\admin\model;

use think\Model;

class AuthRule extends Model
{
    public function authRuleTree()
    {
        $authRuleRes = $this->order('sort desc')->select();
        return $this->sort($authRuleRes);
    }

    public function sort($data, $pid = 0)
    {
        static $arr = array();
        foreach ($data as $k => $v) {
            if ($v['pid'] == $pid) {
                $v['dataid'] = $this->getParentId($v['id']);
                $arr[] = $v;
                $this->sort($data, $v['id']);
            }
        }
        return $arr;
    }

    public function getChildrenId($authRuleId)
    {
        $authRuleRes = $this->select();
        return $this->_getChildrenId($authRuleRes, $authRuleId);
    }

    public function _getChildrenId($authRuleRes, $authRuleId)
    {
        static $arr = array();
        foreach ($authRuleRes as $k => $v) {
            if ($v['pid'] == $authRuleId) {
                $arr[] = $v['id'];
                $this->_getChildrenId($authRuleRes, $v['id']);
            }
        }
        return $arr;
    }

    public function getParentId($authRuleId)
    {
        $authRuleRes = $this->select();
        return $this->_getParentId($authRuleRes, $authRuleId, true);
    }

    public function _getParentId($authRuleRes, $authRuleId, $clear=false)
    {
        static $arr = array();
        if ($clear) {
            $arr = array();
        }
        foreach ($authRuleRes as $k => $v) {
            if ($v['id'] == $authRuleId) {
                $arr[] = $v['id'];
                $this->_getParentId($authRuleRes, $v['pid'], false);
            }
        }
        asort($arr);
        $arrStr = implode('-', $arr);
        return $arrStr;
    }
}


