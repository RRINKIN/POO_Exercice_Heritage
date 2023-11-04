<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Liste des étudiants</title>
</head>
<body>
    <h1>Ajout d'un étudiant</h1>
    <?php
    // Load classes
    require 'vendor/autoload.php';

use Poo\HeritageComposer\Entity\Etudiant;
use Poo\HeritageComposer\Manager\EtudiantManager;
    

    // instanciation d'un étudiant
    $etudiantManager = new EtudiantManager();
    //$etudiant  est de type .... \Entity\Etudiant
    $etudiant = new Etudiant;
    //var_dump($etudiant);

    // edit etudiant
    if(isset($_POST['submit'])){
        try{
            $etudiant->setName($_POST['name']);
            $etudiant->setPrenom($_POST['prenom']);
            $etudiant->setAdresse($_POST['adresse']);
            $etudiant->setPostalCode($_POST['codePostal']);
            $etudiant->setPays($_POST['pays']);
            $etudiant->setSociete($_POST['societe']);
            $arrayEtudiant = [$_POST['coursSuivis']]; 
            $etudiant->setCoursSuivis($arrayEtudiant);
            // creating dateTime format based on string as requested by Entity/Etudiant
            $etudiantDateTimeExplode = explode('-',$_POST['dateInscription']);
            $etudiantDateTimeCreation = new DateTime();
            $etudiantDateTimeCreation = $etudiantDateTimeCreation->setdate($etudiantDateTimeExplode[0], $etudiantDateTimeExplode[1], $etudiantDateTimeExplode[2]);
            $etudiant->setDateInscription($etudiantDateTimeCreation);
            $etudiant->setNiveau($_POST['niveau']);
            $etudiantManager->create($etudiant);
        }
        catch(\Exception $e){
            //.....
        }
    }

    // affichage des données de la DB
    echo '<form method="POST" style="width:50%">';
        echo '<div class="form-group row">';
            echo '<label for="name">Nom</label>';
            echo '<input class="form-control" type="text" value="" name="name" id="name" required">';
            echo '<br>';
            echo '<label for="prenom">Prénom</label>';
            echo '<input class="form-control" type="text" value="" name="prenom" id="prenom" required">';
            echo '<br>';
            echo '<label for="adresse">Adresse</label>';
            echo '<input class="form-control" type="text" value="" name="adresse" id="adresse" required">';
            echo '<br>';
            echo '<label for="codePostal">Code Postal</label>';
            echo '<input class="form-control" type="text" value="" name="codePostal" id="codePostal" required">';
            echo '<br>';
            echo '<label for="pays">Pays</label>';
            echo '<input class="form-control" type="text" value="" name="pays" id="pays" required">';
            echo '<br>';
            echo '<label for="societe">Société</label>';
            echo '<input class="form-control" type="text" value="" name="societe" id="societe" required">';
            echo '<br>';
            echo '<label for="coursSuivis">Cours suivis</label>';
            echo '<input class="form-control" type="text" value="" name="coursSuivis" id="coursSuivis" required">';
            echo '<br>';
            echo '<label for="dateInscription">Date inscription</label>';
            echo '<input class="form-control" type="date" value="" name="dateInscription" id="dateInscription" required">';
            echo '<br>';
            echo '<label for="niveau">Niveau</label>';
            echo '<input class="form-control" type="text" value="" name="niveau" id="niveau" required">';
            echo '<br>';
        echo '</div>';
        echo '<div style="margin:10px">';
            echo '<input class="btn btn-primary" name="submit"" type="submit" value="Créer" />';
        echo '</div>';
    echo '</form>';
    ?>
</body>
</html>
