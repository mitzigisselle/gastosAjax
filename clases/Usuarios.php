<?php
    include "Conexion.php";

    class Usuarios extends Conexion {
        public function registrarUsuario($datos) {
            $conexion = Conexion::conectar();

            if (self::validarUsuario($datos['usuario'])) {
                return 2;
            }

            $sql = "INSERT INTO t_usuarios (nombre,
                                            apellidos,
                                            correo,
                                            usuario,
                                            password) 
                    VALUES ('" . $datos['nombre'] . "' , 
                            '" . $datos['apellidos'] ."' ,
                            '" . $datos['correo'] ."' ,
                            '" . $datos['usuario'] ."' ,
                            '" . $datos['password'] . "')";
            $respuesta = mysqli_query($conexion, $sql);
            mysqli_close($conexion);
            return $respuesta;
        }

        public function loginUsuario($usuario, $password) {
            $conexion = Conexion::conectar();
            $exito = false;
            $sql = "SELECT * FROM t_usuarios 
                    WHERE usuario = '$usuario' AND password = '$password'";
            $respuesta = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($respuesta) > 0) {

                $datos = mysqli_fetch_array($respuesta);
                $_SESSION['usuario']['usuario'] = $usuario;
                $_SESSION['usuario']['id'] = $datos['id_usuario'];
                $_SESSION['usuario']['nombre'] = $datos['nombre'] . " " . $datos['apellidos'];
                $exito = true;
            }
            mysqli_close($conexion);
            return $exito;
        }

        public function validarUsuario($usuario) {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM t_usuarios WHERE usuario = '$usuario'";
            $respuesta = mysqli_query($conexion, $sql);
            $existe = false;
            if (mysqli_num_rows($respuesta) > 0) {
                $existe = true;
            }
            return $existe;
        }

    }