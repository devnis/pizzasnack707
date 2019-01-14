<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-01-14
 * Time: 23:00
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends Controller
{
    /**
     * @Route("homepage/produits/panier/ajouter/{id}", name="panier_ajouter")
     */
    public function panierAjouterAction(){

    }

    /**
     * @Route("homepage/produits/panier/supprimer/{id}")
     */
    public function panierSupprimerAction(){

    }

}