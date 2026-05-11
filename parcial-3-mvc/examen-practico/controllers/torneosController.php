<?php
    //Nombre: Jose Armando Villalobos Puga
    require_once("../../models/torneosModel.php");

    class torneosController{

        private $model;

    public function __construct()
    {
        $this->model = new torneosModel();
    }

    //Creamos método controlador que mandará llamar la función insert del Modelo.
    //También mandará los parámetros necesarios para guardar en la tabla "torneos".
    //Si los datos se guardan redireccionará al usuario a la pantalla de inicio de lo
        //contrario se mantendrá en la pantalla del formulario de captura de datos del torneo.
        public function saveTorneo($nombreTorneo, $organizador, $patrocinadores, $sede,
        $categoria, $premio1, $premio2, $premio3, $otroPremio, $usuario, $contrasena){
            //Recordemos que la función insert del modelo, regresa el último id generado.
            $id= $this->model->insert($nombreTorneo, $organizador, $patrocinadores, $sede,
            $categoria, $premio1, $premio2, $premio3, $otroPremio, $usuario, $contrasena);
            return ($id!=false) ? header("Location: admin.php") : header("Location: frmTorneos.
            php");

        }

        //Método que manda ejecutar la función read del modelo del Torneo.
        public function readTorneos(){
            return ($this->model->read()) ? $this->model->read() : false;
        }

        //Método para ejecutar la función readOne del modelo torneo.
        public function readOneTorneo($id){
            return ($this->model->readOne($id) != false) ? $this->model->readOne($id) : header
            ("Location: admin.php");
        }

        //Método que manda llamar la función update del modelo.
        public function updateTorneo($id, $nombreTorneo, $organizador, $patrocinadores, $sede,
        $categoria, $premio1, $premio2, $premio3, $otroPremio){
            return ($this->model->update($id, $nombreTorneo, $organizador, $patrocinadores,
            $sede, $categoria, $premio1, $premio2, $premio3, $otroPremio)) !=false ? header
            ("Location: readOneTorneo.php?id=".$id) : header("Location: readAll.php") ;
        }

        //Método que manda llamar a la función delete del modelo.
        public function delete($id){
            return ($this->model->delete($id)) ? header("Location: readAllTorneos.php"): header
            ("Location: readOneTorneo.php?id=".$id);
        }
    }

?>