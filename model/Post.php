<?php 
class Post implements JsonSerializable {
    private $postID;
    private $postName;
    private $postDesc;
    private $postImageExt;
    private $datePosted;
    private $accountName;

    public function __construct($postID, $postName, $postDesc, $postImageExt, $datePosted, $accountName) {
        $this->postID = $postID;
        $this->postName = $postName;
        $this->postDesc = $postDesc;
        $this->postImageExt = $postImageExt;
        $this->datePosted = $datePosted;
        $this->accountName = $accountName;
    }

    public function jsonSerialize() {
        return array(
            'postID' => $this->postID,
            'postName' => $this->postName,
            'postDesc' => $this->postDesc,
            'postImageExt' => $this->postImageExt,
            'datePosted' => $this->datePosted,
            'accountName' => $this->accountName
        );
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

    public function getAccountName() {
        return $this->accountName;
    }
}
?>