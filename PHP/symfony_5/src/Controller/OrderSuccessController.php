<?php
// Controller associé à la gestion du cas ou la commande est validée par Stripe //
// Associé à la vue order_success/index.html.twig
namespace App\Controller;

use App\Classe\AutoMail;
use App\Classe\Cart;
use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderSuccessController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager; // Instanciation d'entityManagerInterface -- Pour mettre les modifications en BDD
    }

    /**
     * @Route("/commande/merci/{stripeSessionId}", name="order_success")
     */
    public function index(Cart $cart, $stripeSessionId, AutoMail $mail): Response
    {
        $order = $this->entityManager->getRepository(Order::class)->findOneByStripeSessionId($stripeSessionId);

        //Si order n'est pas trouvé ou si l'order est différent de l'utilisateur connecté, on redirige sur home
        if(!$order || $order->getUser() != $this->getUser() )
        {
            return $this->redirectToRoute('home');
        }

        //Si la commande a le statut non payé, on la passe en payé
        if ($order->getState() == 0)
        {
            //vider le panier utilisateur
            $cart->remove();

            //isPaid modifié à 1 pour valider que Stripe a reçu le paiement
            $order->setState(1);
            $this->entityManager->flush();

            // Envoie du mail de confirmation
            $mail->sendOrderStatus($order);
        }


        // On vient afficher à l'utilisateur des infos sur sa commande
        return $this->render('order_success/index.html.twig', [
            'order' => $order
        ]);
    }
}
