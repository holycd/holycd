<?php
/**
 * Created by PhpStorm.
 * User: caid
 * Date: 2017/2/17
 * Time: 16:50
 */

namespace App\DefaultBundle\Common;

Trait CommonTraits
{
    //Traits 不能有常量

    //定义的共有方法
    public function sayHello(){
        echo 'Hello world';
    }
}