<?php

namespace app\admin\controller;


use think\Loader;

class Cate extends Common
{
    protected $beforeActionList = [
        'delSonCate' => ['only' => 'del'],
    ];

    public function lst()
    {
        $cate = new \app\admin\model\Cate();
        if (request()->isPost()) {
            $sorts = input('post.');
            foreach ($sorts as $k => $v) {
                $cate->update(['id' => $k, 'sort' => $v]);
            }
            $this->success('更新排序成功！', url('lst'));
            return;
        }
        $cateres = $cate->cateTree();
        $this->assign('cateres', $cateres);
        return view();
    }

    public function add()
    {
        $cate = new \app\admin\model\Cate();
        if (request()->isPost()) {
            $validate = Loader::validate('Cate');
            if(!$validate->scene('add')->check(input('post.'))){
                $this->error($validate->getError());
            }

            $data = input('post.');
            if ($data['keywords']) {
                $data['keywords'] = str_replace('，', ',', $data['keywords']);
            }
            $cate->data($data);
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

    public function edit()
    {
        $cate = new \app\admin\model\Cate();
        if (request()->isPost()) {
            $validate = Loader::validate('Cate');
            if(!$validate->scene('edit')->check(input('post.'))){
                $this->error($validate->getError());
            }

            $data = input('post.');
            if ($data['keywords']) {
                $data['keywords'] = str_replace('，', ',', $data['keywords']);
            }
            $save = $cate->save($data, ['id' => input('id')]);
            if ($save !== false) {
                $this->success('修改栏目成功！', url('lst'));
            } else {
                $this->error('修改栏目失败！');
            }
            return;
        }
        $cates = $cate->find(input('id'));
        $cateres = $cate->cateTree();
        $this->assign('cateres', $cateres);
        $this->assign('cates', $cates);
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
        $allCateId = $sonIds;
        $allCateId[] = $cateId;
        foreach ($allCateId as $k=>$v) {
            $article = new \app\admin\model\Article();
            $article->where(['cateid'=>$v])->delete();
        }
        if ($sonIds) {
            db('cate')->delete($sonIds);
        }
    }
}
