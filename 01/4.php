<?php
/**
 * Created by PhpStorm.
 * User: mengkang <i@mengkang.net>
 * Date: 2019/2/26 下午11:34
 */


/**
 * @link http://manual.phpdoc.org/HTMLframesConverter/default/
 *
 * @method static int search(string $query,$limit = 10,$offset = 0)
 */
class SearchServiceProxy
{
    public static function __callStatic($method, $arguments)
    {
        if (!method_exists("SearchService", $method)) {
            throw new \LogicException(__CLASS__ . "::" . $method . " not found");
        }

        try {
            $data = call_user_func_array(["SearchService", $method], $arguments);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return false;
        }

        return $data;
    }
}

class SearchService{

    /**
     * @param string $query
     * @param int    $limit
     * @param int    $offset
     *
     * @return array
     * @deprecated
     */
    public static function search(string $query,$limit = 10,$offset = 0){
        return [
            ["id" => 1, "aaa"],
            ["id" => 2, "bbb"],
        ];
    }
}

$res = SearchServiceProxy::search("xxx");

var_export($res);


/**
 * Class SearchDemo
 * @see SearchServiceProxy::search()
 */
class SearchDemo{
    public static function test(){
        SearchService::search("xxx");
    }
}