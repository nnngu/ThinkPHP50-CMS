<?php

namespace app\admin\controller;


class Cate extends Common
{
    public function lst()
    {
        $cate = new \app\admin\model\Cate();
        $cateres = $cate->catetree();
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
        $cateres = $cate->catetree();
        $this->assign('cateres', $cateres);
        return view();
    }
}
