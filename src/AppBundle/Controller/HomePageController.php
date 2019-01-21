<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-01-10
 * Time: 11:35
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends Controller
{
    /**
     * @Route("/", name="home_page")
     */
    public function HomePageAction()
    {
        return $this->render('@App/User/homePage.html.twig');
    }
}