<?php
// namespace
namespace Poo\HeritageComposer\Entity;
use DateTime;
use Exception;


// classes
class Etudiant extends Personne implements Affichable {

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
    public function getDateInscription(){
        return $this->dateInscription;
    }
    public function setDateInscription(DateTime $newDateInscription){
        $this->dateInscription = $newDateInscription;
    }

    // Autres methodes
    public function resume(){
        // check for empty fields
        $listOfErrors = [];
        if (empty($this->nom)) {
            array_push($listOfErrors, "Pas de nom");
        }
        if (empty($this->prenom)) {
            array_push($listOfErrors, "Pas de prénom");
        } 
        if (empty($this->adresse)) {
            array_push($listOfErrors, "Pas d'addresse'");
        } 
        if (empty($this->codePostal)) {
            array_push($listOfErrors, "Pas de code postal");
        } 
        if (empty($this->pays)) {
            array_push($listOfErrors, "Pas de pays");
        } 
        if (empty($this->societe)) {
            array_push($listOfErrors, "Pas de société");
        } 
        if (empty($this->coursSuivis)) {
            array_push($listOfErrors, "Pas de cours suivis");
        } 
        if (empty($this->niveau)) {
            array_push($listOfErrors, "Pas de niveau");
        } 
        if (empty($this->dateInscription)) {
            array_push($listOfErrors, "Pas de date d'inscription");
        };

        // exception in case of any attribute is missing
        if (!empty($listOfErrors)){
            var_dump($listOfErrors);
            throw new Exception("C'est la merde");
        }

        // array to string
        // coursSuivis from array to string using join
        $data = $this->coursSuivis;
        if(\gettype($data) == 'string') {
            $data = unserialize($data);
        }
        $newCoursSuivis = \join(",", $data);

        // dateInscription from DateTime object to string using format
        $data = $this->dateInscription;
        if(\gettype($data) == 'string') {
            $data = DateTime::createFromFormat('Y-m-d', $data);
        }
        $newEntreeService = $data->format("d-m-Y");


        // convert to string
        $newResume = 
            $this->id." ".
            $this->nom." ".
            $this->prenom." ".
            $this->adresse." ".
            $this->codePostal." ".
            $this->pays." ".
            $this->societe." ".
            $newCoursSuivis." ".
            $this->niveau." ".
            $newEntreeService;

        // return string
        return $newResume;
    }
    // méthode __toString
    public function __toString(){
        return $this->resume();
    }

    // implement interface
    public function afficheTableau(): array {
        $tableau = [
            "nom" => $this->nom,
            "prenom" => $this->prenom,
            "adresse" => $this->adresse,
            "codePostal" => $this->codePostal,
            "pays" => $this->pays,
            "societe" => $this->societe,
            "coursSuivis" => $this->coursSuivis,
            "niveau" => $this->niveau,
            "dateInscription" => $this->dateInscription
        ];
        return $tableau;
    }
    public function afficheLigne(): string {
        $string = $this->__toString();
        return $string;
    }
}
