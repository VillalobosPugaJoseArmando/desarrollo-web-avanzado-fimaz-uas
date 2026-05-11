<?php
    //Nombre: Jose Armando Villalobos Puga
    //Crear una clase para conexión a base de datos mediante PDO.
    class DataBase{
        //Atributos de la clase DataBase
        private $host = "localhost";
        private $db = "proyecto";
        private $user = "root";
        private $password = "";

        public function __construct()
        {
            //Constructor...
        }

        //Método para conexión a la base de datos.
        public function connect(){
            try {
                $PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,
                $this->password);
                return $PDO;
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }

    }
?>