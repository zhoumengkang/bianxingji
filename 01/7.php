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

function addUser($nickname)
{
    if (wordsCheck($nickname)) {
        return array("error", "有敏感词");
    }

    if (duplicateCheck($nickname)) {
        return array("error", "昵称被占用");
    }

    return 9527;//id
}

/**
 * 是否有敏感词
 *
 * @param $string
 *
 * @return bool
 */
function wordsCheck($string)
{
    return time() % 2 == 0 ? true : false;
}

function duplicateCheck($string)
{
    return time() % 2 == 0 ? true : false;
}

function joinTeam($uid, $teamId)
{
    return true;
}

function addUserBiz($nickname, $teamId)
{
    $res = addUser($nickname);

    if (is_array($res)) {
        return $res;
    }

    joinTeam($res, $teamId);

    return $res;
}

function addUserAction()
{
    $res = addUserBiz("xxxx", 1);

    if (is_array($res)) {
        $res["success"] = false;
        echo json_encode($res);
    }

    echo json_encode(["success" => true, "id" => $res]);
}


