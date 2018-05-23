<?php

namespace app\admin\model;

use think\Model;

class Cate extends Model
{
    public function cateTree()
    {
        $cateres = $this->order('sort desc')->select();
        return $this->sort($cateres);
    }

    public function sort($data, $pid = 0, $level = 0)
    {
        static $arr = array();
        foreach ($data as $k => $v) {
            if ($v['pid'] == $pid) {
                $v['level'] = $level;
                $arr[] = $v;
                $this->sort($data, $v['id'], $level + 1);
            }
        }
        return $arr;
    }

    public function getChildrenId($cateId)
    {
        $cateRes = $this->select();
        return $this->_getChildrenId($cateRes, $cateId);
    }

    public function _getChildrenId($cateRes, $cateId)
    {
        static $arr = array();
        foreach ($cateRes as $k => $v) {
            if ($v['pid'] == $cateId) {
                $arr[] = $v['id'];
                $this->_getChildrenId($cateRes, $v['id']);
            }
        }
        return $arr;
    }
}


