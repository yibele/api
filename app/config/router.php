<?php
/**
 * Created by PhpStorm.
 * User: yibeel
 * Date: 2017/7/15
 * Time: 上午10:56
 */

$user = new UserController();
$act = new ActivityController();
$view = new viewController();


//用户网页登陆
$app->post(
    '/login',
    function () use ($app) {
        $post = $app->request->getPost();
        $username = $post['username'];
        $password = $post['password'];

        $tmp1 = 'yibu';
        $tmp2 = 'yibu';

        echo $app['view']->render(
            "dashboard/index",
            [
                'uid' => '1'
            ]
        );
    }
);

$app->get(
    '/',
    [
        $view->setView(),
        'index'
    ]
);

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
    '/v1/user/create',
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

/**
 * 活动路由
 */
// 创建活动
$app->post(
    '/v1/activity',
    [
        $act,
        'create'
    ]
);

//获取首页活动
$app->get(
    '/v1/activity/index',
    [
        $act,
        'getIndexAct'
    ]
);

//获取活动分类信息
$app->get(
    '/v1/activity/cate',
    [
        $act,
        'getCate'
    ]
);

//通过分类id获取分类活动
$app->get(
    '/v1/activity/cateDetail/{id}',
    [
        $act,
        'getCatDetail'
    ]
);

//获取活动详情
$app->get(
    '/v1/activity/show/{id}/user/{uid}',
    [
        $act,
        'show'
    ]
);


//用户添加活动
$app->post(
    '/v1/activity/userAddAct',
    [
        $act,
        'userAddAct'
    ]
);

//用户删除活动
$app->post(
    '/v1/activity/userDelAct',
    [
        $act,
        'userDelAct'
    ]
);

//notFound 页面情况
$app->notFound(
    function () use ($app) {

        $resource = $app->request->getURI();

        $msg = [
            'code' => '50001',
            'msg' => '路由错误 : ' . $resource
        ];

        $app->response->setStatusCode(404, 'Not Found');
        $app->response->setJsonContent($msg);
        $app->response->send();
    }
);

$app->handle();
