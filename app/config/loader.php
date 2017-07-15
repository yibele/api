<?php
/**
 * Created by PhpStorm.
 * User: yibeel
 * Date: 2017/7/15
 * Time: 上午10:52
 */


//自动加载
$loader = new Phalcon\Loader();
$loader->registerDirs(
    [
        APP_PATH . '/controllers',
        APP_PATH . '/models'
    ]
);

$loader->register();