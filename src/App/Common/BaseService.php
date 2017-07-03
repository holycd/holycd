<?php
/**
 * Created by PhpStorm.
 * User: caid
 * Date: 2017/2/17
 * Time: 16:22
 */

namespace App\Common;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

abstract class BaseService extends Controller
{
    use CommonTraits;

    public $container;

    public function __construct($container = null)
    {
        if($container){
            $this->container = $container;
        }
    }

    public function getService($name)
    {
        return ServiceKernel::getInstance($this->container)->createService($name);
    }

    public function getDao($name)
    {
        return ServiceKernel::getInstance($this->container)->createDao($name);
    }

    /**
     * Shortcut to return the Doctrine Registry service.
     *
     * @return Registry
     *
     * @throws \LogicException If DoctrineBundle is not available
     */
    protected function getDoctrine()
    {
        if (!$this->container->has('doctrine')) {
            throw new \LogicException('The DoctrineBundle is not registered in your application.');
        }

        return $this->container->get('doctrine');
    }


    public function getDispatcher()
    {
        return ServiceKernel::dispatcher();
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