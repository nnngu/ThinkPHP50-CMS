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
        $adminData = array();
        $adminData['name']=$data['name'];
        $adminData['password']=$data['password'];
        $res = $this->save($adminData);
        if ($res) {
            $groupAccess['uid'] = $this->id;
            $groupAccess['group_id'] = $data['group_id'];
            db('auth_group_access')->insert($groupAccess);
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

        db('auth_group_access')->where(array('uid'=>$data['id']))->update(['group_id'=>$data['group_id']]);
        return $this->update(['name'=>$data['name'], 'password'=>$data['password']], ['id'=>$data['id']]);
    }

    public function deladmin($id)
    {
        if ($this::destroy($id)) {
            return 1;
        } else {
            return 2;
        }
    }

    public function login($data)
    {
        $admin = self::getByName($data['name']);
        if ($admin) {
            if ($admin['password'] == md5($data['password'])) {
                session('id', $admin['id']);
                session('name', $admin['name']);
                return 2; // 登录密码正确
            } else {
                return 3; // 登录密码不正确
            }
        } else {
            return 1; // 用户不存在
        }
    }
}


