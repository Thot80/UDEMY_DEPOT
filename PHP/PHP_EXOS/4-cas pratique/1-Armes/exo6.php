<?php ob_start(); //NE PAS MODIFIER
$titre = "Partie 6 : Gestion d'images en fonction du level"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
// Fonction qui permet de reformater une chaine de caractère pour y enlever les accents
     function formatage($chaine)
    {
        $accents = ['À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë',
            'Ì','Í','Î','Ï','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý',
            'à','á','â','ã','ä','å','ç','è','é','ê','ë','ì',
            'í','î','ï','ð','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ'];
        $sansAccents = ['A','A','A','A','A','A','C','E','E','E','E','I','I','I',
            'I','O','O','O','O','O','U','U','U','U','Y','a','a','a','a',
            'a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o',
            'o','u','u','u','u','y','y'];
        return  str_replace($accents, $sansAccents, $chaine);
    }
?>
<?php
class Armes
{
    private $nom;
    private $level;
    private $description;


    public function __construct($nom, $level, $description)
    {
        $this->setNom($nom);
        $this->setLevel($level, $nom);
        $this->setDescription($description);
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level, $nom): void
    {
        switch ($nom)
        {
            case 'épée':
                $level = ($level > 0 && $level < 6) ? $this->level = $level :  trigger_error('Niveau inconnue pour cette arme !',E_USER_WARNING);;
                break;
            case 'arc':
                $level = ($level > 0 && $level < 3) ? $this->level = $level :  trigger_error('Niveau inconnue pour cette arme !',E_USER_WARNING);;
                break;
            case 'hache':
                $level = ($level > 0 && $level < 6) ? $this->level = $level :  trigger_error('Niveau inconnue pour cette arme !',E_USER_WARNING);;
                break;
            case 'fleau':
                $level = ($level > 0 && $level < 6) ? $this->level = $level :  trigger_error('Niveau inconnue pour cette arme !',E_USER_WARNING);;
                break;
        }
        $this->level = $level;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }


    // Méthode 'magique', permet de faire un echo sur un objet
    public function __toString()
    {
        $text ='Arme : '.$this->getNom().'<br>';
        $text .= 'Description : '.$this->getDescription().'<br>';
        $text .= 'Niveau de l\'Arme : '.$this->getLevel().'<br>';
        return $text;
    }
}
?>
<?php

$arme1 = new Armes('épée',3,'Une arme tranchante');
$arme2 = new Armes('arc', 1,'Une arme à distance');
$arme3 = new Armes('hache',2,'Une arme tranchante affectionnée par les nains');
$arme4 = new Armes('fleau', 5,'Une arme tranchante');

$armes = [$arme1, $arme2, $arme3, $arme4];
?>
<?php foreach ($armes as $arme):?>
<div class="row">
    <div class="col-3">
        <img src="sources/<?=formatage($arme->getNom()).'/'.formatage($arme->getNom()).$arme->getLevel().'.png'?>" alt="Photo d'une arme">
    </div>
    <div class="col-3">
        <h2><?=$arme->getNom()?></h2> <br>
        <p><?= $arme->getDescription()?></p>
    </div>
    <div class="col-auto">
        <?= $arme ?>
    </div>
</div>
<?php
endforeach;
?>

<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
$content = ob_get_clean();
require "../../global/common/template.php";
?>
