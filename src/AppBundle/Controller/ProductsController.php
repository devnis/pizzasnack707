<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2018-12-11
 * Time: 11:18
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Pizza;
use AppBundle\Entity\Snack;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends Controller
{
    /**
     * @Route("homepage/pizzas", name="read_pizzas")
     */
    public function ReadProductAction()
    {
        $repositoryPizzas = $this->getDoctrine()->getRepository(Pizza::class);
        $pizzas = $repositoryPizzas->findAll();

        $repositorySnacks = $this->getDoctrine()->getRepository(Snack::class);
        $snacks = $repositorySnacks->findAll();


        return $this->render('@App/User/readProduct.html.twig',
            [
                'pizzas' => $pizzas,
                'snacks' => $snacks
            ]
        );
    }
}