<?php


function Ajout_panier($ID){
    $tableau = [];

    $conn = new mysqli('localhost','root','','mydb');
    $REQUETE1 = "SELECT * FROM (SELECT *
FROM etre_dans_panier
INNER JOIN type_produit
ON etre_dans_panier.idTypeProduit= type_produit.ID) as pp WHERE pp.idCompte = {$ID};";
    $conn ->query($REQUETE1);
    while ($)

    return $tableau;
}

?>