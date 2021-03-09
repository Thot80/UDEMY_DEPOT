<?php
// Controller associé à la gestion du cas ou la commande n'a pas pue être validée car refus ou problème de paiement Stripe //
// Associé à la vue order_cancel/index.html.twig
namespace App\Controller;

use App\Classe\AutoMail;
use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderCancelController extends AbstractController
{

    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager; // Instanciation d'entityManagerInterface -- Pour mettre les modifications en BDD
    }

    /**
     * @Route("/commande/erreur/{stripeSessionId}", name="order_cancel")
     */
    public function index($stripeSessionId, AutoMail $mail): Response
    {
        $order = $this->entityManager->getRepository(Order::class)->findOneByStripeSessionId($stripeSessionId);

        //Si order n'est pas trouvé ou si l'order est différent de l'utilisateur connecté, on redirige sur home
        if(!$order || $order->getUser() != $this->getUser() )
        {
            return $this->redirectToRoute('home');
        }
        $mail->sendOrderStatus($order);
        return $this->render('order_cancel/index.html.twig', [
            'order' => $order
        ]);
    }
}
