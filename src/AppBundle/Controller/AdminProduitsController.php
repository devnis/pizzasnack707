<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2018-12-03
 * Time: 10:12
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Produits;
use AppBundle\Form\Type\PizzaType;
use AppBundle\Form\Type\ProduitsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminProduitsController extends Controller
{
    /**
     * @Route("/admin/homePage", name="admin_produit")
     */
    public function PizzaAction()
    {
        $repository = $this->getDoctrine()->getRepository(Produits::class);
        $produits = $repository->findAll();

        return $this->render('@App/admin/adminPizza/read.html.twig',
            [
                'produits' => $produits
            ]
        );
    }

    /**
     * @Route("/admin/produit/update/{id}", name="admin_produit_update")
     */
    public function UpdateAction(Request $request, $id)
    {
        $repository = $this->getDoctrine()->getRepository(Produits::class);
        $produit = $repository->find($id);

        $form = $this->createForm(ProduitsType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash("notice", "le produit est bien enregistré");
            $produit = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('admin_produit');
        } else {
            $this->addFlash("notice", "Le produit n'est pas enregistré");
        }
        return $this->render('@App/admin/adminPizza/update.html.twig',
            [
                'produit' => $produit,
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/admin/produit/create/", name="admin_produit_create")
     */
    public function CreateAction(Request $request)
    {
        $form = $this->createForm(ProduitsType::class, new Produits());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->addFlash("notice", "Le produit est bien enregistré");
            $produit = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('admin_produit');
        } else{
            $this->addFlash("notice", "Le produit n'est pas enregistré");
        }
        return $this->render('@App/admin/adminPizza/create.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/admin/produit/delete/{id}", name="admin_produit_delete")
     */
    public function DeleteAction($id)
    {
        $this->addFlash("notice", "le produit est supprimé");

        $repository = $this->getDoctrine()->getRepository(Produits::class);

        $entityManager = $this->getDoctrine()->getManager();

        $produit = $repository->find($id);

        $entityManager->remove($produit);
        $entityManager->flush();

        return $this->RedirectToRoute("admin_produit");
    }
}