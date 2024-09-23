<?php
// save_responses.php

// Configura tu conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambia esto si usas un usuario diferente
$password = ""; // Cambia esto si tienes una contraseña
$dbname = "emociones_db";

// Crea conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recoge los datos enviados desde el cliente
$data = json_decode(file_get_contents("php://input"), true);
$emotion = $data['emotion'];
$responses = json_encode($data['responses']);

// Prepara y ejecuta la consulta
$stmt = $conn->prepare("INSERT INTO responses (emotion, responses) VALUES (?, ?)");
$stmt->bind_param("ss", $emotion, $responses);

if ($stmt->execute()) {
    echo "Respuestas guardadas";
} else {
    echo "Error: " . $stmt->error;
}

// Cierra la conexión
$stmt->close();
$conn->close();
?>
