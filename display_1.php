<?php 
// Load classes
require 'vendor/autoload.php';
use Poo\HeritageComposer\Manager\EnseignantManager;
use Poo\HeritageComposer\Manager\EtudiantManager;

$manager = new EnseignantManager();
$enseignants = $manager->readAll();
/*echo '<pre>';
var_dump($enseignants);
echo '</pre>';*/
echo "affichage enseignant";
foreach($enseignants as $enseignant){
    try {
        echo $enseignant->resume();
        echo "<br>";
    } catch(\Exception $e) {
        echo $e->getMessage();
        echo "<br>";
    }
}

$manager = new EtudiantManager();
$etudiants = $manager->readAll();
/*echo '<pre>';
var_dump($enseignants);
echo '</pre>';*/
echo "affichage etudiant";
foreach($etudiants as $etudiant){
    try {
        echo $etudiant->resume();
        echo "<br>";
    } catch(\Exception $e) {
        echo $e->getMessage();
        echo "<br>";
    }
}
