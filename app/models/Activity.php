<?php

/**
 * Created by PhpStorm.
 * User: yibeel
 * Date: 17/6/30
 * Time: 下午1:03
 */
use Phalcon\Mvc\Model;

class Activity extends Model
{
    public $id;

    public $act_name;

    public $act_tag;

    public $act_comment;

    public $act_time;

    public $act_left_user;

    public $act_now_user;

    public $act_active;

    public $act_finished;

    public $created_at;

    public $act_location;

    public $act_user;

    public function initialize()
    {
        //与用户关联
        $this->hasMany(
            'id',
            'UserAct',
            'act_id'
        );
        //与活动标签关联
        $this->belongsTo('act_tag', 'ActTag', 'id');
    }


    //获取首页活动信息
    //并将获取的信息保存在数组中返回,以act_tag 为键值返回
    //$condition 为活动分类的个数
    public static function getIndexAct($condition, $params = null)
    {
        $res = array();
        for ($i = 1; $i <= $condition; $i++) {
            $act = self::query()
                ->where("act_active=1")
                ->andWhere("act_tag=$i")
                ->andWhere("act_finished=0")
                ->orderBy('act_left_user')
                ->limit(4)
                ->execute();
            $res[$i] = $act->toArray();
            $res[$i]['act_count'] = count($act->toArray());
        }
        $res[1]['tag_name'] = "电影 & 话剧";
        $res[2]['tag_name'] = "游戏 & 桌游";
        $res[3]['tag_name'] = "派对 & 夜店";
        $res[4]['tag_name'] = "户外 & 活动";
        $res[5]['tag_name'] = "运动 & 健身";
        $res[1]['id'] = 1;
        $res[2]['id'] = 2;
        $res[3]['id'] = 3;
        $res[4]['id'] = 4;
        $res[5]['id'] = 5;
        return $res;
    }
}