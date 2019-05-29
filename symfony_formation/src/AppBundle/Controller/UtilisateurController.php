<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Utilisateur;

class UtilisateurController extends Controller
{
    /**
     * @Route("/utilisateur/view", name="utilisateur_view")
     */
    public function viewAction($id) {
        

        // générer une page d'erreur 404 si l'article n'existe pas
        if ($utilisateur == null) {
            // le code s'arrêtera ici si on rentre dans le if
            throw new NotFoundHttpException();
        }

        $response = $this->render('utilisateur/view.html.twig', [
            'utilisateur' => $utilisateur
        ]);
        return $response;
    }

   
    /**
     * @Route("/utilisateur/insert", name="utilisateur_insert")
     */
    public function insertAction() {
        $utilisateur = new Article();
        $utilisateur->setEmail("email");
        $utilisateur->setDateNaissance("date de naissance");
        $utilisateur->setIsOnline(true);
        $utilisateur->setCreatedAt(new \DateTime());
        $utilisateur->setPassword("mot de passe");

        // récupérer le manager de doctrine pour insérer en bdd
        $em = $this->getDoctrine()->getManager();
        // persist sert à dire à doctrine de gérer cet objet
        $em->persist($utilisateur);
        // flush sert à envoyer réellement les requêtes à la bdd
        $em->flush();

        return new Response("utilisateur bien enregistré id : ".$utilisateur->getId());
    }

  
    /**
     * @Route("/remove/{id}", name="utilisateur_remove")
     */
    public function removeAction($id) {
        // récupérer un seul article depuis la base de données
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository("AppBundle:utilisateur")->find($id);

        // supprimer une entité
        if ($utilisateur != null) {
            $em->remove($utilisateur);
            $em->flush();
        }


        return new Response("utilisateur bien supprimé");
    }

}
