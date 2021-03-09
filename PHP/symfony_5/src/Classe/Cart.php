<?php
// Classe qui gère l'ensemble des fonctionnalitées du panier d'achat
namespace App\Classe;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Cart
{
    private $session;
    private $entityManager;

    // On instancie une session pour stocker nos infos relatives aux panier et un entityManager pour communiquer avec la BDD
    public function __construct(EntityManagerInterface $entityManager, SessionInterface $session)
    {
        $this->session = $session;
        $this->entityManager = $entityManager;
    }

    // Fonction d'ajout d'un produit au panier via son id
    public function add($id)
    {
        // On récupère notre session['cart'] qu'on stocke dans $cart, si elle n'existe pas, elle est instanciée à un tableau vide
        $cart = $this->session->get('cart', []);

        // session['cart'] est un tableau indéxé, l'index représente l'id du produit, la valeur associée la quantité


        // Si il y a déjà un produit avec cet id dans le panier, on ajoute 1 à la quantité
        if (!empty($cart[$id])) {
            $cart[$id]++;
        }
        // Sinon, on initialise l'index n°id du tableau avec la valeur 1
        else {
            $cart[$id] = 1;
        }

        // On met à jour ces changement dans la session
        $this->session->set('cart', $cart);
    }


    // Fonction qui permet d'obtenir notre panier, retourne session['cart'], c-a-d 1 tableau [id => quantité]
    public function get()
    {
        return $this->session->get('cart');
    }

    // Fonction qui permet d'effacer le panier
    public function remove()
    {
        return $this->session->remove('cart');
    }

    // Fonction qui permet de supprimer un produit du panier via son identifiant
    public function delete($id)
    {
        $cart = $this->session->get('cart', []);

        unset($cart[$id]);

        return $this->session->set('cart', $cart);
    }

// Fonction qui permet de diminuer la quantité d'un produit de 1 via son identifiant
    public function decrease($id)
    {
        $cart = $this->session->get('cart', []);

        //vérifier si la quantité de notre panier est supérieur a 1
        if ($cart[$id] > 1)
        {
            //retirer une quantité -1
            $cart[$id]--;

        } else {
            //supprimer le produit en supprimant la 'case' n°id du tableau $cart
            unset($cart[$id]);
        }
        return $this->session->set('cart', $cart);
    }

    // Fonction qui permet de récupérer les objets product, renvoit un tableau de tableaux associatifs ['product' => Objet product, 'quantity' => quantité]
    public function getFull()
    {
        $cartComplete = [];

        // Pour chaque entrée du tableau session['cart'] avec clé comme $id et valeure comme $quantity
        foreach ($this->get() as $id => $quantity) {
            // On récupère l'objet product en BDD via son identifiant
            $product_object = $this->entityManager->getRepository(Product::class)->findOneById($id);

            // Cas ou un identifiant bidon a été injecté dans l'URL, on ne trouve pas de produit en BDD, on supprime cette entrée de la session
            if (!$product_object)
            {
                $this->delete($id);
                continue;
            }
            $cartComplete[] = [
                'product' => $product_object,
                'quantity' => $quantity
            ];
        }
        return $cartComplete;
    }
}