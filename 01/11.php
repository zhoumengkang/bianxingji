<?php
/**
 * Created by PhpStorm.
 * User: mengkang <i@mengkang.net>
 * Date: 2019/3/2 下午7:32
 */

/**
 * @method mixed fetchList(string $sql, array $argv);
 */
class Model
{
    public function __construct()
    {

    }
}

function getHotTags($num)
{
    $sql = "select * from tag order by follow_num desc limit ?";
    $model = new Model();

    return $model->fetchList($sql, [intval($num)]);
}

function getHotTags2($num, $type)
{
    $sql = "select * from tag where tag_type=? order by follow_num desc limit ?";
    $model = new Model();

    return $model->fetchList($sql, [intval($type), intval($num)]);
}