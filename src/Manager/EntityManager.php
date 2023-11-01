<?php
// namespace
namespace Poo\HeritageComposer\Manager;

// Classes
abstract class EntityManager {
    // attribut static de connexion à la base de donnée pour PDO
    protected $connection = null;
    static $DSN = "mysql:host=localhost;dbname=Ex4heritage,root,root";
    static function getDSN(){
        return self::$DSN;
    }

    // CRUD
    abstract function create($entity);
    abstract function readAll();
    abstract function read($id);
    abstract function update($entity);
    abstract function delete($id);

    // Connection to DB
    public function getConnection(){
        if(empty($this->connection) ){
            $dsn = self::$DSN;
            $connecParam = explode(",", $dsn);
            $this->connection = new \PDO($connecParam[0],$connecParam[1], $connecParam[2]);
        }
        return $this->connection;
    }
}