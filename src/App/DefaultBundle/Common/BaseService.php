<?php
/**
 * Created by PhpStorm.
 * User: caid
 * Date: 2017/2/17
 * Time: 16:22
 */

namespace App\DefaultBundle\Common;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

abstract class BaseService extends Controller
{
    use CommonTraits;

    protected function getServiceKernel()
    {
        return ServiceKernel::getInstance($this->container);
    }

    protected function dispatchEvent($eventName, $subject)
    {
        if ($subject instanceof ServiceEvent) {
            $event = $subject;
        } else {
            $event = new ServiceEvent($subject);
        }

        return $this->getDispatcher()->dispatch($eventName, $event);
    }
}