<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Liste des étudiants</title>
</head>
<body>
    <h1>Liste des étudiants</h1>
    <?php
    // Load classes
    require 'vendor/autoload.php';
    use Poo\HeritageComposer\Manager\EtudiantManager;
    
    // affichage
    $etudiantManager = new EtudiantManager();
    $etudiants = $etudiantManager->readAll();
    // echo "<pre>";
    // var_dump($etudiants);
    // echo "</pre>";
        echo '<div>';
        echo '<span><a href="etudiant-create.php">Ajouter un étudiant</a></span>';
        echo '</div>';
        echo "<table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>Nom</th>
                        <th scope='col'>prénom</th>
                        <th scope='col'>Adresse</th>
                        <th scope='col'>Pays</th>
                        <th scope='col'>Société</th>
                        <th scope='col'>Edit</th>
                        <th scope='col'>Delete</th>
                    </tr>
                </thead>
                <tbody>";
        foreach ($etudiants as $etudiant) {
                  echo "<tr>";
                    echo "<td scope='row'>".$etudiant->getName()."</td>";
                    echo "<td scope='row'>".$etudiant->getPrenom()."</td>";
                    echo "<td scope='row'>".$etudiant->getAdresse()."</td>";
                    echo "<td scope='row'>".$etudiant->getPays()."</td>";
                    echo "<td scope='row'>".$etudiant->getSociete()."</td>";
                    echo "<td scope='row'><a href='etudiant-edit.php?id=".$etudiant->getId()."'>Edit</a></td>";
                    echo "<td scope='row'><a href='etudiant-delete.php?id=".$etudiant->getId()."'>Delete</a></td>";
                  echo "</tr>";
        }
        echo "</tbody>
        </table>"; 
    ?>
</body>
</html>

