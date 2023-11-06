<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet_care_db";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}


$id = $_POST['id'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$datanasc = $_POST['datanascimento'];
$nomePet = $_POST['nomePet'];


$sql = "UPDATE usuarios SET usuario='$usuario', senha='$senha', nome='$nome', telefone='$telefone', email='$email', data_nascimento='$datanasc', nome_cachorro='$nomePet' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro atualizado com sucesso!";
} else {
    echo "Erro na atualização do registro: " . $conn->error;
}

$conn->close();
?>