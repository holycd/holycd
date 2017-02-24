<?php

namespace App\DefaultBundle\Controller;
use App\DefaultBundle\Common\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $this->getServiceKernel()->getService('Article.ArticleService');
        return $this->render('default/index.html.twig',[
        'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
