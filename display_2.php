<?php 
// Load classes
require 'vendor/autoload.php';
use Poo\HeritageComposer\Manager\EnseignantManager;
use Poo\HeritageComposer\Manager\EtudiantManager;

$manager = new EnseignantManager();
$enseignant = $manager->read(1);
/*echo '<pre>';
var_dump($enseignant);
echo '</pre>';*/
try {
    echo "affichage enseignant :";
    echo $enseignant;
    echo "<br>";
} catch(\Exception $e) {
    echo $e->getMessage();
    echo "<br>";
}

$manager = new EtudiantManager();
$etudiant = $manager->read(1);
/*echo '<pre>';
var_dump($etudiant);
echo '</pre>';*/
try {
    echo "affichage etudiant :";
    echo $etudiant;
    echo "<br>";
} catch(\Exception $e) {
    echo $e->getMessage();
    echo "<br>";
}