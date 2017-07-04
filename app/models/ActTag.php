<?php

/**
 * Created by PhpStorm.
 * User: yibeel
 * Date: 17/7/3
 * Time: 下午11:01
 */
use Phalcon\Mvc\Model;
class actTag extends Model
{
    public $id;

    public $tag_name;

    public function initialize ()
    {
        $this->hasMany('id','Activity','act_tag');
    }

}