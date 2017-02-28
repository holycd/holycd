<?php
/**
 * Created by PhpStorm.
 * User: caid
 * Date: 2017/2/27
 * Time: 16:58
 */

namespace App\Common;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

abstract class BaseDao extends Controller
{
    use CommonTraits;

    public function getService($name)
    {
        return ServiceKernel::getInstance($this->container)->createService($name);
    }

    public function getDao($name)
    {
        return ServiceKernel::getInstance($this->container)->createDao($name);
    }

    public function __call($fun, $param) {
        $match = preg_match('/^(update|modify|edit|add|create|remove|delete)/', $fun);//先匹配是否CRUD
        switch ($match) {
            case true:
                $fun .= 'Action';
                try {
                    $this->getDoctrine()->getEntityManager()->beginTransaction();
                    $result = call_user_func_array(array($this, $fun), $param);
                    $this->getDoctrine()->getEntityManager()->commit();
                    return $result;
                } catch (Exception $e) {
                    $this->getDoctrine()->getEntityManager()->rollback();
                    return false;
                }
                break;
            default :
                $fun .= 'Action';
                if (method_exists($this, $fun)) {//获取调用类的方法
                    return call_user_func_array(array($this, $fun), $param);
                } else {
                    throw new InvalidArgumentException('Method was not found!!!!');
                }
                break;
        }
    }





}