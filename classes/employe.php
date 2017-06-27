<?php
class Employe extends Personne {
    protected $dateEmbauche ;
    protected $salaire ; //salaire brut
    protected $compteEnBanque ;

    public function __construct(
        string $nom,
        string $prenom,
        DateTime $dateNaissance,
        string $region,
        DateTime $dateEmbauche,
        int $salaire,
        float $compteEnBanque
        ) {
        parent::__construct($nom, $prenom, $dateNaissance, $region) ;

        $this -> setDateEmbauche($dateEmbauche) ;
        $this -> setSalaire($salaire) ;
        $this -> setCompteEnBanque($compteEnBanque) ;
    }

 /*Fonctions SET*/   
    public function setDateEmbauche($dateEmbauche) {
        $this -> dateEmbauche = $dateEmbauche ;
    }

    public function setSalaire($salaire) {
        $this -> salaire = $salaire ;
    }
    
    function setCompteEnBanque($compteEnBanque) {
        $this->compteEnBanque = $compteEnBanque;
    }

 /*Fonctions GET*/
    public function getDateEmbauche() {
        return $this -> dateEmbauche ;
    }

    public function getSalaire():int {
        return $this -> salaire ;
    }
    
    function getCompteEnBanque() {
        return $this->compteEnBanque;
    }

/*Autres fonctions */
    public function anciennete():int {
        $aujourdhui = new DateTime() ;
        //la méthode diff permet de récupérer un tableau contenant la différence exprimée en années y, en jours d, etc
        $travailleDepuis = $this -> dateEmbauche -> diff($aujourdhui) ;
        return $travailleDepuis -> y ;
    }

    public function augmentation() {
        $anciennete = $this -> anciennete() ;
        if($anciennete < 5) {
            $this -> salaire *= 1.02 ;
        } elseif($anciennete < 5) {
            $this -> salaire *= 1.05 ;
        } else {
            $this -> salaire *= 1.1 ;
        }
    }

    public function toucherSalaire($salaireBrut, $caisseDeCotisation) {
        //cotiser
        $salaireNet = $caisseDeCotisation -> cotiser($salaireBrut) ;
        
        //toucher le reste
        $this -> compteEnBanque += $salaireNet ;
    }
}