<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Liste des étudiants</title>
</head>
<body>
    <h1>Mise à jour d'un étudiant</h1>
    <?php
    // Load classes
    require 'vendor/autoload.php';
    use Poo\HeritageComposer\Manager\EtudiantManager;

    // affichage
    if(!isset($_GET['id'])){
        throw new Exception("Hey comique il me faut un id dans l'url");
    }
    $id = $_GET['id'];
    $etudiantManager = new EtudiantManager();
    //$etudiant  est de type .... \Entity\Etudiant
    $etudiant = $etudiantManager->read($id);
    //var_dump($etudiant);

    // edit etudiant
    if(isset($_POST['submit'])){
        try{
            $etudiant->setName( $_POST['name']);
            $etudiant->setPrenom( $_POST['prenom']);
            $etudiant->setAdresse( $_POST['adresse']);
            $etudiant->setPays( $_POST['pays']);
            $etudiant->setSociete( $_POST['societe']);
            $etudiantManager->update($etudiant);
        }
        catch(\Exception $e){
            //.....
        }
    }

    // affichage des données de la DB
    echo '<form method="POST" style="width>';
        echo '<div class="form-group row">';
            echo '<label lass="col-sm-2 col-form-label" for="name">Nom</label>';
            echo '<input class="form-control" type="text" value="'.$etudiant->getName().'" name="name" id="name" required">';
            echo '<br>';
            echo '<label for="prenom">Prénom</label>';
            echo '<input class="form-control" type="text" value="'.$etudiant->getPrenom().'" name="prenom" id="prenom" required">';
            echo '<br>';
            echo '<label for="adresse">Adresse</label>';
            echo '<input class="form-control" type="text" value="'.$etudiant->getAdresse().'" name="adresse" id="adresse" required">';
            echo '<br>';
            echo '<label for="pays">Pays</label>';
            echo '<input class="form-control" type="text" value="'.$etudiant->getPays().'" name="pays" id="pays" required">';
            echo '<br>';
            echo '<label for="societe">Société</label>';
            echo '<input class="form-control" type="text" value="'.$etudiant->getSociete().'" name="societe" id="societe" required">';
        echo '</div>';
        echo '<div style="margin:10px">';
            echo '<input class="btn btn-primary" name="submit" type="submit" value="Envoyer" />';
        echo '</div>';
    echo '</form>';
    ?>
</body>
</html>
