<?php
    class DB{
        public static function conectar(){
            $url_pgs="pgsql: host=localhost; dbname=SGProyectos";
            $user_pgs="postgres";
            $password_pgs="123";
            $server = "localhost";
            $database = "SGProyectos";
            $username = "sa";
            $password = "123";
        try {
            $cn = new PDO("sqlsrv:Server=$server;Database=$database", $username, $password);
            $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $cn;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
        }
    }
?>