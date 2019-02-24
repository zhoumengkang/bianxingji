<?php
/**
 * 以下代码全为我的艺术创作，不属于任何实际项目
 *
 * User: mengkang <i@mengkang.net>
 * Date: 2019/2/23 上午9:00
 */

function getUserInfo($teamId, $youId = [])
{

}

class Db
{
    /**
     * @param string $table 数据库表名
     * @param array  $data  新增数据
     *
     * @return int 新增主键
     */
    public static function insert(string $table, array $data)
    {
        $id = mt_rand(1, 1000);
        return $id;
    }
}

class ViewLogStore2
{
    private $table = "view_log";

    function setHistory($data)
    {
        Db::insert($this->table, $data);
    }
}

class ArrayUtils{
    public static function fetch($arr, $keys, $setNull = false)
    {
        $ret = array();
        foreach($keys as $key)
        {
            if ($setNull)
            {
                $ret[$key] = $arr[$key];
            }
            else
            {
                isset($arr[$key]) && $ret[$key] = $arr[$key];
            }
        }
        return $ret;
    }
}


class ViewLogStore
{
    private $table = "view_log";

    function record($data)
    {
        $fields = array(
            'uid',
            'url',
            'referer',
            'created_time'
        );
        $data = ArrayUtils::fetch($data, $fields);
        Db::insert($this->table, $data);
    }
}
