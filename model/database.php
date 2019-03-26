<?php 
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

    function loginUser($email, $password) {
        $statement = $this->db_conn->prepare('SELECT accountID, password FROM Account WHERE email = :email');
        $statement->bindValue(':email', $email);
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
}
?>