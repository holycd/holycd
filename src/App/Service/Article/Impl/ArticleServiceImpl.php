<?php
/**
 * Created by PhpStorm.
 * User: caid
 * Date: 2017/2/24
 * Time: 15:04
 */

namespace App\Service\Article\Impl;
use App\Common\BaseService;
use App\Service\Article\ArticleService;

class ArticleServiceImpl extends BaseService implements ArticleService
{
    public function getArticle($id)
    {
        echo $id;
//        $this->getDao('Article.ArticleDao')->dealArticle();
        // TODO: Implement getArticle() method.
        //get entity impl
    }

}