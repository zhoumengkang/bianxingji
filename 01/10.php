<?php
/**
 * Created by PhpStorm.
 * User: mengkang <i@mengkang.net>
 * Date: 2019/3/2 下午7:32
 */

class Bootstrap{

    public function __construct()
    {
        $this->init();
    }

    public function init(){
        $uid = decodeCookie();
        checkAndRegister($uid);
    }
}


function decodeCookie(){
    return 9527;
}

function checkAndRegister($uid){

}
