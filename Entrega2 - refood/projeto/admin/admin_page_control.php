<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
<body class="w3-light-grey">

<?php
  session_start();

  if(!isset($_SESSION['logado']) || $_SESSION['logado'] !== true){
    header('Location: admin.php');
    exit();
  }
?>

  <!-- Top container -->
  <div class="w3-bar w3-top w3-black w3-large">
    <a href="logout.php"><span class="w3-bar-item w3-right w3-button">Logout</span></a>
  </div>
  
  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container">
      <h4>Menu</h4>
      <hr>
    </div>
    <div class="w3-bar-block">
      <a href="admin_dashboard.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i>Visão geral</a>
      <a href="admin_profile.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>Perfil</a>
      <a href="admin_page_control.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>Página inicial</a>
      <a href="admin_user_list.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Lista de utilizadores</a>
      <a href="admin_definicoes.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>Definições</a><br><br>
    </div>  
  
  </nav>
  
  
  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" style="cursor:pointer" title="close side menu" id="myOverlay">
  </div>
  
  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:300px;margin-top:43px;">
  
    <!-- Header -->
    <header class="w3-container w3-large" style="padding-top:22px">
      <h4>Página Inicial:</h4>
    </header>

    <hr class="w3-border-top">
  
    <div class="w3-row-padding w3-margin-bottom">
      
      <iframe src="http://appserver-01.alunos.di.fc.ul.pt/~asw02/projeto/pagina_inicial.php" width="100%" height="600" style="border:2px solid blue;">  
      </iframe>
    
    </div>

  </div>  

</body>
</html>
