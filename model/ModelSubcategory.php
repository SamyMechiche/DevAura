<?php

class ModelSubcategory extends Model{
    public function slider()
    {
        $req = $this->getDb()->query('SELECT id_subcategory, subcategory_name, description, picture, id_category FROM subcategory;');

        $arrayobj = [];

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $arrayobj[] = new Subcategory($data);
        }

        return $arrayobj;
    }

    public function getPost(){
        $req = $this->getDb()->query('SELECT `id_subcategory`, `subcategory_name`, `description`, `picture`, `id_category` FROM `subcategory` ORDER BY `id_subcategory` DESC');
        $arrayobj = [];

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $arrayobj[] = new Subcategory($data);
        }

        return $arrayobj;
    }
}