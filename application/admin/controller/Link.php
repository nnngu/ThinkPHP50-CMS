<?php

namespace app\admin\controller;


use think\Loader;

class Link extends Common
{
    public function lst()
    {
        if (request()->isPost()) {
            $sorts = input('post.');
            foreach ($sorts as $k => $v) {
                \app\admin\model\Link::update(['id' => $k, 'sort' => $v]);
            }
            $this->success('更新排序成功！', url('lst'));
            return;
        }
        $linkRes = \app\admin\model\Link::order('sort desc')->paginate(5);
        $this->assign('linkRes', $linkRes);
        return view();
    }

    public function add()
    {
        if (request()->isPost()) {
            $validate = Loader::validate('Link');
            if(!$validate->scene('add')->check(input('post.'))){
                $this->error($validate->getError());
            }

            $add = \app\admin\model\Link::create(input('post.'));
            if ($add) {
                $this->success('添加友情链接成功！', url('lst'));
            } else {
                $this->error('添加友情链接失败！');
            }
        }
        return view();
    }

    public function edit()
    {
        if (request()->isPost()) {
            $validate = Loader::validate('Link');
            if(!$validate->check(input('post.'))){
                $this->error($validate->getError());
            }

            $edit = \app\admin\model\Link::update(input('post.'));
            if ($edit !== false) {
                $this->success('修改友情链接成功！', url('lst'));
            } else {
                $this->error('修改友情链接失败！');
            }
            return;
        }
        $links = \app\admin\model\Link::get(input('id'));
        $this->assign('links', $links);
        return view();
    }

    public function del()
    {
        $del = \app\admin\model\Link::destroy(input('id'));
        if ($del) {
            $this->success('删除友情链接成功！', url('lst'));
        } else {
            $this->error('删除友情链接失败！');
        }
    }
}
