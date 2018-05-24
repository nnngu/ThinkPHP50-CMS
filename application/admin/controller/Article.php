<?php

namespace app\admin\controller;


class Article extends Common
{
    public function lst()
    {
        $artRes = db('article')->field('a.*, b.catename')->alias('a')->join('bk_cate b', 'a.cateid=b.id')->paginate(10);
        $this->assign('artRes', $artRes);
        return view();
    }

    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $article = new \app\admin\model\Article();
//            if ($_FILES['thumb']['tmp_name']) {
//                $file = request()->file('thumb');
//                $info = $file->move(ROOT_PATH.'public'.DS.'uploads');
//                if ($info) {
//                    $thumb = '/uploads/'.$info->getSaveName();
//                    $data['thumb'] = $thumb;
//                }
//            }
            if ($article->save($data)) {
                $this->success('添加文章成功！', url('lst'));
            } else {
                $this->error('添加文章失败！');
            }
            return;
        }
        $cate = new \app\admin\model\Cate();
        $cateres = $cate->cateTree();
        $this->assign('cateres', $cateres);
        return view();
    }

    public function edit()
    {
        if (request()->isPost()) {
            $article = new \app\admin\model\Article();
            $save = $article->save(input('post.'), ['id' => input('id')]);
            if ($save !== false) {
                $this->success('修改文章成功！', url('lst'));
            } else {
                $this->error('修改文章失败！');
            }
            return;
        }
        $cate = new \app\admin\model\Cate();
        $cateres = $cate->cateTree();
        $arts = db('article')->find(input('id'));
        $this->assign('cateres', $cateres);
        $this->assign('arts', $arts);
        return view();
    }

    public function del()
    {
        if (\app\admin\model\Article::destroy(input('id'))) {
            $this->success('删除文章成功！', url('lst'));
        } else {
            $this->error('删除文章失败！');
        }
    }
}
