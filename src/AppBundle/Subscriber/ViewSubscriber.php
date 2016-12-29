<?php

namespace AppBundle\Subscriber;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Created by PhpStorm.
 * User: caid
 * Date: 2016/12/16
 * Time: 16:31
 */
class ViewSubscriber extends EventSubscriberInterface
{

    /**
     * For instance:
     *     array('eventName' => 'methodName')
     *     array('eventName' => array('methodName', $priority))
     *     array('eventName' => array(array('methodName1', $priority), array('methodName2')))
     * @return array
     */
    public static function getSubscribedEvents()
    {
        echo '返回订阅的event';
        return array(
            'view.before'=> array('before', 0)
        );
    }

    public function before()
    {
        echo 'this is a before method';exit();
    }
}