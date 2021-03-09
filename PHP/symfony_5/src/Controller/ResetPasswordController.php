<?php
// Controller qui gère la création et l'envoi d'un mot de passe temporaire à l'utilisateur s'il en fait la demande
namespace App\Controller;

use App\Classe\AutoMail;
use App\Entity\ResetPassword;
use App\Entity\User;
use App\Form\ResetPasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ResetPasswordController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/mot-de-passe-oublie", name="reset_password")
     */
    public function index(Request $request, AutoMail $mail): Response
    {
        // Si l'utilisateur est déja connécté, on le renvoie vers sa page perso
        if($this->getUser())
        {
            return $this->redirectToRoute('account');
        }

        // Si le controller a reçu un email pat la méthode POST du formulaire de la vue associée, on récupe l'utilisateur en BDD et on l'instancie dans $user
        if($request->get('email'))
        {
            $user = $this->entityManager->getRepository(User::class)->findOneByEmail($request->get('email'));

            // Si cet e-mail correspond bien à un utilisateur enregistré en BDD
            if($user)
            {
                // Instance de ResetPassword, on stock utilisateur, un token unique généré par php et le timestamp du moment
                $new_password = new ResetPassword();
                $new_password->setUser($user);
                $new_password->setToken(uniqid());
                $new_password->setCreatedAt(new \DateTime());

                // On met tout ça en BDD
                $this->entityManager->persist($new_password);
                $this->entityManager->flush();

                // On envoi un mail contenant le code provisoire pour pouvoir accéder à son compte

                $url = $this->generateUrl('update_password', [
                    'token' => $new_password->getToken()
                ]);
                $mail->sendTemporaryPassword($user->getEmail(), $user->getFullName(), $url);
                $this->addFlash('notice', 'Vous allez recevoir un email dans quelques instants, suivez le lien qu\'il contient pour réinitialiser votre mot de passe');
            }
            else
            {
                // Si on ne trouve pas le mail dans la bdd, on affiche une notification flash et on redirige vers la page ou on demande le mail
                $this->addFlash('notice', 'Email inconnu, veuillez sasir votre adresse email de connexion');
                return $this->redirectToRoute('reset_password');
            }
        }
        return $this->render('reset_password/index.html.twig');
    }

    /**
     * @Route("/modifier-mon-mot-de-passe/{token}", name="update_password")
     */
    public function update_password($token, Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        // On récupère l'entité associée au mot de passe provisoire via le token reçu en url
        $reset_pwd = $this->entityManager->getRepository(ResetPassword::class)->findOneByToken($token);

        // Si le token de l'url n'existe pas, redirection
        if(!$reset_pwd)
        {
            return $this->redirectToRoute('reset_password');
        }

        // On instanci la date du moment pour pouvoir gérer la validité ou non du mot de passe provisoire
        $now = new \DateTime();

        // On gère le cas ou le mot de passe a expiré
        if($now > $reset_pwd->getCreatedAt()->modify('+3hours'))
        {
            $this->addFlash('notice', 'Votre mot de passe provisoire a expiré, veuillez recommencer');
            return $this->redirectToRoute('reset_password');
        }

        $form = $this->createForm(ResetPasswordType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            // Si le formulaire est valide, il faut encoder le nouveau mot de passe dans l'entité user et mettre à jour dans la base de données
            $new_pwd = $form->get('new_password')->getData();
            $user = $reset_pwd->getUser();
            $password = $encoder->encodePassword($user, $new_pwd);
            $user->setPassword($password);
            $this->entityManager->flush();
            $this->addFlash('notice', 'Votre mot de passe a bien été mis à jour, vous pouvez vous connecter');
            return $this->redirectToRoute('login');
        }
        return $this->render('reset_password/update.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
