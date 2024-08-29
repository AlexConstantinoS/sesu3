<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_results";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si los valores existen en $_POST para las 26 preguntas
$pregunta1 = isset($_POST['question1']) ? $_POST['question1'] : 'No respondido';
$pregunta2 = isset($_POST['question2']) ? $_POST['question2'] : 'No respondido';
$pregunta3 = isset($_POST['question3']) ? $_POST['question3'] : 'No respondido';
$pregunta4 = isset($_POST['question4']) ? $_POST['question4'] : 'No respondido';
$pregunta5 = isset($_POST['question5']) ? $_POST['question5'] : 'No respondido';
$pregunta6 = isset($_POST['question6']) ? $_POST['question6'] : 'No respondido';
$pregunta7 = isset($_POST['question7']) ? $_POST['question7'] : 'No respondido';
$pregunta8 = isset($_POST['question8']) ? $_POST['question8'] : 'No respondido';
$pregunta9 = isset($_POST['question9']) ? $_POST['question9'] : 'No respondido';
$pregunta10 = isset($_POST['question10']) ? $_POST['question10'] : 'No respondido';
$pregunta11 = isset($_POST['question11']) ? $_POST['question11'] : 'No respondido';
$pregunta12 = isset($_POST['question12']) ? $_POST['question12'] : 'No respondido';
$pregunta13 = isset($_POST['question13']) ? $_POST['question13'] : 'No respondido';
$pregunta14 = isset($_POST['question14']) ? $_POST['question14'] : 'No respondido';
$pregunta15 = isset($_POST['question15']) ? $_POST['question15'] : 'No respondido';
$pregunta16 = isset($_POST['question16']) ? $_POST['question16'] : 'No respondido';
$pregunta17 = isset($_POST['question17']) ? $_POST['question17'] : 'No respondido';
$pregunta18 = isset($_POST['question18']) ? $_POST['question18'] : 'No respondido';
$pregunta19 = isset($_POST['question19']) ? $_POST['question19'] : 'No respondido';
$pregunta20 = isset($_POST['question20']) ? $_POST['question20'] : 'No respondido';
$pregunta21 = isset($_POST['question21']) ? $_POST['question21'] : 'No respondido';
$pregunta22 = isset($_POST['question22']) ? $_POST['question22'] : 'No respondido';
$pregunta23 = isset($_POST['question23']) ? $_POST['question23'] : 'No respondido';
$pregunta24 = isset($_POST['question24']) ? $_POST['question24'] : 'No respondido';
$pregunta25 = isset($_POST['question25']) ? $_POST['question25'] : 'No respondido';
$pregunta26 = isset($_POST['question26']) ? $_POST['question26'] : 'No respondido';

// Insertar los datos en la base de datos
$sql = "INSERT INTO resultados (
    pregunta1, pregunta2, pregunta3, pregunta4, pregunta5, pregunta6,
    pregunta7, pregunta8, pregunta9, pregunta10, pregunta11, pregunta12,
    pregunta13, pregunta14, pregunta15, pregunta16, pregunta17, pregunta18,
    pregunta19, pregunta20, pregunta21, pregunta22, pregunta23, pregunta24,
    pregunta25, pregunta26
) VALUES (
    '$pregunta1', '$pregunta2', '$pregunta3', '$pregunta4', '$pregunta5', '$pregunta6',
    '$pregunta7', '$pregunta8', '$pregunta9', '$pregunta10', '$pregunta11', '$pregunta12',
    '$pregunta13', '$pregunta14', '$pregunta15', '$pregunta16', '$pregunta17', '$pregunta18',
    '$pregunta19', '$pregunta20', '$pregunta21', '$pregunta22', '$pregunta23', '$pregunta24',
    '$pregunta25', '$pregunta26'
)";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Resultados guardados correctamente.'); window.location.href = 'ind.html';</script>";
} else {
    echo "<script>alert('Error: " . $conn->error . "'); window.location.href = 'pagina_error.php';</script>";
}

// Cerrar la conexión
$conn->close();
?>
