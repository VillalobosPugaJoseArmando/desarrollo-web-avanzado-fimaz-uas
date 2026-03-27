<?php

$sql = "INSERT INTO alumnos (nombre, apellido, correo)
VALUES (:nombre, :apellido, :correo)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
	'nombre' => 'Jose Alfonso',
	'apellido' => 'Aguilar',
	'correo' => 'ja.aguilar@uas.edu.mx'
]);

echo "Alumno insertado correctamente<br>";

?>