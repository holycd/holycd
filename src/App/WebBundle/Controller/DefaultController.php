<?php

namespace App\WebBundle\Controller;

use App\Common\BaseController;

class DefaultController extends BaseController
{

    public function defaultAction()
    {
        echo 111;exit();
    }
    
    public function indexAction()
    {
        echo 22;exit();
//        return $this->render('WebBundle:Default:index.html.twig');
    }
}
