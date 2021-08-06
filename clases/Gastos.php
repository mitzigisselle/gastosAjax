<?php
    include "Conexion.php";

    class Gastos extends Conexion {
        public function agregarNuevoGasto($idUsuario, $idCategoria, $monto, $descripcion, $fecha) {
            $conexion = Conexion::conectar();

            $sql = "INSERT INTO t_gastos (id_categoria,
                                            id_usuario,
                                            monto,
                                            descripcion,
                                            fecha) 
                    VALUES ('$idCategoria',
                            '$idUsuario',
                            '$monto',
                            '$descripcion',
                            '$fecha')";
            $respuesta = mysqli_query($conexion, $sql);
            mysqli_close($conexion);

            return $respuesta;
        }
        public function obtenerDatosGasto($idGasto) {
			$conexion = Conexion::conectar();

			$sql = "SELECT id_gasto,
                            id_categoria,
                            id_usuario,
                            monto,
                            descripcion,
                            fecha 
					FROM t_gastos 
					WHERE id_gasto = '$idGasto'";
			$result = mysqli_query($conexion, $sql);
			$contacto = mysqli_fetch_array($result);

			$datos = array(
						"id_gasto" => $contacto['id_gasto'],
						"id_categoria" => $contacto['id_categoria'],
						"id_usuario" => $contacto['id_usuario'],
						"monto" => $contacto['monto'],
						"descripcion" => $contacto['descripcion'],
						"fecha" => $contacto['fecha']
							);
			return $datos;
		}

        public function actualizarGasto($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE t_gastos SET  
										id_categoria = ?,
										monto = ?,
										descripcion = ?,
										fecha = ? 
					WHERE id_gasto = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('iissi',
                                        $datos['idCategoria'],
                                        $datos['monto'],
                                        $datos['descripcion'],
                                        $datos['fecha'],
                                        $datos['idGasto']);
        $respuesta = $query->execute();
			return $respuesta;
        }
        
        public function eliminarGasto($idGasto){
            $conexion = Conexion::conectar();

            $sql = "DELETE FROM t_gastos
                            WHERE id_gasto = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i',$idGasto);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }