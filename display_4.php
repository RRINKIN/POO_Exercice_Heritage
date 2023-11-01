<?php 
// Load classes
require 'vendor/autoload.php';
use Poo\HeritageComposer\Manager\EnseignantManager;

$manager = new EnseignantManager();
$enseignant = $manager->read(1);
/*echo '<pre>';
var_dump($enseignant);
echo '</pre>';*/
try {
    echo $enseignant->afficheLigne();
    echo "<br>";
    $enseignantTableau = $enseignant->afficheTableau();
    foreach ($enseignantTableau as $key => $value) {
        echo $key." : ".$value;
        echo "<br>";
    }
} catch(\Exception $e) {
    echo $e->getMessage();
    echo "<br>";
}
