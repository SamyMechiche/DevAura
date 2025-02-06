<?php

class PostDTO {
    public Post $post;
    public string $name;

    public function __construct(Post $post, string $name){
        $this->post = $post;
        $this->name = $name;
    }
}