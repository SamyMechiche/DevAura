<?php

class PostDTO {
    public Post $post;
    public string $name;
    public string $like;

    public function __construct(Post $post, string $name, $like = false){
        $this->post = $post;
        $this->name = $name;
        $this->like = $like;
    }
}