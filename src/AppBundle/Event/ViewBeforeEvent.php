<?php

namespace AppBundle\Event;
use Symfony\Component\EventDispatcher\Event;

/**
 * Created by PhpStorm.
 * User: caid
 * Date: 2016/12/16
 * Time: 16:44
 */
class ViewBeforeEvent extends Event
{
    public function index($event)
    {
        echo 'this is a event but not Subscribed to listen';
    }
}