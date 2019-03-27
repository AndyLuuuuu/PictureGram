<?php
include('Post.php');
class PDOConnection {
    private $db_conn;

    public function __construct($db_conn_file = 'database_setting.ini') {
        $this->connectToDB($db_conn_file);
    }

    public function connectToDB($db_conn_file) {
        if (!$db_settings = parse_ini_file($db_conn_file, TRUE)) throw new exception('Unable to open ' . $db_conn_file);

        $dns = $db_settings['database']['driver'] . ':host=' . $db_settings['database']['host'] . 
        ((!empty($db_settings['database']['port'])) ? (';port=' . $db_settings['database']['port']) : '') .
        ';dbname=' . $db_settings['database']['schema'];

        $this->db_conn = new PDO($dns, $db_settings['database']['username'], $db_settings['database']['password']);
        $this->db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function closeDBConnection() {
        $this->db_conn = null;
    }

    public function registerUser($email, $password, $accountName) {
        $accountID = uniqid($more_entropy = true);
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $statement = $this->db_conn->prepare("INSERT INTO Account SET accountID = :accountID, accountName = :accountName, profilePath = '1234', email = :email, password = :password");
        $statement->bindParam(':accountID', $accountID);
        $statement->bindParam(':accountName', $accountName);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $hashed_password);
        $statement->execute();
        $statement = null;
        $this->closeDBConnection();
    }

    public function loginUser($email, $password) {
        $statement = $this->db_conn->prepare('SELECT accountID, password FROM Account WHERE email = :email');
        $statement->bindParam(':email', $email);
        $statement->execute();
        $auth_result = $statement->fetch();
        try {
            $accountID = $auth_result[0];
            echo $auth_result[0];
            $hashed_password = $auth_result[1];
            $statement = null;
            $this->closeDBConnection();
            if (password_verify($password, $hashed_password)) {
                return array($accountID, true);
            } else {
                $statement = null;
                $this->closeDBConnection();
                return false;
            }
        } catch (PDOException $e) {
            $statement = null;
            $this->closeDBConnection();
            return false;
        }
    }

    public function newPost($accountID, $postID, $postName, $postDesc, $postImageExt) {
        $date = date('Y-m-d');
        $statement = $this->db_conn->prepare('INSERT INTO Post SET accountID = :accountID, postID = :postID, postName = :postName, postDesc = :postDesc, postImageExt = :postImageExt, datePosted = :datePosted');
        $statement->bindParam(':accountID', $accountID);
        $statement->bindParam(':postID', $postID);
        $statement->bindParam(':postName', $postName);
        $statement->bindParam(':postImageExt', $postImageExt);
        $statement->bindParam(':postDesc', $postDesc);
        $statement->bindParam(':accountID', $accountID);
        $statement->bindParam(':datePosted', $date);
        if ($statement->execute()) {
            $statement = null;
            $this->closeDBConnection();
            return true;
        } else {
            $statement = null;
            $this->closeDBConnection();
            return false;
        }
    }

    public function retrievePosts($accountID) {
        $statement = $this->db_conn->prepare('SELECT * FROM Post WHERE accountID = :accountID');
        $statement->bindParam(':accountID', $accountID);
        $statement->execute();
        $postRows = $statement->fetchAll(PDO::FETCH_ASSOC);
        $posts = array();
        foreach($postRows as $postRow) {
            $post = new Post($postRow['postID'], $postRow['postName'], $postRow['postDesc'], $postRow['postImageExt'], $postRow['datePosted']);
            $posts[] = $post;
        }
        $statement = null;
        $this->closeDBConnection();
        return $posts;
    }
}
?>