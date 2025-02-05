<?php

// -------------------CONNEXION A LA BDD------------------- //

abstract class Model {
    private static $db;
    private static function setDB(){
        try {
            self::$db = new PDO('mysql:host=localhost;dbname=devaura', 'root', '');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    protected function getDb(){
        if (self::$db == null) {
            self::setDb();
        }
        return self::$db;
    }
}