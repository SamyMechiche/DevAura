<?php
class ModelUser extends Model {

    public function getUser(string $email){
        $user = $this->getDb()->prepare('SELECT `id_user`, `name`, `email`, `password` FROM `user` WHERE `email` = :email');
        $user->bindParam(':email', $email, PDO::PARAM_STR);
        $user->execute();

        $data = $user->fetch(PDO::FETCH_ASSOC);
        return $data ? new User($data) : null;
    }

    public function isConnected(){
        if($_SESSION){
            header('Location: /cours/leboncoinzer');
        }
    }

    public function signingIn($name, $email, $password){
        $bdd = $this->getDb();
        $req = $bdd->prepare('INSERT INTO `user`(`name`, `email`, `password`, `signing_date`, `id_role`) VALUES (:name, :email, :password, NOW(), 1)');
        $req->bindParam(':name', $name, PDO::PARAM_STR);
        $req->bindParam(':email', $email, PDO::PARAM_STR);
        $req->bindParam(':password', $password, PDO::PARAM_STR);
        $req->execute();

        $id = $bdd->lastInsertId();
        return $id;
    }

    public function checkUser(string $name, string $email){
        $req = $this->getDb()->prepare('SELECT `name`, `email` FROM `user` WHERE `name` = :name OR `email` = :email');
        $req->bindParam('name', $name, PDO::PARAM_STR);
        $req->bindParam('email', $email, PDO::PARAM_STR);
        $req->execute();

        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data ? new User($data) : null;
    }
}