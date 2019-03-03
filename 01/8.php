<?php
/**
 * Created by PhpStorm.
 * User: mengkang <i@mengkang.net>
 * Date: 2019/3/2 下午5:35
 */

class BizException extends RuntimeException{

}

function addUser($nickname)
{
    if (wordsCheck($nickname)){
        throw new BizException("昵称非法");
    }

    if (duplicateCheck($nickname)) {
        throw new BizException("昵称被占用");
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

/**
 * @param $nickname
 * @param $teamId
 *
 * @return int
 * @throws BizException
 */
function addUserBiz($nickname, $teamId)
{
    $res = addUser($nickname);

    joinTeam($res, $teamId);

    return $res;
}

function addUserAction()
{
    try{
        $res = addUserBiz("xxxx", 1);
    }catch (BizException $e){
        $res["success"] = false;
        echo json_encode($res);exit;
    }

    echo json_encode(["success" => true, "id" => $res]);
}


