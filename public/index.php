<?php
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Micro;

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

//自动加载
$loader = new Phalcon\Loader();
$loader->registerDirs(
    [
        APP_PATH.'/controllers',
        APP_PATH.'/models'
    ]
);
$loader->register();


//注册控制器
$user = new UserController();
$act = new ActivityController();


//数据库设置
$di = new FactoryDefault();
$di->setShared(
    'db',
    function () {
        return new Phalcon\Db\Adapter\Pdo\Mysql(
            [
                'host' => '127.0.0.1',
                'username'=>'root',
                'password'=> 'wo19540424',
                'dbname'=>'test',
                'charset'=>'utf8'
            ]
        );
    }
);

//路由
$app = new Micro($di);

//用户路由
//通过用户名获取用户信息和用户参加的活动信息
$app->get(
    '/v1/user/find/{nickName}',
    [
        $user,
        'findByName'
    ]
);

//创建用户
$app->post(
    '/v1/user',
    [
        $user,
        'create'
    ]
);

//用户参加活动
//需要两个参数 用户Id 和 活动Id
$app->get(
    '/v1/user/{userId:[0-9]+}/activity/{actId:[0-9]+}',
    [
        $user,
        'userAddAct'
    ]
);

//活动路由
$app->post(
    '/v1/activity',
    [
        $act,
        'create'
    ]
);


//notFound 页面情况
$app->notFound(
    function () use ($app){
        $resource = $app->request->getURI();
        $msg = [
            'code' => '50001',
            'msg' => '路由错误 : '.$resource
        ];
        $app->response->setStatusCode(404,'Not Found');
        $app->response->setJsonContent($msg);
        $app->response->send();
    }
);

$app->handle();



