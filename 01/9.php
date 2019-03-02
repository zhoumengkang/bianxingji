<?php
/**
 * Created by PhpStorm.
 * User: mengkang <i@mengkang.net>
 * Date: 2019/3/2 下午7:17
 */


function tags1()
{
    return array(1 => "java", 2 => "php");
}

function tags2()
{
    return array(1 => "java", 3 => "python");
}

function tags3()
{
    return time() % 2 == 0 ? array() : null;
}

function getTopTags()
{
    $tags1 = tags1();
    $tags2 = tags2();
    $tags3 = tags3();

    return array_merge($tags1, $tags2, $tags3);
}

var_dump(getTopTags());