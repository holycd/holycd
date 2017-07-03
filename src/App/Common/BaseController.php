<?php
/**
 * Created by PhpStorm.
 * User: caid
 * Date: 2017/2/17
 * Time: 16:18
 */

namespace App\Common;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

abstract class BaseController extends Controller
{
    use CommonTraits;

    public function getService($name)
    {
        //dump($this->container);exit();
        dump(get_class_vars(get_parent_class($this)));
        dump(get_class_vars(get_parent_class(get_parent_class(ServiceKernel::getInstance($this->container)->createService($name)))));exit();
        return ServiceKernel::getInstance($this->container)->createService($name);
/*dump(get_parent_class($object));exit();
        return $object;*/
    }

    public function getDao($name)
    {
        return ServiceKernel::getInstance($this->container)->createDao($name);
    }

}