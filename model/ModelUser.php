<?php
class ModelUser extends Model {
    public function getUser(int $id){
        $user = $this->getDb()->prepare('SELECT `id`, `name`, `email`, `date_created` FROM `user` WHERE `id` = :id');
        $user->bindParam(':id', $id, PDO::PARAM_INT);
        $user->execute();

        return new User($user->fetch(PDO::FETCH_ASSOC));
    }
}