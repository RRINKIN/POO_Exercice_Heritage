<?php
// namespace
namespace Poo\HeritageComposer\Entity;
// classe
abstract class Personne{
    // Attributes
    protected $id;
    protected $nom;
    protected $prenom;
    protected $adresse;
    protected $codePostal;
    protected $pays;
    protected $societe;

    // Constructor
    public function __construct(){
    }

    // Setters & Getters
    // ID
    public function getId(){
        return $this->id;
    }
    // nom
    public function getName(){
        return $this->nom;
    }
    public function setName($namePersonne){
        $this->nom = $namePersonne;
    }
    // prenom
    public function getPrenom(){
        return $this->prenom;
    }
    public function setPrenom($prenomPersonne){
        $this->prenom = $prenomPersonne;
    }
    // adresse
    public function getAdresse(){
        return $this->adresse;
    }
    public function setAdresse($adressePersonne){
        $this->adresse = $adressePersonne;
    }
    // code postal
    public function getPostalCode(){
        return $this->codePostal;
    }
    public function setPostalCode($codePostalPersonne){
        $this->codePostal = $codePostalPersonne;
    }
    // Pays
    public function getPays(){
        return $this->pays;
    }
    public function setPays($paysPersonne){
        $this->pays = $paysPersonne;
    }
    // société
    public function getSociete(){
        return $this->societe;
    }
    public function setSociete($societePersonne){
        $this->societe = $societePersonne;
    }
    // méthode abstaite retournant les informations de l'objet
    abstract public function resume();
}
?>