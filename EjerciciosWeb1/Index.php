<?php

require_once 'Producto.php';
require_once 'CalculadoraIVA.php';
require_once 'Vista.php';
require_once 'Modelo.php';

// Obtener datos del producto desde la base de datos
$modelo = new Modelo();
$producto = $modelo->obtenerProductoPorId(1); // Suponiendo que el producto tiene ID 1
$productos = $modelo ->obtenerTodosLosProductos();
$modelo = new Modelo();
$nombre = "Nuevo Producto2";
$precio = 800.00;
if($modelo-> actualizarEstadoProducto(3)){
  echo "Producto Eliminado con exito";
}else{
    echo "Error al eliminar el producto";
}
if ($modelo->insertarProducto($nombre, $precio)) {
    echo "Producto insertado con éxito.";
} else {
    echo "Error al insertar el producto.";
}
// Crear instancia del servicio (CalculadoraIVA)
$calculadora_iva = new CalculadoraIVA();

// Calcular el IVA y mostrar los resultados
$precio_con_iva = $calculadora_iva->calcularIVA($producto->getPrecio());
$vista = new Vista();
$vista->mostrarDatos($producto, $precio_con_iva);
$vista->mostrarDatos2($productos);




?>