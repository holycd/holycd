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
        $this->getService('Article.ArticleService')->getArticle(5);
//        $this->getDao('Article.ArticleDao')->dealArticle();
        return $this->render('default/index.html.twig',[
        'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
