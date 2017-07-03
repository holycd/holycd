<?php

namespace App\DefaultBundle\Controller;
use App\Common\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {

    }
}
