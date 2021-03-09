<?php

// Ce controller gère la modification de son mot de passe par un utilisateur

namespace App\Controller;

use App\Form\ModifyPasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AccountPasswordController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager; // Instanciation d'entityManagerInterface -- Pour mettre les modifications en BDD
    }

    /**
     * @Route("/compte/mot-de-passe", name="password")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $message = null;
        $user = $this->getUser(); // On récupère les données de l'utilisateur qui est connecté, on les stock dans une instance de User()
        $form = $this->createForm(ModifyPasswordType::class, $user); // On instancie un formulaire à partir de ModifyPasswordType et de l'objet $user
        $form->handleRequest($request); // On met le formulaire sur écoute grace à $request une instance de Request

        if($form->isSubmitted() && $form->isValid()) // Si le formulaire est soumis et s'il est valide
        {
            $old_password = $form->get('old_password')->getData(); // Récupération du mot de passe saisie dans le champ 'old_password'
            if($encoder->isPasswordValid($user, $old_password)) // Si ce mot de passe est le même que celui stocké en BDD pour cet utilisateur
            {
                $new_password = $form->get('new_password')->getData(); // Récupération du mot de passe saisie dans le champ 'new_password'
                $password = $encoder->encodePassword($user, $new_password); // On hash ce mot de passe
                $user->setPassword($password); // On affecte ce mot de passe hashé à l'objet $user via le setter associé
                $this->entityManager->flush(); // On inscrit les données en BDD
                $message = 'Votre mot de passe à bien été mis à jour';
            }
            else
            {
                $message = 'Mot de passe incorrect';
            }

        }

        return $this->render('account/password.html.twig', [
            'form' => $form->createView(), // On passe à TWIG la vue associé au formulaire
            'message' => $message
        ]);
    }
}
