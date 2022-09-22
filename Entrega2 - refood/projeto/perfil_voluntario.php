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

  if(!isset($_SESSION['logado']) || $_SESSION['logado'] !== true || $_SESSION['tipo'] === 'Instituição'){
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
      <?php echo '<div class="w3-bar-item">' . htmlspecialchars($_SESSION['nome']) . '</div>'?>
      <a href="pagina_inicial_logado.php" class="w3-bar-item w3-button">Voltar</a>
      <a href="logout.php" class="w3-bar-item w3-button">Sair</a>
    </div>
  </div>
</div>
<?php
include 'abreconexao.php';

$email = $_SESSION['email'];

//Executa as queries na base de dados
$query = mysqli_query($conn, "SELECT * FROM Participante WHERE email = '$email'");
$query2 = mysqli_query($conn, "SELECT * FROM Voluntario WHERE email = '$email'");
$query3 = mysqli_query($conn, "SELECT * FROM Disponibilidade WHERE email = '$email'");

//Vai buscar linhas às queries
$row = mysqli_fetch_assoc($query);
$row2 = mysqli_fetch_assoc($query2);
$row3 = mysqli_fetch_assoc($query3);

$distrito = $row3['distrito'];
?>

<br><br><br> 
<div class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
<h1>Os meus dados:</h1>
<p>Nome Completo: <?php echo $row['nome']?></p>
<p>Email: <?php echo $email?></p>
<p>Telémovel: <?php echo $row['telefone']?></p>
<p>Data de Nascimento: <?php echo $row2['data_nascimento']?></p>
<p>Nº de Cartão de Cidadão: <?php echo $row2['CC']?></p>
<p>Número da Carta de Condução: <?php echo $row2['carta_conducao']?></p>
<p>Morada: <?php echo $row['morada']?></p>
</div>

<div class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
<h1>A minha disponibilidade: </h1>
<!-- <div class="w3-container w3-light-grey w3-text-black w3-margin">
<a href="disponibilidade_voluntario.php" class="w3-item w3-button">Definir Desponibilidade</a>
</div> -->
<p>Localidade de voluntariado: <?php echo $row3['distrito']?></p>
<p>Dias e Horário de ajuda: 
    <table class="w3-table-all">
        <tr class="w3-blue">
          <th>Dia</th>
          <th>Hora Inicio</th>
          <th>Hora Fim</th>
        </tr>
      <?php do { ?>
        <div class="tableContent">
          <tr>
            <td><?php echo $row3["dia_semana"] ?></td>
            <td><?php echo $row3["hora_inicio"] ?></td>
            <td><?php echo $row3["hora_fim"] ?></td>
          </tr>
        </div>
      <?php } while ($row3 = mysqli_fetch_assoc($query3));?>
    </table>
</p>
</div>

<div class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
<h1>Instituições: </h1>
        <?php 
          //Executa a query na base de dados
          $query4 = mysqli_query($conn, "SELECT * FROM Disponibilidade WHERE email = '$email'");
        ?>
    
    
    <table class="w3-table-all">
        <tr class="w3-blue">
          <th>Email</th>
          <th>Nome</th>
          <th>Morada</th>
          <th>Contacto</th>
        </tr>
      <!-- Vai buscar as linhas da query4 e são declaradas variáveis para executar a query5 -->
      <?php  while ($row4 = mysqli_fetch_assoc($query4)):?>
        <?php $dia_semana = $row4['dia_semana'];?>
        <?php $hora_inicio = $row4['hora_inicio'];?>
        <?php $hora_fim = $row4['hora_fim'];?>
        <?php $query5 = mysqli_query($conn, "SELECT Participante.email, Participante.nome, Participante.morada, Participante.telefone FROM Participante, Disponibilidade WHERE Participante.email = Disponibilidade.email AND Disponibilidade.distrito = '$distrito' AND Disponibilidade.dia_semana = '$dia_semana' AND Participante.tipo = 'Instituição' AND '$hora_fim' > Disponibilidade.hora_inicio AND '$hora_inicio' < Disponibilidade.hora_fim");?>
        <!-- Vai buscar as linhas da query5 -->
        <?php  while ($row5 = mysqli_fetch_assoc($query5)):?>
        <tr>
            <td><?php echo $row5["email"] ?></td>
            <td><?php echo $row5["nome"] ?></td>
            <td><?php echo $row5["morada"] ?></td>
            <td><?php echo $row5["telefone"] ?></td>
          </tr> 
      <?php endwhile;?>
      <?php endwhile;?>
      </table>
</div>



</body>
</html> 