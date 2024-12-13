<?php
$sensors = [
    ["id" => 1, "type" => "Movimiento", "status" => "Activo", "location" => "Sala"],
    ["id" => 2, "type" => "Humo", "status" => "Inactivo", "location" => "Cocina"]
];
echo json_encode($sensors);
?>
