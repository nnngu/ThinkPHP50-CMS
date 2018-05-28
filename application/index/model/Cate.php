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
}
