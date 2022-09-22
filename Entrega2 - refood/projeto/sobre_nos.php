<!--FALTA A FOTOGRAFIA -->
<!DOCTYPE html>
<html lang="pt" >
<head>
<title>REFOOD-UL</title>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        html{
          scroll-behavior: smooth;
        }
        body {font-family: "Times New Roman", Georgia, Serif;}
        h1, h2, h3, h4, h5, h6 {
          font-family: "Playfair Display";
          letter-spacing: 5px;
        }
    </style>
    </head>
<body>

<?php
  session_start();

?>

<!-- Navbar (sit on top) -->
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
        <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] === true):?>
          <a href="pagina_inicial_logado.php" class="w3-bar-item w3-button">REFOOD-UL</a>
        <?php else:?>
          <a href="pagina_inicial.php" class="w3-bar-item w3-button">REFOOD-UL</a>
          <?php endif?>
          <!-- Right-sided navbar links. Hide them on small screens -->
          <div class="w3-right w3-hide-small">
          <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] === true):?>
            <?php echo '<div class="w3-bar-item">' . htmlspecialchars($_SESSION['nome']) . '</div>'?>
            <a href="pagina_inicial_logado.php" class="w3-bar-item w3-button">Voltar</a>
            <a href="logout.php" class="w3-bar-item w3-button">Sair</a>
          <?php else:?>
            <a href="pagina_inicial.php" class="w3-bar-item w3-button">Voltar</a>
          <?php endif?>
          </div>
        </div>
      </div>
<!-- About us -->

<div class="w3-row w3-padding-64" id="sobrenos">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
        <img src="imgs/fcul-foto.jpg" class="w3-round w3-image w3-opacity-min" alt="Foto da fcul" width="700" height="850">
    </div>

    <div class="w3-col m6 w3-padding-large">
        <br>
        <h1 class="w3-center">Quem somos?</h1>
        <p class="w3-large"> Somos um grupo de alunos da Faculdade de Ciências da Universidade de Lisboa que frequenta o curso de Licenciatura em Tecnologias de Informação.
            Estamos a realizar este projeto no âmbito da disciplina de Aplicações e serviços na Web.
            O nosso grupo é o 02 e fazem parte os seguintes elementos:
            <ul>
                <li>Daniela Rodrigues, nº54961</li>
                <li>Mariana Valente, nº55945</li>
                <li>Nuno Infante, nº55411</li>
                <li>Pedro Costa, nº54954</li>
            </ul>
        </p>
    </div>
</div>

</body>

</html>