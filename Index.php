<?php 
// Load classes
require 'vendor/autoload.php';
use Poo\HeritageComposer\Entity\Etudiant;
use Poo\HeritageComposer\Entity\Enseignant;
use Poo\HeritageComposer\Manager\EnseignantManager;

// élève
try {
    // Créer un nouvel étudiant
    $newEtudiant = new Etudiant();
    // Affecter les valeurs aux propriétés de l'étudiant
    $newEtudiant->setName("TestNom");
    $newEtudiant->setPrenom("TestPrenom");
    $newEtudiant->setAdresse("TestAddresse");
    $newEtudiant->setPostalCode("TestCodePostal");
    $newEtudiant->setPays("TestPays");
    $newEtudiant->setSociete("TestSociete");
    $newEtudiant->setCoursSuivis(["TestCoursSuivis"]);
    $newEtudiant->setNiveau("TestNiveau");
    $newDate = new DateTime();
    $newEtudiant->setDateInscription($newDate);

    // Afficher le résumé de l'étudiant
    $etudiant1 = $newEtudiant->resume();
    echo $etudiant1;
    echo "<br>";
    echo "Affichage avec __toString:";
    echo $newEtudiant;
    echo "<br>";

} catch (Exception $e) {
    echo $e->getMessage();
}

// enseignant
try {
    // Créer un nouvel enseigna,t
    $newEnseignant = new Enseignant();

    // Affecter les valeurs aux propriétés de l'étudiant
    $newEnseignant->setName("TestNom");
    $newEnseignant->setPrenom("TestPrenom");
    $newEnseignant->setAdresse("TestAddresse");
    $newEnseignant->setPostalCode("TestCodePostal");
    $newEnseignant->setPays("TestPays");
    $newEnseignant->setSociete("TestSociete");
    $newEnseignant->setCoursDonnes(["TestCoursDonnes"]);
    $newDate = new DateTime();
    $newEnseignant->setEntreeEnService($newDate);
    $newEnseignant->setAnciennete(3);

    // call object
    $enseignant1 = $newEnseignant->resume();
    echo $enseignant1;
    echo "<br>";
    echo "Affichage avec __toString:";
    echo $newEnseignant;
    echo "<br>";

    // Create manager
    $enseignantManager = new EnseignantManager();
    $enseignantManager->create($newEnseignant);

} catch (Exception $e) {
    echo $e->getMessage();
}

?>