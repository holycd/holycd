<?php

namespace App\ModelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $this->getDoctrine();
        return $this->render('AppModelBundle:Default:index.html.twig');
    }
    public function testAction() {
        return $this->json(['state' => 1]);
    }

}
