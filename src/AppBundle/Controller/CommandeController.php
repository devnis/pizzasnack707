<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2018-12-04
 * Time: 10:18
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Commande;
use AppBundle\Form\Type\CommandeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/commande", name="commande")
     */
    public function CommandAction(Request $request)
    {
        $form = $this->createForm(CommandeType::class, new Commande());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $commande = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($commande);
            $entityManager->flush();

            return $this->redirectToRoute('commande');
        } else{
            return $this->render('@App/ajoutCommande.html.twig',
                [
                    'form' => $form->createView()
                ]
            );
        }
    }
}