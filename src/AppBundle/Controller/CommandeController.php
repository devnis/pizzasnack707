<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2018-12-04
 * Time: 10:18
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends Controller
{
    /**
     * @Route("/admin/index/", name="admin_index")
     */
    public function IndexAction()
    {
        return $this->render('@App/adminCalendar/calendar.html.twig');
    }

    /**
     *
     */
    public function CommandAction()
    {

    }
}