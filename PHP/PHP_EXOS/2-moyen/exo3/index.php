<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exercice 3 : Les tableaux associatifs"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->

<?php
    $annimal1 = 
    [
        'nom' => "Mina",
        "age" => 2,
        "type" => "chien"
    ];

    $annimal2 = 
    [
        'nom' => "Hocquet",
        "age" => 6,
        "type" => "chien"
    ];
    $annimal3 = 
    [
        'nom' => "Tya",
        "age" => 7,
        "type" => "chat"
    ];
    $annimal4 = 
    [
        'nom' => "Milo",
        "age" => 4,
        "type" => "chat"
    ];
    $annimaux = [$annimal1, $annimal2, $annimal3, $annimal4];

    function afficherAnnimalerie()
    {
        global $annimaux;
        echo "<hr>";
        foreach($annimaux as $annimal)
        {
            foreach($annimal as $key => $value)
            {
                echo $key." : ".$value . "<br>";
            }
            echo "<hr> <br>";
        }
    }
    function afficherChat()
    {
        global $annimaux;
        echo "<hr>";
        foreach($annimaux as $annimal)
        {
            foreach($annimal as $key => $value)
            {
                if($annimal["type"] === "chat")
                {
                    echo $key." : ".$value . "<br>";
                }
            }
            echo ($annimal["type"] === "chat") ?  "<hr> <br>" : "";
        }
    }
    function afficherChien()
    {
        global $annimaux;
        echo "<hr>";
        foreach($annimaux as $annimal)
        {
            foreach($annimal as $key => $value)
            {
                if($annimal["type"] === "chien")
                {
                    echo $key." : ".$value . "<br>";
                }
         
            }
            echo ($annimal["type"] === "chien") ?  "<hr> <br>" : "";
        }
        
    }
    
?>

<button type="button" class="btn btn-primary text-align "><a class="text-white" href="?type=tous"> tous </a></button>
<button type="button" class="btn btn-primary text-align"> <a class="text-white" href="?type=chien"> chiens </a></button>
<button type="button" class="btn btn-primary text-align"> <a class="text-white" href="?type=chat"> chats </a></button>

<?php

if(isset($_GET["type"]))
{
    if($_GET["type"]==='tous')
    {
        afficherAnnimalerie();
    }
    

    if($_GET["type"]==='chien')
    {
        afficherChien();
    }
    if($_GET["type"]==='chat')
    {
        afficherChat();
    }
}

?>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
