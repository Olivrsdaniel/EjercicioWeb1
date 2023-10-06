<?php
class Vista {
    public function mostrarDatos($producto, $precio_con_iva) {
        echo "<br>";
        echo "Producto: {$producto->getNombre()} - Precio: \${$producto->getPrecio()}";
        echo "<br>IVA: \${$precio_con_iva}";
        echo "<br>Precio + IVA: \${$producto->getPrecio()}";
    }

    public function mostrarDatos2($productos) {
        foreach ($productos as $producto) {
            echo "<br>";
    //      $precio_con_iva = calcularIVA($producto->getPrecio()); // Asumiendo que calcularIVA está disponible aquí
            echo "Producto: {$producto->getNombre()} - Precio: \${$producto->getPrecio()}";
    //      echo "<br>IVA: \${$precio_con_iva}";
    //      echo "<br>Precio + IVA: \${" . ($producto->getPrecio() + $precio_con_iva) . "}";
            echo "<hr>"; // Separador entre productos
            echo "<hr>";
        }
    }
}
?>