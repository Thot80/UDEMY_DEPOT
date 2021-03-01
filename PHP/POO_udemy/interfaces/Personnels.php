<?php

// interface est une espèce de généralisation de la notion de classe abstraite
// On ne peux pas déclarer d'attributs ou de méthodes dans une interface, seleument les signatures des méthodes et des constantes
// Une interface ne peut pas avoir le même nom qu'une classe et vice versa
// Une interface ne peut pas contenir de méthode abstraite
interface Personnels
{
    const ANCIENNETE_MIN = 5;
    const ANCIENNETE_MAX = 20;

    // Signatures des méthodes qui devrons être implémentées obligatoirement dans les classes filles de l'interface
    // Ces signatures sont forcéments celles de m:"thodes public
    public function getNom();
    public function getAnciennete();
    public function getIndice();
    public function calculerSalaire();

}