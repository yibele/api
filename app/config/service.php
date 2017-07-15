<?php
/**
 * Created by PhpStorm.
 * User: yibeel
 * Date: 2017/7/15
 * Time: 上午10:54
 */

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Micro;
use Phalcon\Mvc\View\Engine\Volt;

//di 容器设置
$di = new FactoryDefault();

$di->setShared(
    'db',
    function () {
        return new Phalcon\Db\Adapter\Pdo\Mysql(
            [
                'host' => '127.0.0.1',
                'username' => 'root',
                'password' => 'wo19540424',
                'dbname' => 'test',
                'charset' => 'utf8'
            ]
        );
    }
);

$di->setShared(
    'view',
    function () {
        $view = new Phalcon\Mvc\View\Simple();

        $view->setViewsDir(BASE_PATH . '/app/views/');

        $view->registerEngines(array(
            '.volt' => function ($view, $di) {
                $volt = new Volt($view, $di);
                $volt->setOptions(
                    array(
                        'compiledPath' => BASE_PATH . '/cache/volt/',
                        'compiledExtension' => '.php',
                        'compiledSeparator' => '_',
                        'compileAlways' => true
                    )
                );
                return $volt;
            }
        ));
        return $view;
    }
);

$app = new Micro($di);

