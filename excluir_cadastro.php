<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "pet_care_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usuario = $_POST["usuario"];

  $sql = "DELETE FROM usuarios WHERE usuario='$usuario'";

  if ($conn->query($sql) === TRUE) {
    echo "<h2>Cadastro Excluído</h2>";
    echo "<p>O cadastro do usuário $usuario foi excluído com sucesso.</p>";
  } else {
    echo "Erro ao excluir o cadastro: " . $conn->error;
  }
}

$conn->close();
?>