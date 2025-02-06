<?php
class ModelUser extends Model {
    public function getUser(int $id){
        $user = $this->getDb()->prepare('SELECT `id`, `name`, `email`, `date_created` FROM `user` WHERE `id` = :id');
        $user->bindParam(':id', $id, PDO::PARAM_INT);
        $user->execute();

        return new User($user->fetch(PDO::FETCH_ASSOC));
    }

    public function isConnected(){
        if($_SESSION){
            header('Location: /cours/leboncoinzer');
        }
    }

    public function signingIn($name, $email, $password){
        $req = $this->getDb()->prepare('INSERT INTO `user`(`name`, `email`, `password`, `signing_date`) VALUES (:name, :email, :password, NOW())');
        $req->bindParam(':name', $name, PDO::PARAM_STR);
        $req->bindParam(':email', $email, PDO::PARAM_STR);
        $req->bindParam(':password', $password, PDO::PARAM_STR);
        $req->execute();
}
}