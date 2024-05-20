<?php

class Database {
    private $hostname = "localhost";
    private $database = "figushop";
    private $username = "root";
    private $password = "";
    private $charset = "utf8"; // Conjunto de caracteres

    public function conectar()
    {
        try {
            $conexion = "mysql:host=" . $this->hostname . ";dbname=" . $this->database . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false
            ];

            $pdo = new PDO($conexion, $this->username, $this->password, $options);

            return $pdo;

        } catch(PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }
    }
}

?>
