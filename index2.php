<?php

require_once('classes/caisseCotisations.php') ;
require_once('classes/personne.php') ;
require_once('classes/employe.php') ;
require_once('classes/entreprise.php') ;

$ursaaf = new CaisseCotisations(0, 0.45) ;

$maPetiteEntreprise = new Entreprise(
    [
        new Employe("A", "Personne", new DateTime('1980-01-01'), "Rhône-Alpes", new DateTime('2010-01-01') , 3500, 200), 
        new Employe("B", "Personne", new DateTime('1982-01-01'), "Rhône-Alpes", new DateTime('2012-01-01') , 3200, 10), 
        new Employe("C", "Personne", new DateTime('1984-01-01'), "Rhône-Alpes", new DateTime('2014-01-01') , 3800, 450)
    ],
    10000
) ;

echo "<h1>Initialement :</h1><pre>" ;
$maPetiteEntreprise -> afficherEmployes() ;
echo "</pre>" ;

echo "<h1>Augmentation annuelle :</h1><pre>" ;
$maPetiteEntreprise -> reevaluation() ;
$maPetiteEntreprise -> afficherEmployes() ;
echo "</pre>" ;



echo "<h1>Et après versement de salaires :</h1><pre>" ;
$maPetiteEntreprise -> verserSalaires($ursaaf) ;
$maPetiteEntreprise -> afficherEmployes() ;
echo "</pre>" ;