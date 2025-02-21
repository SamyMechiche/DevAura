<?php
class ModelPost extends Model
{

    public function feed()
    {
        $req = $this->getDb()->query('SELECT `post`.id_post, `post`.title, `post`.description, `post`.content, `post`.id_user, `post`.published_date, `post`.post_picture, user.name, COUNT(`fav`.`id_post`) AS fav_count FROM `post` INNER JOIN user ON `post`.id_user = user.id_user LEFT JOIN `fav` ON `post`.`id_post` = `fav`.`id_post` GROUP BY `post`.id_post, `post`.title, `post`.description, `post`.content, `post`.id_user, `post`.published_date, `post`.post_picture, user.name ORDER BY `post`.id_post DESC;');

        $arrayobj = [];

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $arrayobj[] = new PostDTO(new Post($data), $data['name']);
        }

        return $arrayobj;
    }

    public function fav($id_post, $id_user){
        $req = $this->getDb()->prepare('INSERT INTO `fav`(`id_post`, `id_user`) VALUES (:id_post, :id_user)');
        $req->bindParam(':id_post', $id_post, PDO::PARAM_INT);
        $req->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $req->execute();
    }

    public function checkFav($id_post, $id_user){ // nouvelle function checkFav, on envoies $id_post, $id_user en parametre dans la methode
        $req = $this->getDb()->prepare("SELECT `id_post`, `id_user` FROM `fav` WHERE `id_post`= :id_post AND `id_user` = :id_user;"); // La super requete
        $req->bindParam(':id_post',$id_post, PDO::PARAM_INT); // Le super bindParam
        $req->bindParam(':id_user',$id_user, PDO::PARAM_INT); // Le super bindParam
        $req->execute(); // Le super execute

        $data = $req->fetch(PDO::FETCH_ASSOC); // La récuperation du resultat de la requete
        
        return ($data) ? true : false; // retourne : Si dans la table fav il y a un id_User et un id_Post = true sinon = false
    }

    public function removeFav($id_post, $id_user){
        $req = $this->getDb()->prepare('DELETE FROM `fav` WHERE `id_post`= :id_post AND `id_user` = :id_user;');
        $req->bindParam(':id_post', $id_post, PDO::PARAM_INT);
        $req->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $req->execute();
    }

    public function countFav($id_post){
        $req = $this->getDb()->prepare('SELECT COUNT(`id_post`) AS "count" FROM `fav` WHERE `id_post` = :id_post;');
        $req->bindParam(':id_post', $id_post, PDO::PARAM_INT);
        $req->execute();

        $data = $req->fetch(PDO::FETCH_ASSOC);
        
        return $data['count'];
    }


}