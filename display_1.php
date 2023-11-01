<?php 
// Load classes
require 'vendor/autoload.php';
use Poo\HeritageComposer\Manager\EnseignantManager;

$manager = new EnseignantManager();
$enseignants = $manager->readAll();
/*echo '<pre>';
var_dump($enseignants);
echo '</pre>';*/
foreach($enseignants as $enseignant){
    try {
        echo $enseignant->resume();
        echo "<br>";
    } catch(\Exception $e) {
        echo $e->getMessage();
        echo "<br>";
    }
}
