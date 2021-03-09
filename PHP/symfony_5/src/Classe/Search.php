<?php
// Classe qui représente notre système de recherche et de filtre de produit
namespace App\Classe;

use App\Entity\Category;

class Search
{
    /**
     * @var string
     */
    public $string = '';

    /**
     * @var Category[]
     */
    public $categories = [];

}