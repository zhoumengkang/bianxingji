<?php
/**
 * Created by PhpStorm.
 * User: mengkang <i@mengkang.net>
 * Date: 2019/2/24 下午12:48
 */

class Db
{
    /**
     * @param string $table 数据库表名
     * @param Entity $data  新增对象
     *
     * @return int 新增主键
     */
    public static function insert(string $table, Entity $data)
    {
        $array = $data->toArray();
        var_export($array); // test

        $id = mt_rand(1, 1000);
        return $id;
    }
}

class ArrayUtils
{
    /**
     * 针对成员都是私有属性的对象
     *
     * @param      $obj
     * @param bool $removeNull 去掉空值
     * @param bool $camelCase
     *
     * @return array
     */
    public static function Obj2Array($obj, $removeNull = true, $camelCase = true)
    {
        $reflect = new \ReflectionClass($obj);
        $props = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PRIVATE | \ReflectionProperty::IS_PROTECTED);

        $array = [];
        foreach ($props as $prop) {
            $prop->setAccessible(true);
            $key = $prop->getName();

            // 如果不是驼峰命名方式，就把对象里面的 createTime 转成 create_time
            if (!$camelCase) {
                $key = preg_replace_callback("/[A-Z]/", function ($matches) {
                    return "_" . strtolower($matches[0]);
                }, $key);
                $key = ltrim($key, "_");
            }

            $value = $prop->getValue($obj);

            if ($removeNull == true && $value === null) {
                continue;
            }

            if (is_object($value)) {
                $value = self::Obj2Array($value);
            }

            $array[$key] = $value;
        }

        return $array;
    }
}

class Entity
{
    public function toArray(){
        return ArrayUtils::Obj2Array($this);
    }
}

class ViewLogEntity extends Entity
{
    /**
     * @var int
     */
    private $uid;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $referer;

    /**
     * @var string
     */
    private $createdTime;

    /**
     * @param int $uid
     */
    public function setUid(int $uid)
    {
        $this->uid = $uid;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @param string $referer
     */
    public function setReferer(string $referer)
    {
        $this->referer = $referer;
    }

    /**
     * @param string $createdTime
     */
    public function setCreatedTime(string $createdTime)
    {
        $this->createdTime = $createdTime;
    }
}


class ViewLogStore
{
    private $table = "view_log";

    function record(ViewLogEntity $viewLogEntity)
    {
        Db::insert($this->table, $viewLogEntity);
    }
}

// 测试

$viewLogEntity = new ViewLogEntity();
$viewLogEntity->setUid(1);
$viewLogEntity->setReferer("https://mengkang.net");
$viewLogEntity->setUrl("https://segmentfault.com/l/1500000018225727");
$viewLogEntity->setCreatedTime(date("Y-m-d H:i:s",time()));

$viewLogStore = new ViewLogStore();
$viewLogStore->record($viewLogEntity);