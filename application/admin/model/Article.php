<?php

namespace app\admin\model;

use think\Model;

class Article extends Model
{
    protected static function init()
    {
        self::event('before_insert', function ($article) {
            if ($_FILES['thumb']['tmp_name']) {
                $file = request()->file('thumb');
                $info = $file->move(ROOT_PATH.'public'.DS.'uploads');
                if ($info) {
                    $thumb = '/uploads/'.$info->getSaveName();
                    $article['thumb'] = $thumb;
                }
            }
        });

        self::event('before_update', function ($article) {
            if ($_FILES['thumb']['tmp_name']) {
                $file = request()->file('thumb');
                $info = $file->move(ROOT_PATH.'public'.DS.'uploads');
                if ($info) {
                    $thumb = '/uploads/'.$info->getSaveName();
                    $article['thumb'] = $thumb;
                }
                $arts = self::find($article->id);
                if (file_exists(ROOT_PATH.'public'.DS.$arts->thumb)) {
                    unlink(ROOT_PATH.'public'.DS.$arts->thumb);
                }
            }
        });
    }
}


