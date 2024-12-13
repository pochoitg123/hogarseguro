<?php
$cameras = [
    ["id" => 1, "status" => "En vivo", "location" => "Entrada Principal"],
    ["id" => 2, "status" => "Fuera de servicio", "location" => "Cochera"]
];
echo json_encode($cameras);
?>
