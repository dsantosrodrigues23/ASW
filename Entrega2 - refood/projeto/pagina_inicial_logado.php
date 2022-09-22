<!DOCTYPE html>
<html>
<head>
<title>REFOOD-UL</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<script src="scripts.js"></script>
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

        //Se não estiver logged in vai para a pagina inicial
        if(!isset($_SESSION['logado']) || $_SESSION['logado'] !== true){
          header('Location: pagina_inicial.php');
          exit();
        }
      ?>

      <!-- Navbar (sit on top) -->
      <div class="w3-top">
        <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
          <a href="pagina_inicial_logado.php" class="w3-bar-item w3-button">REFOOD-UL</a>
          <!-- Right-sided navbar links. Hide them on small screens -->
          <div class="w3-right w3-hide-small">
            <a class="w3-bar-item"><?php echo $_SESSION['nome']?></a>
            <?php if($_SESSION['tipo'] === 'Voluntário'):?>
              <a href="perfil_voluntario.php" class="w3-bar-item w3-button">Perfil</a>
            <?php elseif($_SESSION['tipo'] === 'Instituição'):?>
              <a href="perfil_parceiro.php" class="w3-bar-item w3-button">Perfil</a>
            <?php endif;?>
            <a href="pagina_inicial_logado.php#about" class="w3-bar-item w3-button">Sobre</a>
            <a href="pagina_inicial_logado.php#contact" class="w3-bar-item w3-button">Contacto</a>
            <a href="logout.php" class="w3-bar-item w3-button">Sair</a>
          </div>
        </div>
      </div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
  <img class="w3-image" src="imgs/foto_voluntario.jpg" alt="Hamburger Catering" width="1600" height="800">
  <div class="w3-display-bottomleft w3-padding-large w3-opacity">
    <h1 class="w3-xxlarge">REFOOD-UL</h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="imgs/foto2.jpg" class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">Sobre o REFOOD-FCUL</h1><br>
      <h5 class="w3-center">Desde 2022</h5>
      <p class="w3-large">  O projeto REFOOD-FCUL foi criado por alunos da Universidade de Lisboa, no âmbito do voluntariado. 
        Surgiu através de um grupo de colegas que tinham como objetivo participar numa iniciativa de voluntariado. Hoje em dia ajuda muitas pessoas na área metropolitana de Lisboa e conta com variados restaurantes e supermercados parceiros.</p>
        <a href="sobre_nos.php"><button class="w3-btn w3-blue w3-round-xlarge w3-large" >Saber mais</button></a></p>
      </div>
  </div>
  
  <hr>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-64" id="contact">
    <h1>Contacte-nos</h1><br>
    <p>Tem dúvidas acerca do nosso projeto? Preencha o seguinte formulário e responderemos com a maior brevidade!</p>
    <p class="w3-text-blue-grey w3-large"><b>Campo Grande 016, 1749-016 Lisboa</b></p>
      <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Nome" required name="Nome Completo"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Email" required name="Endereço de email"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Escreva aqui" required name="Message"></p>
      <p><button class="w3-button w3-light-grey w3-section" type="submit">Enviar Mensagem</button></p>
    </form>
  </div>
  
<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>
