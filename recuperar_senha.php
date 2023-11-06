<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'pet_care_db';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Recebe o email
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Olha se a senha do banco de dados é do mesmo usuario do email
    $sql = "SELECT senha FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $senha = $row['senha'];
        echo "Sua senha é: " . $senha;
    } else {
        echo "Email não cadastrado.";
    }
}

$conn->close();
?>
