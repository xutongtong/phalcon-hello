<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-05-08
 * Time: 11:27
 */
use Phalcon\Cache\Frontend\Data as FrontData;
use Phalcon\Cache\Backend\Redis;


$di->setShared('cache', function () {
    $frontCache = new FrontData(
        [
            "lifetime" => 172800,
        ]
    );

    $cache = new Redis(
        $frontCache,
        [
            "host"       => "r-bp1dc4824cdca8a4.redis.rds.aliyuncs.com",
            "port"       => 6379,
            "auth"       => "JR82hlQCuWnmOj6hERQ9a3H7k6",
            "persistent" => false,
            "index"      => 0,
        ]
    );

    return $cache;
});