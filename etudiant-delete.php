<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Supprimer des étudiants</title>
</head>
<body>
    <h1>Votre étudiant a été supprimé</h1>
    <?php
    // Load classes
    require 'vendor/autoload.php';
    use Poo\HeritageComposer\Manager\EtudiantManager;

    // retrouver l'ID
    $id = $_GET['id'];
    $etudiantManager = new EtudiantManager();
    //$etudiant  est de type .... \Entity\Etudiant
    $etudiant = $etudiantManager->delete($id);
    //var_dump($etudiant);

    // retour à la liste
    echo "<a href='etudiant-list.php'>retour à la liste</a>";
    ?>
</body>
</html>
