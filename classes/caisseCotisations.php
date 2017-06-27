<?php
class CaisseCotisations {
    protected $depot ;
    protected $tauxCotisations ;

    public function __construct(float $depot, float $tauxCotisations) {
        $this -> setDepot($depot) ;
        $this -> setTauxCotisations($tauxCotisations) ;
    }

    /*Fonctions SET*/
    function setDepot($depot) {
        $this->depot = $depot;
    }

    function setTauxCotisations($tauxCotisations) {
        $this->tauxCotisations = $tauxCotisations;
    }

    /*Fonctions GET*/
    public function getTauxCotisations() {
        return $this -> tauxCotisations ;
    }
    
    public function getDepot() {
        return $this -> depot ;
    }

    /*autres fonctions*/
    public function cotiser($salaireBrut):int {
        $salaireNet = $salaireBrut * (1 - $this -> tauxCotisations) ;
        $cotisations = $salaireBrut * $this -> tauxCotisations ;

        //versement au dépot des cotisations
        $this -> depot += $cotisations ;

        //laisse à l'employé le reste
        return $salaireNet ;
    }

    
    
}