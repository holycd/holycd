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

    protected $parameterBag;

    protected $pool = array();

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

        $this->setParameterBag($this->container->getParameterBag());

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


    public function setParameterBag($parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    public function getParameter($name)
    {
        if (is_null($this->parameterBag)) {
            throw new \RuntimeException('尚未初始化ParameterBag');
        }
        return $this->parameterBag->get($name);
    }

    public function hasParameter($name)
    {
        if (is_null($this->parameterBag)) {
            throw new \RuntimeException('尚未初始化ParameterBag');
        }
        return $this->parameterBag->has($name);
    }
/*
    public function getDao($name)
    {
        if (empty($this->pool[$name])) {
            $class = $this->getClassName('dao', $name);
            $dao = new $class();
            $dao->setConnection($this->getConnection());
            $this->pool[$name] = $dao;
        }
        return $this->pool[$name];
    }
*/


    public function getService($name)
    {
        if (empty($this->pool[$name])) {//在pool池拿不到,遍历获取并实例化类,最后返回实例
            $class = $this->getClassName('service', $name);

            $this->pool[$name] = new $class();
        }
        return $this->pool[$name];
    }

    protected function getClassName($type, $name)
    {
        //类映射
        $classMap = $this->getClassMap($type);

        if (isset($classMap[$name])) {
            return $classMap[$name];
        }

        if (strpos($name, ':') > 0) {
            list($namespace, $name) = explode(':', $name, 2);//切割name字符串,最多返回两个变量,如果多个，第二个开始合并
            $namespace .= '\\Service';
        } else {
            $namespace = substr(__NAMESPACE__, 0, -strlen('Common') - 1);//默认状态下
        }
        list($module, $className) = explode('.', $name);//字符串名切割 App.AppSearch

        $type = strtolower($type);
        if ($type == 'dao') {
            return $namespace . '\\' . $module . '\\Dao\\Impl\\' . $className . 'Impl';
        }
        return $namespace . '\\' . $module . '\\Impl\\' . $className . 'Impl';
    }

    protected function getClassMap($type)//获取类映射
    {
        if (isset($this->classMaps[$type])) {
            return $this->classMaps[$type];
        }

        $key = ($type == 'dao') ? 'topxia_daos' : 'topxia_services';
        if (!$this->hasParameter($key)) {
            $this->classMaps[$type] = array();
        } else {
            $this->classMaps[$type] = $this->getParameter($key);
        }

        return $this->classMaps[$type];
    }

}