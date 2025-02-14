<?php

class Subcategory {
    private $id_subcategory;
    private $subcategory_name;
    private $description;
    private $id_category;
    private $picture;

    //CONSTRUCTOR
    public function __construct(array $datas){
        $this->hydrate($datas);
    }

    //HYDRATATION
    public function hydrate(array $datas){
        foreach($datas as $key => $value){
            $method = 'set' . ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    //GUETTERS
    public function getId_subcategory(){
        return $this->id_subcategory;
    }
    public function getSubcategory_name(){
        return $this->subcategory_name;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getId_category(){
        return $this->id_category;
    }
    public function getPicture(){
        return $this->picture;
    }

    //SETTERS
    public function setId_subcategory(int $id_subcategory){
        $this->id_subcategory = $id_subcategory;
    }
    public function setSubcategory_name(string $subcategory_name){
        $this->subcategory_name = $subcategory_name;
    }
    public function setDescription(string $description){
        $this->description = $description;
    }
    public function setId_category(int $id_category){
        $this->id_category = $id_category;
    }
    public function setPicture(string $picture){
        $this->picture = $picture;
    }
}