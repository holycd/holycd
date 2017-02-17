<?php
/**
 * Created by PhpStorm.
 * User: caid
 * Date: 2017/2/17
 * Time: 16:32
 */

namespace Common;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ServiceKernel implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    private static $_instance = NULL;

    private static $_dispatcher;

    protected $environment;
    protected $debug;
    protected $booted;


    final public static function getInstance()
    {
        if (!isset(self::$_instance) || !self::$_instance instanceof self) {
            self::$_instance = new self;
        }
        self::$_instance->boot();
        return self::$_instance;
    }

    public static function instance()
    {
        if (empty(self::$_instance)) {
            throw new \RuntimeException('ServiceKernel未实例化');
        }
        //self::$_instance->boot();
        return self::$_instance;
    }

    /**
     * 初始化部分数据
     */
    public function boot()
    {
        if (true === $this->booted) {
            return;
        }
        $this->booted = true;

        $this->environment = $this->container->get( 'kernel' )->getEnvironment();

        if (in_array($this->environment, ['dev', 'test'], true)) {
            $this->debug = true;
        }else{
            $this->debug = false;
        }
/*
        $subscribers = empty($this->_moduleConfig['event_subscriber']) ? array() : $this->_moduleConfig['event_subscriber'];
        foreach ($subscribers as $subscriber) {
            $this->dispatcher()->addSubscriber(new $subscriber());
        }*/

    }


}