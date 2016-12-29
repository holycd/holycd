<?php
/**
 * Created by PhpStorm.
 * User: caid
 * Date: 2016/12/16
 * Time: 16:55
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    /**
     * @Route("/event/scribe", name="testEvent")
     */
    public function indexAction(Request $request)
    {
        //subScribe
        dump("this is test event!");exit();
    }

    /**
     * @Route("/event/test", name="testEvent")
     */
    public function eventListenAction(Request $request)
    {

    }
}