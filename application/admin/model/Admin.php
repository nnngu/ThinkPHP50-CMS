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
        $res = $this->save($data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}
