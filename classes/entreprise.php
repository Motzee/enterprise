<?php
class Entreprise {
    protected $employes ;
    protected $chiffreAffaire ;

    public function __construct(array $listeEmploye, int $CA) {
        $this -> setEmployes($listeEmploye) ;
        $this -> setCA($CA) ;
    }

    /*fonctions SET */
    public function setEmployes(array $employes) {
        $this -> employes = $employes ;
    }
    public function setCA(int $CA) {
        $this -> chiffreAffaire = $CA ;
    }

    /*fonctions GET */
    public function getEmployes() {
        return $this -> employes ;
    }
    public function getCA():int {
        return $this -> chiffreAffaire ;
    }

    /*autres fonctions */
    public function reevaluation() {
        //parcourir tableau employe :
        //si anciennete supérieure à 1 ans, augmentation de 
        foreach($this -> getEmployes() as $employe) {
            if($employe -> anciennete() >= 1) {
                $employe -> augmentation() ;
            }
        }
    }
    
    public function verserSalaires($caisseCotisation) {
        
        foreach($this -> employes as $employe) {
            $salaireBrut = $employe -> getSalaire() ;
            
            //on prélève le salaire sur le chiffre d'affaire
            $this -> chiffreAffaire -= $salaireBrut ;

            //on fait toucher le salaire
            $employe -> toucherSalaire($salaireBrut, $caisseCotisation) ;
        }
    }
    
    public function afficherEmployes() {
        foreach($this -> employes as $employe) {
            echo "<p>".$employe -> getNom()." ".$employe -> getPrenom()."<br/>" ;
            echo "Salaire : ".$employe -> getSalaire()." " ;
            echo "Compte : ".$employe -> getCompteEnBanque()."</p>" ;
        }
    }
}