<?php 
class Post {
    private $postID;
    private $postName;
    private $postDesc;
    private $postImageExt;
    private $datePosted;

    public function __construct($postID, $postName, $postDesc, $postImageExt, $datePosted) {
        $this->postID = $postID;
        $this->postName = $postName;
        $this->postDesc = $postDesc;
        $this->postImageExt = $postImageExt;
        $this->datePosted = $datePosted;
    }

    public function getPostID() {
        return $this->postID;
    }

    public function getPostName() {
        return $this->postName;
    }

    public function getPostDesc() {
        return $this->postDesc;
    }

    public function getExtension() {
        return $this->postImageExt;
    }

    public function getDatePosted() {
        return $this->datePosted;
    }
}
?>