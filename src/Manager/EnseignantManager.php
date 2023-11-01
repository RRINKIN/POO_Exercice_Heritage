<?php
// namespace
namespace Poo\HeritageComposer\Manager;

// Classes
class EnseignantManager extends EntityManager {

    public function create($entity){
        $stmt = $this->getConnection()->prepare("INSERT INTO enseignant (nom, prenom, adresse, codePostal, pays, societe, coursDonnes, entreeEnService, anciennete) VALUES (:nom, :prenom, :adresse, :codePostal, :pays, :societe, :coursDonnes, :entreeEnService, :anciennete)");
        $stmt->bindValue(":nom", $entity->getName());
        $stmt->bindValue(":prenom", $entity->getPrenom());
        $stmt->bindValue(":adresse", $entity->getAdresse());
        $stmt->bindValue(":codePostal", $entity->getPostalCode());
        $stmt->bindValue(":pays", $entity->getPays());
        $stmt->bindValue(":societe", $entity->getSociete());
        $serializedCoursDonnes = serialize($entity->getCoursDonnes());
        $stmt->bindValue(":coursDonnes", $serializedCoursDonnes);
        $formatedDateTime = $entity->getEntreeEnService()->format("Y-m-d");
        $stmt->bindValue(":entreeEnService", $formatedDateTime);
        $stmt->bindValue(":anciennete", $entity->getAnciennete());
        $stmt->execute();
    }

    public function readAll(){
        $stmt = $this->getConnection()->prepare("SELECT * FROM enseignant");
        $stmt->setFetchMode(\PDO::FETCH_CLASS,'Poo\HeritageComposer\Entity\Enseignant');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function read($id){
        $stmt = $this->getConnection()->prepare("SELECT * FROM enseignant WHERE id=:id");
        $stmt->bindValue(":id", $id);
        $stmt->setFetchMode(\PDO::FETCH_CLASS,'Poo\HeritageComposer\Entity\Enseignant');
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($entity){
        $stmt = $this->getConnection()->prepare("UPDATE enseignant SET nom=:nom, prenom=:prenom, adresse=:adresse, codePostal=:codePostal, pays=:pays, societe=:societe, coursDonnes=:coursDonnes, entreeEnService= :entreeEnService, anciennete= :anciennete) WHERE id=:id");
        $stmt->bindValue(":id", $entity->getId());
        $stmt->bindValue(":nom", $entity->getName());
        $stmt->bindValue(":prenom", $entity->getPrenom());
        $stmt->bindValue(":adresse", $entity->getAdresse());
        $stmt->bindValue(":codePostal", $entity->getPostalCode());
        $stmt->bindValue(":pays", $entity->getPays());
        $stmt->bindValue(":societe", $entity->getSociete());
        $serializedCoursDonnes = serialize($entity->getCoursDonnes());
        $stmt->bindValue(":coursDonnes", $serializedCoursDonnes);
        $formatedDateTime = $entity->getEntreeEnService()->format("Y-m-d");
        $stmt->bindValue(":entreeEnService", $formatedDateTime);
        $stmt->bindValue(":anciennete", $entity->getAnciennete());
        $stmt->execute();
    }

    public function delete($id){
        $stmt = $this->getConnection()->prepare("DELETE FROM enseignant  WHERE id=:id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }
}