<?php
// Conexión a la base de datos
$host = 'localhost';
$user = 'root'; // Reemplaza con el usuario correcto de MySQL
$pass = ''; // Reemplaza con la contraseña del usuario
$dbname = 'emociones_db'; // Nombre de tu base de datos

$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos enviados desde el frontend
$data = json_decode(file_get_contents('php://input'), true);

// Verificar si los datos se recibieron correctamente
if (!$data) {
    echo json_encode(['success' => false, 'message' => 'No se recibieron datos']);
    exit();
}

// Procesar y guardar las respuestas en la base de datos
foreach ($data as $entry) {
    $emotion = $entry['emotion'];
    $respuestas = json_encode($entry['respuestas']); // Convertir respuestas a JSON
    
    // Suponiendo que tienes una tabla 'cuestionarios' con las columnas 'emocion' y 'respuestas'
    $stmt = $conn->prepare("INSERT INTO cuestionarios (emocion, respuestas) VALUES (?, ?)");
    $stmt->bind_param('ss', $emotion, $respuestas);
    
    if (!$stmt->execute()) {
        echo json_encode(['success' => false, 'message' => 'Error al guardar las respuestas: ' . $stmt->error]);
        exit();
    }
}

// Devolver una respuesta exitosa si todo se guarda correctamente
echo json_encode(['success' => true]);

// Cerrar la conexión a la base de datos
$conn->close();
?>
