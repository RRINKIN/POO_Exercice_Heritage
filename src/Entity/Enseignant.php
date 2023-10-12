<?php
// namespace
namespace Poo\HeritageComposer\Entity;

// classes
class Enseignant extends Personne {

    // Attributes
    private $coursDonnes = [];
    private $entreeEnService;
    private $anciennete;

    // Methodes
    public function resume(){
        $newResume = 
            $this->id.",".
            $this->nom.",".
            $this->prenom.",".
            $this->adresse.",".
            $this->codePostal.",".
            $this->pays.",".
            $this->pays.",".
            $this->societe.",".
            $this->coursDonnes.",".
            $this->entreeEnService.",".
            $this->anciennete;
    }
}