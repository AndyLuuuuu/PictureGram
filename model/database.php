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

    public function registerUser($email, $password, $accountName) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $statement = $this->db_conn->prepare("INSERT INTO Account SET accountID = '12345', accountName = :accountName, profilePath = '1234', email = :email, password = :password");
        $statement->bindParam(':accountName', $accountName);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $hashed_password);
        $statement->execute();
        return $this->db_conn->errorInfo();
    }
}
?>