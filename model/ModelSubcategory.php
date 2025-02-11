<?php

class ModelSubcategory extends Model{
    public function grid()
    {
        $req = $this->getDb()->query('SELECT `id_subcategory`, `subcategory_name`, `description`, `picture`, `id_category` FROM `subcategory`;');

        $arrayobj = [];

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $arrayobj[] = new Subcategory($data);
        }

        return $arrayobj;
    }
}