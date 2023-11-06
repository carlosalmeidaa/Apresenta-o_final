<!DOCTYPE html>
<html lang="pt-br">
 <link rel="stylesheet" type="text/css" href="login.css">
<head>
  <meta charset="UTF-8">
  <title>Perda de Animais Domésticos</title>
  <style type="text/css">
    #content {
      width: 50%;
      margin: 20px auto;
      border: 1px solid #cbcbcb;
    }
    form {
      width: 50%;
      margin: 20px auto;
    }
    form div {
      margin-top: 5px;
    }
    #img_div {
      width: 80%;
      padding: 5px;
      margin: 15px auto;
      border: 1px solid #cbcbcb;
    }
    #img_div:after {
      content: "";
      display: block;
      clear: both;
    }
    img {
      float: left;
      margin: 5px;
      width: 300px;
      height: 140px;
    }
  </style>
</head>
<body>
  <div class="sidebar-left"></div>
  <div class="sidebar-right"></div>
  <div class="decorative-element"></div>
  <header>
    <section id="landing__area" class="container__center">
      <nav class="center__row">
        <h1 class="logo">PetsPIT</h1>
        <ul class="center__row">
          <li><a href="index.html">Home</a></li>
          <li><a href="Dogsperdidos.php">Encontre seu pet</a></li>
          <li><a href="esqueci.html">Esqueci minha senha</a></li>
          <li><a href="exclusao.html">Excluir cadastro</a></li>
          <li><a href="atualizacao.html">Atualizar dados</a></li>
          <li><a href="cadastro.php">Cadastrar-se</a></li>
        </ul>
      </nav>
    </section>
  </header>
  <?php
    // Create database connection
    $db = mysqli_connect("localhost", "root", "", "image_upload");

    // Initialize message variable
    $msg = "";

    // If upload button is clicked ...
    if (isset($_POST['upload'])) {
      // Get image name
      $image = $_FILES['image']['name'];
      // Get text
      $image_text = mysqli_real_escape_string($db, $_POST['image_text']);

      // image file directory
      $target = "imgs/" . basename($image);

      $sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
      // execute query
      mysqli_query($db, $sql);

      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      } else {
        $msg = "Failed to upload image";
      }
    }
    $result = mysqli_query($db, "SELECT * FROM images");
  ?>
<main>
  <div id="content">
    <?php
      while ($row = mysqli_fetch_array($result)) {
        echo "<div id='img_div'>";
        echo "<img src='imgs/" . $row['image'] . "' >";
        echo "<p>" . $row['image_text'] . "</p>";
        echo "</div>";
      }
    ?>
    <form method="POST" action="" enctype="multipart/form-data">
      <input type="hidden" name="size" value="1000000">
      <div>
        <input type="file" name="image">
      </div>
      <br>
      <div>
      <textarea class="image_text"cols="40" rows="4" name="image_text" placeholder="Adicione aqui as informacoes sobre seu pet (Ultimo lugar visto, nome, telefone e e-mail para contato etc)"></textarea>

      </div>
      <br>
      <div>
        <button class="puclicar"type="submit" name="upload">PUBLICAR</button>
    </main>
      </div>
    </form>
  </div>
</body>
</html>
