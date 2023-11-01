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
    echo $enseignant;
    echo "<br>";
} catch(\Exception $e) {
    echo $e->getMessage();
    echo "<br>";
}
