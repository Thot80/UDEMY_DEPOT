
***********************************************************************

Création d'un site de e-commerce, toujours en dev pour le moment

*****************************************************************************

Pour réqupérer le projet :

 - git clone
 - La bdd se trouve dans public/bdd, pensez à l'importer
 - pensez à mettre à jour votre .env 
   
************************************************************************
   A ce stade, les bundles requis sont :

- EasyAdmin 3 : composer require easycorp/easyadmin-bundle
- Stripe : composer require stripe/stripe-php
- Il faut un compe stripe pour tester le cannal de paiement
*****************************************************************************

MailHog est un outils permettant de simuler un serveur SMTP pour la gestion et le test
d'envoi de mails

Télécharger le exe depuis leur gitHub : https://github.com/mailhog/MailHog

Lancer le point exe, il vous donne les infos suivantes :
  
- SMTP 1025
- HTTP 8025

Il est maintenant possible d'aller sur l'interface de simulation de mailHog à 
l'adresse suivante : 127.0.0.1:8025

Pour configurer le serveur SMTP sur le projet, allez dans le .env,
MAILER_DSN=smtp://localhost:1025

**********************************************************************************

Mémo récapitulatif

************************************************************************************
Les classes :

- La classe Cart() gère notre panier, elle contient les fonctions suivantes
  
  -> add($id // Fonction d'ajout d'un produit au panier via son id 
  
  -> get() // Fonction qui permet d'obtenir notre panier,
  retourne session['cart'],
  c-a-d 1 tableau [id => quantité]
  
  -> remove() // Fonction qui permet d'effacer le panier
  
  -> delete($id) // Fonction qui permet de supprimer un produit du panier via son identifiant
   
  -> decrease($id) // Fonction qui permet de diminuer la quantité d'un produit de 1 via son identifiant
  
  -> getFull() // Fonction qui permet de récupérer les objets product, renvoie un tableau de tableaux associatifs ['product' => Objet product, 'quantity' => quantité]
  
- La classe Search(), représente notre système de recherche et de filtre de produits dans le catalogue

- La classe AutoMail, gère nos fonctions  d'envoi de mails, elle contient les fonctions suivantes :

  -> sendRegisterSuccess($emailUser, $fullNameUser) qui prend l'email et le nom de l'utilisateur en argument

  -> sendOrderStatus($order), prend un objet Order() en argument,
  envoi un mail informant l'utilisateur de l'état de sa commande en fonction
  de la valeur de Order->getState() : 0/Abandon, 1/Payée, 2/En Préparation, 3/En livraison
  
  
Les rendus graphiques des mails sont dans templates/email/register_succes.html.twig 
et templates/email/order_status.html.twig, ils sont largement améliorables


*************************************************************************************

Les controllers :

- AccountAdresseController : Controller associé à la gestion des adresses, affichage / ajout / modification / supression
  // Associé aux vue adresse.html.twig et adresse_form.html.twig dans account

- AccountController :  Controller associé à la page Mon-compte // Associé à la vue 
/acount/index.html.twig
  
- CartController : Controller associé à la gestion du panier, affichage / ajout d'un produit / retrait d'un produit / Supression d'un produit / Supression du panier
// Associé à la vue cart/index.html.twig

- HomeController : Controller associé à la page d'accueil // Associé à la vue home/index.html.twig  

- OrderCancelController : Controller associé à la gestion du cas ou la commande n'a pas pue être validée car refus ou problème de paiement Stripe //
  // Associé à la vue order_cancel/index.html.twig

- OrderController : Controller qui gère le choix de l'adresse de livraison, du transporteur et affiche un bref récap du panier 
  // Associé aux vues order/index.html.twig et order/add.html.twig

- OrderSuccessController : Controller associé à la gestion du cas ou la commande est validée par Stripe //
  // Associé à la vue order_success/index.html.twig
  
- ProductController   Controller associé à la gestion du catalogue affichage des produits / details d'un produit / Filtre et recherche
  // Associé aux vues product/index.html.twig et product/show.html.twig

- RegisterController : Controller associé au formulaire d'inscription 
  // Associé à la vue  register/index.html.twig

- SecurityController :  Controller qui check si le user qui tente de se connecter existe en BDD 
  // Associé à la vue security/login.html.twig

- StripeController : Controller qui gère notre connexion à l'API de paiement Stripe
// tout ce qui concerne Stripe a été fait en suivant la doc mise à dispo
  directement sur le site de l'API
  
- ResetPasswordController : Controller qui gère le cas mot de passe oublié, ces pages ne 
  sont accessibles que depuis un mail envoyé à l'utilisateur, identifiant via le 
  token généré dans l'entité ResetPassword() et passé en URL depuis le mail
  // Associé aux vues reset_password/index.html.twig
  et reset_password/update.html.twig
***********************************************************************

Les entités :

- Adress() :

  -> Liée à User() par une relation ManyToOne, chaque adresse appartient à un seul utilisateur
  , en découle les méthodes getUser() qui permet d'obtenir l'objet User() à qui
  l'adresse appartient et setUser(objet User) pour setter un User().
  
  -> On a def une méthode magique __toString() qui est invoquée 
  automatiquement quand on essaye d'utiliser un objet adresse
  comme une chaine de charactères.
  
- Carrier() :

  -> On a def une méthode magique __toString() qui est invoquée 
  automatiquement quand on essaye d'utiliser un objet carrier
  comme une chaine de charactères

- Category() :

  -> On a def une méthode magique __toString() qui est invoquée
  automatiquement quand on essaye d'utiliser un objet category
  comme une chaine de charactères

  -> Liée à Product() par une relation ManyToOne, à chaque catégorie
  peuvent appartenir plusieurs product
  , en découle la méthode getProducts() qui permet d'obtenir une collection
  d'objets produits qui appartiennent à la category, la méthode
  addProduct() pour ajouter un Product à la collection et la méthode 
  removeProduct() pour en supprimer un.
  
- Order() : 

  -> On a choisi de stocker 'en dur' certaines informations que nous avons par ailleurs
  dans d'autres entités pour pouvoir garder traces de ces infos même si
  les entités correspondantes n'existent plus.
  
  -> Liée à User() par une relation ManyToOne, chaque commande
  appartient à un unique User()
  , en découle la méthode getUser() qui permet d'obtenir l'utilisateur qui a passé commande
  et setUser(objet user) qui permet de setter l'utilisateur .
  
  -> Liée à OrderDetails() par une relation ManyToOne,
  chaque commande contient plusieurs orderDetails (1 par produit en fait)
  , en découle la méthode getOrderDetails() qui renvoie une collection
  d'objets OrderDetails, la méthode addOrderDetail() pour ajouter
  une OderDetail() à la collection et la méthode
  removeOrderDetail() pour en supprimer une.
  
  -> On a def une méthode getTotal() qui calcule le total de la commande
  en bouclant sur les totaux des OrderDetails qu'elle comprend.
  
  -> Definition de la méthode getStatus() qui renvoie une chaine de charactère 
  selon l'état de la commande

- OrderDetails()

  -> Liée à Order() par une relation ManyToOne,
  chaque orderDetail appartient à une seule Order,
  en découle la méthode getMyOrder() qui renvoie la commande à laquelle
  appartient un objet orderDetails.

  -> On a def une méthode magique __toString() qui est invoquée
  automatiquement quand on essaye d'utiliser un objet orderDetails
  comme une chaine de charactères, renvoit 'nom-du_produit x quantité'.

- Product()

  -> Liée à Category() par une relation ManyToOne,
  chaque product appartient à une seule category,
  en découle la méthode getCategory() qui renvoie la categorie 
  à laquelle appartient un objet Product.
  
- User()

  -> L'attribut rôle est passé en ROLE_USER de base lors de la création.

  -> Definition d'une méthode getFullName() qui renvoie 'Prénom Nom'.

  -> Liée à Adress() par une relation ManyToOne,
  chaque User conteint plusieurs Adress 
  , en découle la méthode getAdresses() qui renvoie une collection
  d'objets Adress et la méthode addAdress() pour ajouter une Adress()
  à la collection.
  
  -> Liée à Order() par une relation ManyToOne,
  chaque User contient plusieurs Order
  , en découle la méthode getOrders() qui renvoie une collection
  d'objets Order, la méthode addOrders() pour ajouter une Order()
  à la collection et la méthode removeOrder() pour en supprimer une.
  
- Header()
  
  -> Nous permet d'afficher des photos et des accroches commerciales dans le carousel

- ResetPassword()

  -> Nous permet de créer des mots de passe provisoire pour un utilisateur qui a oublié son 
  mot de passe
  
  -> Liée à User() en ManyToOne

  -> Contient un token unique généré en php et la date de création
*******************************************************************

Les FormType :

- AdressType : Formulaire d'ajout ou de modification d'une adresse

- ModifyPasswordType : Formulaire de modification du mot de passe

- OrderType : Formulaire de sélection d'une adresse de livraison et d'un transporteur

- RegistrType : Formulaire d'inscription 

- SearchType : // Formulaire associé à notre recherche 
  par mots clefs et par filtre de catégories
  
- ResetPasswordType : Formulaire de modification du mot de passe si oublié par l'utilisateur

**********************************************************************

Les modifs dans les Repository :

- ProductRepository() // Création de la méthode findWithSearch() qui retourne
  un tableau d'objets Product() en fonction des mots clés 
  saisis par l'utilisateur ou des catégories sélectionnées.

- OrderRepository() //Création d'une méthode findSuccessOrders()
  qui permet de récupérer toutes les commandes d'un utilisateur 
  qui ont été payées.

*****************************************************************************

TODO

- Améliorer / Harmoniser les rendus graphiques en général
- Passer en dev et héberger le site
- Allimenter la bdd
- Améliorer la sécurité des formulaires avec des regex
- Les liens du carousel pointent tous sur la même page,
  trouver un moyen de renvoyer sur les pages souhaitées
  
- Ajouter une entitée marque et modifier le filtre pour faire des recherches
  par marques
  