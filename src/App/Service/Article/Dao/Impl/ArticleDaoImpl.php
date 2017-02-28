<?php

/**
 * Created by PhpStorm.
 * User: caid
 * Date: 2017/2/27
 * Time: 17:14
 */
namespace App\Service\Article\Dao\Impl;

use App\Common\BaseDao;
use App\Service\Article\Dao\ArticleDao;

class ArticleDaoImpl extends BaseDao implements ArticleDao
{
    public function dealArticleAction()
    {
        echo 'deal Article';
    }

}