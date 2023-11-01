<?php
// namespace
namespace Poo\HeritageComposer\Entity;
use DateTime;
use Exception;


// classes
class Enseignant extends Personne implements Affichable {

    // Attributes
    private $coursDonnes = [];
    private $entreeEnService;
    private $anciennete;

    // getters & setters
    public function getCoursDonnes(){
        return $this->coursDonnes;
    }
    public function setCoursDonnes(array $newCoursDonnes){
        $this->coursDonnes = $newCoursDonnes;
    }
    public function getEntreeEnService(){
        return $this->entreeEnService;
    }
    public function setEntreeEnService(DateTime $newEntreeEnService){
        $this->entreeEnService = $newEntreeEnService;
    }
    public function setAnciennete(int $newAnciennete){
        $this->anciennete = $newAnciennete;
    }
    public function getAnciennete(){
        return $this->anciennete;
    }

    // Methodes
    public function resume(){

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
        if (empty($this->coursDonnes)) {
            array_push($listOfErrors, "Pas de cours donnés");
        } 
        if (empty($this->entreeEnService)) {
            array_push($listOfErrors, "Pas de date d'entrée en service");
        } 
        if (empty($this->anciennete)) {
            array_push($listOfErrors, "Pas de date d'ancienneté");
        };
        
        // exception in case of any attribute is missing
        if (!empty($listOfErrors)){
            var_dump($listOfErrors);
            throw new Exception("C'est la merde");
        }

        // coursDonnes from array to string using join
        $data = $this->coursDonnes;
        if( \gettype($data) == 'string') {
            $data = unserialize($data);
        }
        $newCoursDonnes = \join(",", $data);

        // entreeService from DateTime object to string using format
        $data = $this->entreeEnService;
        if( \gettype($data) == 'string') {
            $data = DateTime::createFromFormat('Y-m-d', $data);
        }
        $newEntreeService = $data->format("d-m-Y");

        $newResume = 
            $this->id." ".
            $this->nom." ".
            $this->prenom." ".
            $this->adresse." ".
            $this->codePostal." ".
            $this->pays." ".
            $this->societe." ".
            $newCoursDonnes." ".
            $newEntreeService." ".
            $this->anciennete;
         
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
            "coursDonnes" => $this->coursDonnes,
            "anciennete" => $this->anciennete,
            "entreeEnService" => $this->entreeEnService
        ];
        return $tableau;
    }
    public function afficheLigne(): string {
        $string = $this->__toString();
        return $string;
    }
}