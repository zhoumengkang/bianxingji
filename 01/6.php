<?php
/**
 * Created by PhpStorm.
 * User: mengkang <i@mengkang.net>
 * Date: 2019/3/2 下午5:35
 */

/**
 * @method mixed fetchList(string $sql, array $argv);
 */
class Model
{

    public function __construct($table)
    {

    }
}

function getUserList($startId, $lastId, $limit = 100)
{
    if ($lastId > 0) {
        $startId = $lastId;
    }

    $sql = "select * from `user` where id > ? order by id asc limit ?,?";

    $model = new Model('user');
    return $model->fetchList($sql, [intval($startId), intval($limit)]);
}


function bad($input1, $input2, &$input3)
{
    //...logic

    $input3 = "xxx";

    return true;
}

