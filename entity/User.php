<?php

class User {
    private $id;
    private $name;
    private $email;
    private $password;
    private $signing_date;
    private $statut;
    private $id_role;
    private $profile_picture;


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

        //GETTERS
        public function getId(){
            return $this->id;
        }
    
        public function getName(){
            return $this->name;
        }
    
        public function getEmail(){
            return $this->email;
        }
    
        public function getPassword(){
            return $this->password;
        }
    
        public function getSigning_date(){
            return $this->signing_date;
        }

        public function getStatut(){
            return $this->statut;
        }

        public function getRole(){
            return $this->id_role;
        }
    
        //SETTERS
        public function setId(int $id){
            $this->id = $id;
        }
    
        public function setName(string $name){
            $this->name = $name;
        }
    
        public function setEmail(string $email){
            $this->email = $email;
        }
    
        public function setPassword(string $password){
            $this->password = $password;
        }
    
        public function setSigning_date(string $date){
            $this->signing_date = new DateTime($date);
        }

        public function setStatut(){
            return $this->statut;
        }

        public function setRole(){
            return $this->id_role;
        }
    
}