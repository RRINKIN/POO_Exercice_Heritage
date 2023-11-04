<?php
// namespace
namespace Poo\HeritageComposer\Manager;

// Classes
class EtudiantManager extends EntityManager {

    public function create($entity){
        $stmt = $this->getConnection()->prepare("INSERT INTO etudiant (nom, prenom, adresse, codePostal, pays, societe, coursSuivis, dateInscription, niveau) VALUES (:nom, :prenom, :adresse, :codePostal, :pays, :societe, :coursSuivis, :dateInscription, :niveau)");
        $stmt->bindValue(":nom", $entity->getName());
        $stmt->bindValue(":prenom", $entity->getPrenom());
        $stmt->bindValue(":adresse", $entity->getAdresse());
        $stmt->bindValue(":codePostal", $entity->getPostalCode());
        $stmt->bindValue(":pays", $entity->getPays());
        $stmt->bindValue(":societe", $entity->getSociete());
        // formatage de l'array en string via serialize
        $serializedCoursDonnes = serialize($entity->getCoursSuivis());
        $stmt->bindValue(":coursSuivis", $serializedCoursDonnes);
        // formatage des dates en string via format
        $formatedDateTime = $entity->getDateInscription()->format("Y-m-d");
        $stmt->bindValue(":dateInscription", $formatedDateTime);
        $stmt->bindValue(":niveau", $entity->getNiveau());
        $stmt->execute();
    }

    public function readAll(){
        $stmt = $this->getConnection()->prepare("SELECT * FROM etudiant");
        $stmt->setFetchMode(\PDO::FETCH_CLASS,'Poo\HeritageComposer\Entity\Etudiant');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function read($id){
        $stmt = $this->getConnection()->prepare("SELECT * FROM etudiant WHERE id=:id");
        $stmt->bindValue(":id", $id);
        $stmt->setFetchMode(\PDO::FETCH_CLASS,'Poo\HeritageComposer\Entity\Etudiant');
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($entity){
        $stmt = $this->getConnection()->prepare("UPDATE etudiant SET nom=:nom, prenom=:prenom, adresse=:adresse, codePostal=:codePostal, pays=:pays, societe=:societe, coursSuivis=:coursSuivis, dateInscription= :dateInscription, niveau= :niveau) WHERE id=:id");
        $stmt->bindValue(":id", $entity->getId());
        $stmt->bindValue(":nom", $entity->getName());
        $stmt->bindValue(":prenom", $entity->getPrenom());
        $stmt->bindValue(":adresse", $entity->getAdresse());
        $stmt->bindValue(":codePostal", $entity->getPostalCode());
        $stmt->bindValue(":pays", $entity->getPays());
        $stmt->bindValue(":societe", $entity->getSociete());
        $serializedCoursDonnes = serialize($entity->getCoursSuivis());
        $stmt->bindValue(":coursSuivis", $serializedCoursDonnes);
        $stmt->bindValue(":dateInscription", $entity->getDateInscription());
        $stmt->bindValue(":niveau", $entity->getNiveau());
        $stmt->execute();
    }

    public function delete($id){
        $stmt = $this->getConnection()->prepare("DELETE FROM etudiant  WHERE id=:id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }
}