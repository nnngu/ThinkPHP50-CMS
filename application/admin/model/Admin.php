<?php

namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    public function addadmin($data)
    {
        if (empty($data) || !is_array($data)) {
            return false;
        }
        if ($data['password']) {
            $data['password'] = md5($data['password']);
        }
        $res = $this->save($data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function getadmin()
    {
        return $this->paginate(5);
    }

    public function saveadmin($data, $admins)
    {
        if (!$data['name']) {
            return 2; // 管理员的用户名为空
        }
        if (!$data['password']) {
            $data['password'] = $admins['password'];
        } else {
            $data['password'] = md5($data['password']);
        }

        return $this->update($data);
    }

    public function deladmin($id)
    {
        if ($this::destroy($id)) {
            return 1;
        } else {
            return 2;
        }
    }
}


