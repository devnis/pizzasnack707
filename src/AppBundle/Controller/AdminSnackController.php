<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2018-12-03
 * Time: 10:12
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Snack;
use AppBundle\Form\Type\SnackType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminSnackController extends Controller
{
    /**
     * @Route("/admin/snack", name="admin_snack")
     */
    public function SnackAction()
    {
        $repository = $this->getDoctrine()->getRepository(Snack::class);
        $snacks = $repository->findAll();

        return $this->render('@App/admin/adminSnack/read.html.twig',
            [
                'snacks' => $snacks
            ]
        );
    }

    /**
     * @Route("/admin/snack/update/{id}", name="admin_snack_update")
     */
    public function UpdateAction(Request $request, $id)
    {
        $repository = $this->getDoctrine()->getRepository(Snack::class);
        $pizza = $repository->find($id);

        $form = $this->createForm(SnackType::class, $pizza);
        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()){
            $pizza = $form->getData();

            $entitymanager = $this->getDoctrine()->getManager();
            $entitymanager->persist($pizza);
            $entitymanager->flush();

            return $this->redirectToRoute('admin_snack');
        } else {
            return $this->render('@App/admin/adminSnack/update.html.twig',
                [
                    'pizza' => $pizza,
                    'form' => $form->createView()
                ]
            );
        }
    }

    /**
     * @Route("/admin/snack/create/", name="admin_snack_create")
     */
    public function CreateAction(Request $request)
    {
        $form = $this->createForm(SnackType::class, new Snack());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $pizza = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pizza);
            $entityManager->flush();

            return $this->redirectToRoute('admin_snack');
        } else{
            return $this->render('@App/admin/adminSnack/create.html.twig',
                [
                    'form' => $form->createView()
                ]
            );
        }
    }

    /**
     * @Route("/admin/snack/delete/{id}", name="admin_snack_delete")
     */
    public function DeleteAction($id)
    {
        $repository = $this->getDoctrine()->getRepository(Snack::class);

        $entityManager = $this->getDoctrine()->getManager();

        $pizza = $repository->find($id);

        $entityManager->remove($pizza);
        $entityManager->flush();

        return new Response("Snack supprimé");
    }
}