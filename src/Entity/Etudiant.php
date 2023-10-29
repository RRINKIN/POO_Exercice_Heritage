<?php
// namespace
namespace Poo\HeritageComposer\Entity;
use DateTime;
use Exception;

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
            $this->id." ".
            $this->nom." ".
            $this->prenom." ".
            $this->adresse." ".
            $this->codePostal." ".
            $this->pays." ".
            $this->societe." ".
            $this->coursSuivis." ".
            $this->niveau." ".
            $this->dateInscription;

        $listOfErrors = [];
        if (empty($this->nom)) {
            array_push($listOfErrors, "Pas de nom");
        } elseif (empty($this->prenom)) {
            array_push($listOfErrors, "Pas de prénom");
        } elseif (empty($this->adresse)) {
            array_push($listOfErrors, "Pas d'addresse'");
        } elseif (empty($this->codePostal)) {
            array_push($listOfErrors, "Pas de code postal");
        } elseif (empty($this->pays)) {
            array_push($listOfErrors, "Pas de pays");
        } elseif (empty($this->societe)) {
            array_push($listOfErrors, "Pas de société");
        } elseif (empty($this->coursSuivis)) {
            array_push($listOfErrors, "Pas de cours suivis");
        } elseif (empty($this->niveau)) {
            array_push($listOfErrors, "Pas de niveau");
        } elseif (empty($this->dateInscription)) {
            array_push($listOfErrors, "Pas de date d'inscription");
        };
        

        // exception in case of any attribute is missing
        if (empty($listOfErrors)){
            echo $newResume;
        } else {
            var_dump($listOfErrors);
            throw new Exception("C'est la merde");
        }
    }
}
?>