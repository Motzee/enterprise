<?php

    include_once("classes/personne.php") ;
    include_once("classes/employe.php") ;

    $employe = new Employe(
        'Onym', 
        'Anne', 
        new DateTime('1980-01-01'), 
        'Rhône Alpes', 
        new DateTime('2011-04-02'),
        3000
        );

//on lance la méthode anciennete et on l'echo
echo "<p>".$employe->anciennete()."</p>";
echo "<p>".$employe->getSalaire()." €</p>";
$employe->augmentation();
echo "<p>".$employe->getSalaire()." €</p>";

//Rien à voir, voilà comment on affiche un DateTime
$date = new DateTime();

//affichage de la date en précisant le format de présentation)
echo $date->format('d/m/Y H:i');