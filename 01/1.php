<?php
/**
 * 以下代码全为我的艺术创作，不属于任何实际项目
 *
 * User: mengkang <i@mengkang.net>
 * Date: 2019/2/23 上午9:00
 */

function getGoods($query, $shopId)
{
    $goodsId = Goods::add($query["uid"], $query["name"]);
    return Shop::add($goodsId, $shopId);
}

class Goods
{
    public static function add($uid, $name)
    {
        $id = mt_rand(1, 100000);
        return $id;
    }
}

class Shop
{
    public static function add($goodsId, $shopId)
    {
        $id = mt_rand(1, 100000);
        return $id;
    }
}
