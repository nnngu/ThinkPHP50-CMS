<?php

namespace app\admin\controller;


class Link extends Common
{
    public function lst()
    {
        if (request()->isPost()) {
            $sorts = input('post.');
            foreach ($sorts as $k => $v) {
                $cate->update(['id' => $k, 'sort' => $v]);
            }
            $this->success('更新排序成功！', url('lst'));
            return;
        }
        $linkRes = \app\admin\model\Link::select();
        $this->assign('linkRes', $linkRes);
        return view();
    }

    public function add()
    {
        if (request()->isPost()) {
            $add = \app\admin\model\Link::create(input('post.'));
            if ($add) {
                $this->success('添加友情链接成功！', url('lst'));
            } else {
                $this->error('添加友情链接失败！');
            }
        }
        return view();
    }
}
