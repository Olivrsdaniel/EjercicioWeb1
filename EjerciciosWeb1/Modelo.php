<?php

class Modelo {
    private $conexion;

    public function __construct() {
        // Establecer la conexión con la base de datos
        $this->conexion = new mysqli("localhost", "root", "", "productos");

        // Verificar la conexión
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function obtenerTodosLosProductos() {
        $sql = "SELECT * FROM producto";
        
        // Preparar la consulta
        $stmt = $this->conexion->prepare($sql);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener el resultado
        $result = $stmt->get_result();
        
        // Inicializar un arreglo para almacenar los productos
        $productos = array();
        
        // Recorrer el resultado y agregar cada producto al arreglo
        while ($producto = $result->fetch_assoc()) {
            $productos[] = new Producto($producto['nombre'], $producto['precio']);
        }
        
        // Cerrar el statement
        $stmt->close();
        
        return $productos;
    }

    public function obtenerProductoPorId($id) {
        $sql = "SELECT * FROM producto WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $producto = $result->fetch_assoc();

        $stmt->close();

        return new Producto($producto['nombre'], $producto['precio']);
    }

    public function actualizarEstadoProducto($id) {
        $sql = "UPDATE producto SET sn_activo = 0 WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
    public function insertarProducto($nombre, $precio) {
        $sql = "INSERT INTO producto (nombre, precio, sn_activo) VALUES (?, ?, 1)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("sd", $nombre, $precio); // "s" para cadena, "d" para número decimal
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
}

?>