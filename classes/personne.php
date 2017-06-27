<?php
class Personne {
    protected $nom ;
    protected $prenom ;
    protected $dateNaissance ;
    protected $region ;

    public function __construct(
        string $nom,
        string $prenom,
        DateTime $dateNaissance,
        string $region) {
        $this -> setNom($nom) ;
        $this -> setPrenom($prenom) ;
        $this -> setDateNaissance($dateNaissance) ;
        $this -> setRegion($region) ;
        
    }

    /* fonctions SET*/
    public function setNom($nom) {
        $this -> nom = $nom;
    }

    public function setPrenom($prenom) {
        $this -> prenom = $prenom ;
    }
    public function setDateNaissance($dateNaissance) {
        $this -> dateNaissance = $dateNaissance ;
    }
    public function setRegion($region) {
        $this -> region = $region ;
    }  

    /* fonctions GET*/
    public function getNom() {
        return $this -> nom ;
    }
    public function getPrenom() {
        return $this -> prenom ;
    }
    public function getDateNaissance() {
        return $this -> dateNaissance ;
    }
    public function getRegion() {
        return $this -> region ;
    }

    /* autres fonctions*/
}