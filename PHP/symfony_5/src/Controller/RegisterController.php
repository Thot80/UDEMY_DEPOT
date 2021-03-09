<?php
// Controller associé au formulaire d'inscription // Associé à la vue  register/index.html.twig
namespace App\Controller;

use App\Classe\AutoMail;
use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager; // Instanciation d'entityManagerInterface -- Pour mettre les modifications en BDD
    }
    /**
     * @Route("/inscription", name="register")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder,AutoMail $mail): Response
    {
        $user = new User(); // On instancie un nouvel objet $user à partir de la classe User()
        $form = $this->createForm(RegisterType::class, $user); // Méthode pour créer un formulaire à partir de Register>Type et pour le lier à $user
        $form->handleRequest($request); // Mise sur écoute du formulaire

        if($form->isSubmitted() && $form->isValid()) // Si le formulaire est soumis et valide
        {
            $password = $encoder->encodePassword($user, $user->getPassword()); // On encode le mot de passe stocké dans $user
            $user->setPassword($password); // On stocke le mot de place hashé à la place de l'ancien dans $user
            $this->entityManager->persist($user); // On persist les données, on ne fait cette opération que lors de l'ajout d'une nouvelle donnée à la BDD
            $this->entityManager->flush();// On stock les données en BDD

            $mail->sendRegisterSuccess($user->getEmail(), $user->getFullName());

            return $this->redirectToRoute('login'); // Redirection vers la page connexion
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView() // On envoit la vue du formulair à twig
        ]);
    }
}
