<?php
class Entreprise {
    protected $employes ;
    protected $chiffreAffaire ;
    protected $benefices ;

    public function __construct(array $listeEmploye, int $CA) {
        $this -> setEmployes($listeEmploye) ;
        $this -> setCA($CA) ;
        $this -> benefices = 0 ;
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
    public function getBenefices():int {
        return $this -> benefices ;
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
        $totalSalaires = 0 ;
        
        foreach($this -> employes as $employe) {
            $salaireBrut = $employe -> getSalaire() ;
            
            //on prend en compte le salaire dans les comptes de l'entreprise
            $totalSalaires += $salaireBrut ;

            //on fait toucher le salaire
            $employe -> toucherSalaire($salaireBrut, $caisseCotisation) ;
        }
        
        return $totalSalaires ;
    }
    
    public function afficherEmployes() {
        foreach($this -> employes as $employe) {
            echo "<p>".$employe -> getNom()." ".$employe -> getPrenom()."<br/>" ;
            echo "Salaire : ".$employe -> getSalaire()." " ;
            echo "Compte : ".$employe -> getCompteEnBanque()."</p>" ;
        }
    }
    
    public function calculBenefices() {
        $totalSalaires = 0 ;
        
        foreach($this -> employes as $employe) {
            $salaireBrut = $employe -> getSalaire() ;
            $totalSalaires += $salaireBrut ; 
        }
        
        $this -> benefices = $this -> chiffreAffaire - $totalSalaires ;
    }
}