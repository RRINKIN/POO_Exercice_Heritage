<?php 
// Load classes
require 'vendor/autoload.php';
use Poo\HeritageComposer\Entity\Etudiant;

// élève
try {
    $newEtudiant = new Etudiant();
    $newEtudiant->setName("Rinkin");
    $newEtudiant->setPrenom("Raphael");
    var_dump($newEtudiant);
    $etudiant1 = $newEtudiant->resume();
} catch (Exception $e) {
    echo $e->getMessage();
}

?>