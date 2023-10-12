<?php
// namespace
namespace Poo\HeritageComposer\Entity;

use DateTime;

// classes
class Etudiant extends Personne {

    // Attributes
    private $coursSuivis = [];
    private $niveau;
    private $dateInscription;

    // getters & setters
    public function getCoursSuivis(){
        return $this->coursSuivis;
    }
    public function setCoursSuivis(array $newCoursSuivis){
        $this->coursSuivis = $newCoursSuivis;
    }
    public function getNiveau(){
        return $this->niveau;
    }
    public function setNiveau(string $newNiveau){
        $this->niveau = $newNiveau;
    }
    public function getdateInscription(){
        return $this->dateInscription;
    }
    public function setDateInscription(DateTime $newDateInscription){
        $this->dateInscription = $newDateInscription;
    }

    // Autres methodes
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
            $this->coursSuivis.",".
            $this->niveau.",".
            $this->dateInscription;
    }


}
?>