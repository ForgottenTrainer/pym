<?php

//Crea la clase para la conexion de base de datos
class conexion{
    //Lee la conexion de la base de datos
    private $servidor="localhost";
    private $usuario="root";
    private $contrasenia = "";
    private $conexion;

    public function __construct(){

        try {
            //Si todo es correcto se crea la conexion
            $this->conexion= New PDO("mysql:host=$this->servidor;dbname=pym;", $this->usuario, $this->contrasenia);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $e) {
            //throw $th;
            echo $e;
        }
        
    }

    public function ejecutar($sql){ //Insertar/delete/actualizar
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }

    public function consultar($sql){
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();

        return $sentencia->fetchAll();
    }
}

?>