<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-01-10
 * Time: 21:05
 */

namespace AppBundle\Controller;




use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AProposController extends Controller
{
    /**
     * @Route("/aPropos", name="a_propos")
     */
    public function aProposAction(){

    return $this->render('@App/User/aPropos.html.twig');
    }
}