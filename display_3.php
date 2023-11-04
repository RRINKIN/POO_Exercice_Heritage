<?php 
// Load classes
require 'vendor/autoload.php';
use Poo\HeritageComposer\Manager\EtudiantManager;

$manager = new EtudiantManager();
$etudiant = $manager->read(1);
/*echo '<pre>';
var_dump($etudiant);
echo '</pre>';*/
try {
    echo $etudiant->afficheLigne();
    echo "<br>";
    $etudiantTableau = $etudiant->afficheTableau();
    foreach ($etudiantTableau as $key => $value) {
        echo $key." : ".$value;
        echo "<br>";
    }
} catch(\Exception $e) {
    echo $e->getMessage();
    echo "<br>";
}
