<?php

class FavDTO {
    public $id_post;
    public $id_user;

    public function __construct(array $datas){
        $this->hydrate($datas);
    }

    public function hydrate(array $datas) {
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    public function getId_user(){
        return $this->id_user;
    }
    public function getId_post(){
        return $this->id_post;
    }
 

    public function setId_user($id_user){
        $this->id_user = $id_user;
    }
    public function setId_post($id_post){
        $this->id_post = $id_post;
    }

}