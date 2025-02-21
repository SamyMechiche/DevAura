<?php
class Post {
    private $id_post;
    private $title;
    private $description;
    private $content;
    private $post_picture;
    private $published_date;
    private $id_user;

    private $fav_count;

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

    //GETTERS
    public function getId_post(){
        return $this->id_post;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getContent(){
        return $this->content;
    }
    public function getPost_picture(){
        return $this->post_picture;
    }
    public function getPublished_date(){
        return $this->published_date;
    }
    public function getId_user(){
        return $this->id_user;
    }

    public function getFav_count(){
        return $this->fav_count;
    }

    //SETTERS
    public function setId_post(int $id_post){
        $this->id_post = $id_post;
    }

    public function setTitle(string $title){
        $this->title = $title;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }

    public function setContent(string $content){
        $this->content = $content;
    }

    public function setPost_picture(string $post_picture){
        $this->post_picture = $post_picture;
    }

    public function setPublished_date(string $published_date){
        $this->published_date = new DateTime( $published_date);
    }

    public function setId_user(int $id_user){
        $this->id_user = $id_user;
    }

    public function setFav_count(int $fav_count){
        $this->fav_count=$fav_count;
    }
}
