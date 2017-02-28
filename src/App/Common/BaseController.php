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
        return ServiceKernel::getInstance($this->container)->createService($name);
    }

    public function getDao($name)
    {
        return ServiceKernel::getInstance($this->container)->createDao($name);
    }

}