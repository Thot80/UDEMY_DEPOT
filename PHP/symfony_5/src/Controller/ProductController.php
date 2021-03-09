<?php
// Controller associé à la gestion du catalogue affichage des produits / details d'un produit / Filtre et recherche
// Associé aux vues product/index.html.twig et product/show.html.twig
namespace App\Controller;

use App\Classe\Search;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/nos-produits", name="products")
     */
    public function index(Request $request)
    {
        $search = new Search(); // Nouvelle instance de notre classe search
        $form = $this->createForm(\App\Form\SearchType::class, $search);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            // Si l'utilisateur a fait une recherche par mots clés ou par catégories
            // findWithSearch() est une méthode que nous avons implémentée dans productRepository
            $products = $this->entityManager->getRepository(Product::class)->findWithSearch($search);
        }
        else
        {
            $products = $this->entityManager->getRepository(Product::class)->findAll();
            // On récupère tous les produits en BDD et on les stocks dans $products si il n'y a pas eu de filtre
        }

        return $this->render('product/index.html.twig', [
            'products' => $products,
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/produit/{slug}", name="product")
     */
    public function show($slug)
    {
        $product = $this->entityManager->getRepository(Product::class)->findOneBySlug($slug);
        // On récupère le produit en BDD via le slug passé en URL

        $bestProducts = $this->entityManager->getRepository(Product::class)->findByIsBest(1);


        // Cas ou le slug ne correspond à aucun produit
        if(!$product) {
            return $this->redirectToRoute('products');
        }

        return $this->render('product/show.html.twig', [
            'product' => $product,
            'bestProducts' => $bestProducts
        ]);
    }
}
