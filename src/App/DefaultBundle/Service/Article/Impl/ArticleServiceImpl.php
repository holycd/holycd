<?php
/**
 * Created by PhpStorm.
 * User: caid
 * Date: 2017/2/24
 * Time: 15:04
 */

namespace App\DefaultBundle\Service\Article\Impl;
use App\DefaultBundle\Common\BaseService;
use App\DefaultBundle\Service\Article\ArticleServiceInterface;

class ArticleServiceImpl extends BaseService implements ArticleServiceInterface
{
    public function getArticle($id)
    {
        echo $id;exit();
        // TODO: Implement getArticle() method.
        //get entity impl
    }

}