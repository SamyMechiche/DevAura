<?php
class ModelPost extends Model
{

    public function feed()
    {
        $req = $this->getDb()->query('SELECT `post`.id_post, `post`.title, `post`.description,  `post`.content,  `post`.id_user, `post`.published_date,  `post`.post_picture,  user.name FROM `post` INNER JOIN user ON `post`.id_user = user.id_user ORDER BY `post`.`id_post` DESC;');

        $arrayobj = [];

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $arrayobj[] = new PostDTO(new Post($data), $data['name']);
        }

        return $arrayobj;
    }
}