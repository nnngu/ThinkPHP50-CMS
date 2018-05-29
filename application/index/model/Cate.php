<?php

namespace app\index\model;


use think\Model;

class Cate extends Model
{
    public function getChildrenId($cateId)
    {
        $cateRes = $this->select();
        $arr = $this->_getChildrenId($cateRes, $cateId);
        $arr[] = $cateId;
        $strId = implode(',', $arr);
        return $strId;
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

    public function getParents($cateId)
    {
        $cateRes = $this->field('id, pid, catename')->select();
        $cates = db('cate')->field('id, pid, catename')->find($cateId);
        $pid = $cates['pid'];
        if ($pid) {
            $arr = $this->_getParentsId($cateRes, $pid);
        }
        $arr[] = $cates;
        return $arr;
    }

    public function _getParentsId($cateRes, $pid)
    {
        static $arr = array();
        foreach ($cateRes as $k => $v) {
            if ($v['id'] == $pid) {
                $arr[] = $v;
                $this->_getParentsId($cateRes, $v['pid']);
            }
        }
        return $arr;
    }

    public function getRecIndex()
    {
        $recIndex = $this->order('id desc')->where('rec_index', '=', 1)->select();
        return $recIndex;
    }

    public function getRecBottom()
    {
        $recBottom = $this->order('id desc')->where('rec_bottom', '=', 1)->select();
        return $recBottom;
    }
}
