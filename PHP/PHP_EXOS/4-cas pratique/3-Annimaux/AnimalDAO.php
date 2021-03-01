<?php


class AnimalDAO
{
    public static function getAnimaux()
    {
        $bdd = MonPDO::getPDO();
        $req ='SELECT * FROM Animal';
        $stmt = $bdd->prepare($req);
        $stmt->execute();
        // Retourne un tableaux (indexé de0 à n) de tableaux associatif (clé: nom des champs en bdd => valeur : entrées en bdd)
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getTypeNom($idType)
    {
        $bdd = MonPDO::getPDO();
        $req = 'SELECT libelle FROM Type WHERE idType = :idType';
        $stmt = $bdd->prepare($req);
        $stmt->bindParam(':idType', $idType, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public static function getImagesURL($idAnimal)
    {
        $bdd = MonPDO::getPDO();
        $req = 'SELECT url FROM image 
        INNER JOIN image_animal 
        ON image.idImage = image_animal.idImage
        INNER JOIN Animal
        ON image_animal.idAnimal = animal.idAnimal
        WHERE animal.idAnimal = :idAnimal';
        $stmt = $bdd->prepare($req);
        $stmt->bindParam(':idAnimal', $idAnimal,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getImagesLibelle($url)
    {
        $bdd = MonPDO::getPDO();
        $req = 'SELECT libelle FROM image WHERE url = :url';
        $stmt = $bdd->prepare($req);
        $stmt->bindParam(':url', $url, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}