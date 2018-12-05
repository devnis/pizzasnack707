<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2018-12-03
 * Time: 10:12
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Pizza;
use AppBundle\Form\Type\PizzaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminPizzaController extends Controller
{
    /**
     * @Route("/admin/pizza", name="admin_pizza")
     */
    public function PizzaAction()
    {
        $repository = $this->getDoctrine()->getRepository(Pizza::class);
        $pizzas = $repository->findAll();

        return $this->render('@App/adminPizza/read.html.twig',
            [
                'pizzas' => $pizzas
            ]
        );
    }

    /**
     * @Route("/admin/pizza/update/{id}", name="admin_pizza_update")
     */
    public function UpdateAction(Request $request, $id)
    {
        $repository = $this->getDoctrine()->getRepository(Pizza::class);
        $pizza = $repository->find($id);

        $form = $this->createForm(PizzaType::class, $pizza);
        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()){
            $pizza = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pizza);
            $entityManager->flush();

            return $this->redirectToRoute('admin_pizza');
        } else {
            return $this->render('@App/adminPizza/update.html.twig',
                [
                    'pizza' => $pizza,
                    'form' => $form->createView()
                ]
            );
        }
    }

    /**
     * @Route("/admin/pizza/create/", name="admin_pizza_create")
     */
    public function CreateAction(Request $request)
    {
        $form = $this->createForm(PizzaType::class, new Pizza());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $pizza = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pizza);
            $entityManager->flush();

            return $this->redirectToRoute('admin_pizza');
        } else{
            return $this->render('@App/adminPizza/create.html.twig',
                [
                    'form' => $form->createView()
                ]
            );
        }
    }

    /**
     * @Route("/admin/pizza/delete/{id}", name="admin_pizza_delete")
     */
    public function DeleteAction($id)
    {
        $repository = $this->getDoctrine()->getRepository(Pizza::class);

        $entityManager = $this->getDoctrine()->getManager();

        $pizza = $repository->find($id);

        $entityManager->remove($pizza);
        $entityManager->flush();

        return new Response("Pizza supprimé");
    }
}