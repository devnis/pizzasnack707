<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2018-12-03
 * Time: 10:12
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Produits;
use AppBundle\Form\Type\ProduitsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminProduitsController extends Controller
{
    /**
     * Méthode pour afficher tous les produits
     * @Route("/admin/", name="admin_produit")
     */
    public function PizzaAction()
    {
        // recupére les éléments de la table produits
        $repository = $this->getDoctrine()->getRepository(Produits::class);
        // récupére les données de tous les produit
        $produits = $repository->findAll();

        // envoie les produits dans une vue
        return $this->render('@App/admin/adminPizza/read.html.twig',
            [
                'produits' => $produits
            ]
        );
    }

    /**
     * Méthode pour mettre à jour un produit
     * @Route("/admin/produit/update/{id}", name="admin_produit_update")
     */
    public function UpdateAction(Request $request, $id)
    {
        // recupére les éléments de la table produits
        $repository = $this->getDoctrine()->getRepository(Produits::class);
        // récupére les données d'un produit suivant sont id
        $produit = $repository->find($id);

        // Création d'un formulaire à partir du buildForm du produitType et des élément du produit à modifier
        $form = $this->createForm(ProduitsType::class, $produit);
        // récupére les données du formulaire envoyé
        $form->handleRequest($request);

        //on verifie que le formulaire contient des valeurs
        //on verifie que les éléments rentrées sont conforme à ce qu'on attend
        if ($form->isSubmitted() && $form->isValid()) {
            // créer un message flash quand le produits est modifié
            $this->addFlash("notice", "Le produit est bien enregistré");
            // récupere les données dans une entité à partir des données envoyées
            $produit = $form->getData();

            //recupere l'image
            $image = $produit->getImg();
            // change le nom de l'image
            $imageName = md5(uniqid()).'.'.$image->guessExtension();
            // Sauvegarde le fichier dans le dossier spécifié
            try {
                $image->move(
                    $this->getParameter('img_directory'),
                    $imageName
                );
            } catch (FileException $e) {
                // si le l'image n'est pas sauvegardé dans le dossier
                echo $e->getMessage() . "L'image n'est pas enregistrée";
            }
            // prepare l'envoie du nom du fichier dans la BDD
            $produit->setImg($imageName);

            // appelle la methode getManager pour envoyer les données dans la BDD
            $entityManager = $this->getDoctrine()->getManager();
            // stock les données avant d'etre envoyées
            $entityManager->persist($produit);
            // envoie les données à la base de BDD
            $entityManager->flush();

            // redirige vers une route
            return $this->redirectToRoute('admin_produit');
        } else {
            // si les élément non pas été envoyées on redirige vers le formulaire
            return $this->render('@App/admin/adminPizza/update.html.twig',
                [
                    'produit' => $produit,
                    'form' => $form->createView()
                ]
            );
        }
    }

    /**
     * Méthode de création d'un produits
     * @Route("/admin/produit/create/", name="admin_produit_create")
     */
    public function CreateAction(Request $request)
    {
        // Création d'un formulaire à partir du buildForm du produitType et créer un nouveau produit
        $form = $this->createForm(ProduitsType::class, new Produits());

        // récupére les données du formulaire envoyé
        $form->handleRequest($request);

        //on verifie que le formulaire contient des valeurs
        //on verifie que les éléments rentrées sont conforme à ce qu'on attend
        if ($form->isSubmitted() && $form->isValid()){
            // créer un message flash quand le produits est créer
            $this->addFlash("notice", "Le produit est bien enregistré");

            // récupere les données dans une entité à partir des données envoyées
            $produit = $form->getData();
            //recupere l'image
            $image = $produit->getImg();
            // change le nom de l'image
            $imageName = md5(uniqid()).'.'.$image->guessExtension();

            // Sauvegarde le fichier dans le dossier spécifié
            try {
                $image->move(
                    $this->getParameter('img_directory'),
                    $imageName
                );
            } catch (FileException $e) {
                // si le l'image n'est pas sauvegardé dans le dossier
                echo $e->getMessage() . "L'image n'est pas enregistrée";
            }
            // prepare l'envoie du nom du fichier dans la BDD
            $produit->setImg($imageName);

            // appelle la methode getManager pour envoyer les données dans la BDD
            $entityManager = $this->getDoctrine()->getManager();
            // stock les données avant d'etre envoyer
            $entityManager->persist($produit);
            //envoie les données à la base de BDD
            $entityManager->flush();

            // redirige vers une route
            return $this->redirectToRoute('admin_produit');
        } else{
            // si les élément non pas été envoyées on redirige vers le formulaire
            return $this->render('@App/admin/adminPizza/create.html.twig',
                [
                    'form' => $form->createView()
                ]
            );
        }
    }

    /**
     * @Route("/admin/produit/delete/{id}", name="admin_produit_delete")
     */
    public function DeleteAction($id)
    {
        // créer un message flash quand le produit est supprimé
        $this->addFlash("notice", "le produit est supprimé");

        // on recupére les élément de la table produits
        $repository = $this->getDoctrine()->getRepository(Produits::class);

        // on appelle la methode getManager pour envoyer les données dans la BDD
        $entityManager = $this->getDoctrine()->getManager();

        // récupére les données d'un produit suivant sont id
        $produit = $repository->find($id);

        // stock les données à supprimer
        $entityManager->remove($produit);
        // envoie les données comme quoi le produits est supprimée
        $entityManager->flush();

        // redirige vers la routre
        return $this->RedirectToRoute("admin_produit");
    }
}