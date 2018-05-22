<?php

namespace app\index\controller;

use think\Controller;
use think\Response;

class Index extends Controller
{
    public function index()
    {
        $list = [
            'user1' => [
                'name' => 'jack',
                'age' => 10,
                'email' => 'jack@qq.com',
            ],
            'user2' => [
                'name' => 'tom',
                'age' => 20,
                'email' => 'tom@qq.com',
            ],
            'user3' => [
                'name' => 'rose',
                'age' => 30,
                'email' => 'rose@qq.com',
            ],
        ];

        $this->assign('list', $list);
        $this->assign('a', 10);
        $this->assign('b', 20);

        return $this->fetch();

//        return $this->fetch('index', [
//            'name' => 'jack',
//        ]);

//        $data = [
//            'name' => 'jack',
//            'age' => '18',
//        ];
//        return Response::create($data, 'json');

    }
}
