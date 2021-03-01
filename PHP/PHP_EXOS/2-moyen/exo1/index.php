<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exercice 1 : Tableaux à deux dimensions"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->

<table>
<tbody classe="table">
<?php

$table[0][0] = 0;

for ($i = 1; $i <= 10; $i++)
{
  echo "<tr>";
  for ($j =1; $j <= 10; $j++)
  {
    $table[$i][$j] = $i*$j;
    echo "<td class=\"px-5 text-center \">" . $table[$i][$j] . "</td>";
  }
  echo "</tr>";
}
?>
</tbody>
</table>

<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
