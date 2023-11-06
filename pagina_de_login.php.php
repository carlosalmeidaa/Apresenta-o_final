<!DOCTYPE html>
<html>
<head>
  <title>Página de Login</title>
  <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<section id="landing__area" class="container__center">
        <nav class="center__row">
          <h1 class="logo">PetsPIT</h1>
          <ul class="center__row">
            <li><a href="index.html">Home</a></li>
            <li><a href="DDogsperdidos.php">Encontre seu pet</a></li>
            <li><a href="esqueci.html">Esqueci minha senha</a></li>
            <li><a href="exclusao.html">Excluir cadastro</a></li>
            <li><a href="atualizacao.html">Atualizar dados</a></li>
            <li><a href="cadastro.php">Cadastrar-se</a></li>
          </ul>
        </nav>
      </section>
    </header>
  <div class="container">
    <h2>Página de Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group">
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" required>
      </div>
      <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
      </div>
      <div class="form-group" >
        <input type="submit" value="Entrar">
      </div>
    </form>
    <div class="form-group signup-link" style="text-align: center;">
      Ainda não tem uma conta? <a href="cadastro.php">Cadastre-se</a>
    </div>
  </div>
</body>

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
  $senha = $_POST["senha"];

  $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<h2>Login bem-sucedido!</h2>";
    echo "<p>Bem-vindo, $usuario!</p>";
  } else {
    echo "<h2>Login inválido!</h2>";
    echo "<p>Usuário ou senha incorretos.</p>";
  }
}

$conn->close();
?>


</html>

