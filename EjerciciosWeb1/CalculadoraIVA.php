<?php

class CalculadoraIVA {
    const IVA_PORCENTAJE = 16;

    public function calcularIVA($precio) {
        $iva = $precio * (self::IVA_PORCENTAJE / 100);
        return $iva;
    }
}

?>
