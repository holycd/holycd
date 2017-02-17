<?php
/**
 * Created by PhpStorm.
 * User: caid
 * Date: 2017/2/17
 * Time: 16:22
 */

namespace Common;

abstract class  BaseService
{
    use CommonTraits;

    protected function getKernel()
    {
        return ServiceKernel::getInstance();
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