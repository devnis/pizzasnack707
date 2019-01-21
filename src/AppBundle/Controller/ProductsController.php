<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2018-12-11
 * Time: 11:18
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Produits;
use AppBundle\Entity\Snack;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends Controller
{
    /**
     * @Route("/carte", name="read_pizzas")
     */
    public function ReadProductAction()
    {
        $repository = $this->getDoctrine()->getRepository(Produits::class);
        $produits = $repository->findAll();


        return $this->render('@App/User/readProduct.html.twig',
            [
                'produits' => $produits,
            ]
        );
    }
}