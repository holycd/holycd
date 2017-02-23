<?php
/**
 * Created by PhpStorm.
 * User: caid
 * Date: 2017/2/17
 * Time: 16:18
 */

namespace Common;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

abstract class BaseController extends Controller
{
    use CommonTraits;

    protected function getServiceKernel()
    {
        return ServiceKernel::instance();
    }

}