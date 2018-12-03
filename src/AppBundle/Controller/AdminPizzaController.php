<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2018-12-03
 * Time: 10:12
 */

namespace AppBundle\Controller;


use AppBundle\Entity\pizza;
use AppBundle\Form\Type\PizzaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminPizzaController extends Controller
{

    /**
     * @Route("/admin/", name="admin_index")
     */

    public function AdminIndexAction()
    {
        $repository = $this->getDoctrine()->getRepository(Pizza::class);
        $pizzas = $repository->findAll();

        return $this->render('@App/readAdmin.html.twig',
            [
                'pizzas' => $pizzas
            ]
        );
    }

    /**
     * @Route("/admin/update/pizza/{id}", name="admin_update_pizza")
     */
    public function AdminUpdateAction(Request $request, $id)
    {
        $repository = $this->getDoctrine()->getRepository(Pizza::class);
        $pizza = $repository->find($id);

        $form = $this->createForm(PizzaType::class, $pizza);
        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()){
            $pizza = $form->getData();

            $entitymanager = $this->getDoctrine()->getManager();
            $entitymanager->persist($pizza);
            $entitymanager->flush();

            return $this->redirectToRoute('admin_index');
        } else {
            return $this->render('@App/updateAdmin.html.twig',
                [
                    'pizza' => $pizza,
                    'form' => $form->createView()
                ]
            );
        }
    }

}