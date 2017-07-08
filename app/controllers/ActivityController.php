<?php

/**
 * Created by PhpStorm.
 * User: yibeel
 * Date: 17/6/30
 * Time: 上午11:22
 */
class ActivityController extends ControllerBase
{
    private $_activity;

    /**
     * @return \Phalcon\Http\Response|\Phalcon\Http\ResponseInterface
     */
    public function create()
    {
        $post = $this->request->getPost();

        if (!isset($this->_activity)) {
            $activity = new Activity();
        } else {
            $activity = $this->_activity;
        }

        //获取用户是否已经创建过活动
        $acts = $activity::query()
            ->where("act_user = '" . $post['act_user'] . "'")
            ->andWhere("act_finished =0 ")
            ->execute();

        //如果创建 ， 返回错误
        if (count($acts) >= 1) {
            $msg = [
                'code' => 40002,
                'msg' => '目前一个用户同时只能创建一个活动'
            ];
            $this->response->setStatusCode(501)->setJsonContent($msg);
            return $this->response;

        } else {
            //如果没有创建国， 那么创建活动
            if ($activity->save($post)) {
                $this->_msg(10002, '创建用户成功', $post);
            } else {
                $this->_msg(40002, '创建活动失败');
            };
        }
    }

    //获取首页活动信息
    public function getIndexAct()
    {
        $res = Activity::getIndexAct(5, null);
        $this->_msg(200, 10004, '获取首页活动成功', $res);
    }

    /**
     * 获取活动分类信息
     */
    public function getCate()
    {
        $ActTag = ActTag::query()->execute();
        $this->_msg(200, 10005, '获取分类信息成功', $ActTag);
    }

    /**
     * 通过标签id 获取分类的活动
     */

    public function getCatDetail($id)
    {
        $acttags = ActTag::find($id);
        $arr = array();
        foreach ($acttags as $v) {
            $arr = $v->Activity->toArray();
            $arr['tag_name'] = $v->tag_name;
        }

        $this->_msg(200, 10006, '获取分类详情成功', $arr);
    }

    /**
     * 通过id获取活动详情
     */
    public function show($id, $uid)
    {
        $act = Activity::findFirst(
            [
                "id = $id"
            ]
        );
        $userAct = $act->UserAct;
        $act = $act->toArray();
        $user = array();
        foreach ($userAct as $v) {
            $user[] = $v->User->toArray();
        }
        $data = [
            'user' => $user,
            'act' => $act
        ];
        $data['tag'] = 0;
        foreach ($user as $k => $v) {
            if ($v['user_id'] == $uid) {
                $data['tag'] = 1;
                break;
            }
        }
        $this->_msg(200, 10007, '获取活动详情成功', $data);
    }

    /**
     * 用户添加活动
     */

    public function userAddAct()
    {
        $post = $this->request->getPost();
        $userAct = new UserAct();
        //获取用户参加的活动个数，如果大于二，就报错
        $count = $userAct::count(
            [
                "user_id =" . $post['user_id']
            ]
        );
        if ($count < 2) {
            $res = $userAct->save($post);
            if ($res) {
                $data = null;
                $this->_msg(200, 10008, '用户添加活动成功', $data);
            } else {
                $this->_msg(504, 40004, '用户添加活动失败', '');
            }
        } else {
            $this->_msg(504, 40005, '用户活动限制在两个', '');
        }
    }

    public function userDelAct()
    {
        $post = $this->request->getPost();
        $useract = UserAct::findFirst([
            "user_id=" . $post['user_id'],
            "act_id=" . $post['act_id']
        ]);
        if ($useract->delete() === false) {
            $messages = $useract->getMessages();
            foreach($messages as $message) {
                echo $message,"\n";
            }
        } else {
            $this->_msg(200,10009,'用户删除活动成功');
        }
    }
}
