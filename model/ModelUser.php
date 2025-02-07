<?php
class ModelUser extends Model {
    public function getUser(int $id){
        $user = $this->getDb()->prepare('SELECT `id_user`, `name`, `email`, `password`, `signing_date`, `statut`, `id_role`, `profile_picture` FROM `user` WHERE `id` = :id');
        $user->bindParam(':id', $id, PDO::PARAM_INT);
        $user->execute();

        return new User($user->fetch(PDO::FETCH_ASSOC));
    }
}