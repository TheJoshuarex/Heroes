<?php
// =======================================
// CONEXIÓN A LA BASE DE DATOS
// =======================================
$mysqli = new mysqli("localhost", "root", "", "escaneos_db");

if ($mysqli->connect_errno) {
    echo "Error BD";
    exit;
}

// =======================================
// RECIBIR DATOS
// =======================================
$valor = $_POST['valor'] ?? '';
$tipo  = $_POST['tipo'] ?? '';

if ($valor === '' || $tipo === '') {
    echo "Faltan datos";
    exit;
}

// =======================================
// GUARDAR REGISTRO
// =======================================
$stmt = $mysqli->prepare("INSERT INTO escaneos (tipo, valor) VALUES (?, ?)");
$stmt->bind_param("ss", $tipo, $valor);

if ($stmt->execute()) {
    echo "OK";    // <- ESTO es lo que tu JS mostrará
} else {
    echo "Error";
}
