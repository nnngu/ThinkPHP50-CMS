<?php

namespace app\admin\controller;


class Cate extends Common
{
    protected $beforeActionList = [
        'delSonCate' => ['only' => 'del'],
    ];

    public function lst()
    {
        $cate = new \app\admin\model\Cate();
        $cateres = $cate->cateTree();
        $this->assign('cateres', $cateres);
        return view();
    }

    public function add()
    {
        $cate = new \app\admin\model\Cate();
        if (request()->isPost()) {
            $cate->data(input('post.'));
            $add = $cate->save();
            if ($add) {
                $this->success('添加栏目成功！', url('lst'));
            } else {
                $this->error('添加栏目失败！');
            }
        }
        $cateres = $cate->cateTree();
        $this->assign('cateres', $cateres);
        return view();
    }

    public function del()
    {
        $del = db('cate')->delete(input('id'));
        if ($del) {
            $this->success('删除栏目成功！', url('lst'));
        } else {
            $this->error('删除栏目失败！');
        }
    }

    public function delSonCate()
    {
        $cateId = input('id');
        $cateModel = new \app\admin\model\Cate();
        $sonIds = $cateModel->getChildrenId($cateId);
        if ($sonIds) {
            db('cate')->delete($sonIds);
        }
    }
}
