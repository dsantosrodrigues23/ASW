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

<body>

<?php
  session_start();
  
  //Se não estiver logged in, ou se estiver e for Instituição vai para a pagina inicial
  if(!isset($_SESSION['logado']) || $_SESSION['logado'] !== true || $_SESSION['tipo'] === 'Instituição'){
    header('Location: pagina_inicial.php');
    exit();
  }

  include 'abreconexao.php';
  
  //Recebe os elementos do form
  $email = $_SESSION['email'];
  $distrito = $_POST['distrito'];

  //Se Segunda estiver selecionado
  if(isset($_POST['segunda'])){
    //Recebe os elementos do form
    $dia_semana = $_POST['segunda'];
    $hora_inicio = $_POST['segundaDe'];
    $hora_fim = $_POST['segundaA'];

    $query = "INSERT INTO Disponibilidade (email, dia_semana, distrito, hora_inicio, hora_fim)
            VALUES ('$email', '$dia_semana', '$distrito', '$hora_inicio', '$hora_fim')";

    //Executa a query na base de dados
    mysqli_query($conn, $query);
  }

  //Se Segunda estiver selecionado
  if(isset($_POST['terca'])){
    //Recebe os elementos do form
    $dia_semana = $_POST['terca'];
    $hora_inicio = $_POST['tercaDe'];
    $hora_fim = $_POST['tercaA'];

    $query = "INSERT INTO Disponibilidade (email, dia_semana, distrito, hora_inicio, hora_fim)
            VALUES ('$email', '$dia_semana', '$distrito', '$hora_inicio', '$hora_fim')";

    //Executa a query na base de dados
    mysqli_query($conn, $query);
  }

  //Se Segunda estiver selecionado
  if(isset($_POST['quarta'])){
    //Recebe os elementos do form
    $dia_semana = $_POST['quarta'];
    $hora_inicio = $_POST['quartaDe'];
    $hora_fim = $_POST['quartaA'];

    $query = "INSERT INTO Disponibilidade (email, dia_semana, distrito, hora_inicio, hora_fim)
            VALUES ('$email', '$dia_semana', '$distrito', '$hora_inicio', '$hora_fim')";

    //Executa a query na base de dados
    mysqli_query($conn, $query);
  }

  //Se Segunda estiver selecionado
  if(isset($_POST['quinta'])){
    //Recebe os elementos do form
    $dia_semana = $_POST['quinta'];
    $hora_inicio = $_POST['quintaDe'];
    $hora_fim = $_POST['quintaA'];

    $query = "INSERT INTO Disponibilidade (email, dia_semana, distrito, hora_inicio, hora_fim)
            VALUES ('$email', '$dia_semana', '$distrito', '$hora_inicio', '$hora_fim')";

    //Executa a query na base de dados
    mysqli_query($conn, $query);
  }

  //Se Segunda estiver selecionado
  if(isset($_POST['sexta'])){
    //Recebe os elementos do form
    $dia_semana = $_POST['sexta'];
    $hora_inicio = $_POST['sextaDe'];
    $hora_fim = $_POST['sextaA'];

    $query = "INSERT INTO Disponibilidade (email, dia_semana, distrito, hora_inicio, hora_fim)
            VALUES ('$email', '$dia_semana', '$distrito', '$hora_inicio', '$hora_fim')";

    //Executa a query na base de dados
    mysqli_query($conn, $query);
  }

  //Se Segunda estiver selecionado
  if(isset($_POST['sabado'])){
    //Recebe os elementos do form
    $dia_semana = $_POST['sabado'];
    $hora_inicio = $_POST['sabadoDe'];
    $hora_fim = $_POST['sabadoA'];

    $query = "INSERT INTO Disponibilidade (email, dia_semana, distrito, hora_inicio, hora_fim)
            VALUES ('$email', '$dia_semana', '$distrito', '$hora_inicio', '$hora_fim')";

    //Executa a query na base de dados
    mysqli_query($conn, $query);
  }
  
?>
    <!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
      <a href="pagina_inicial.php" class="w3-bar-item w3-button">REFOOD-UL</a>
      <!-- Right-sided navbar links. Hide them on small screens -->
      <div class="w3-right w3-hide-small">
        <a class="w3-bar-item"><?php echo $_SESSION['nome']?></a>
        <a href="logout.php" class="w3-bar-item w3-button">Sair</a>
      </div>
    </div>
  </div>

<br><br><br>

<form action="disponibilidade_voluntario.php" method="post" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
    <h2 class="w3-center">A minha disponibilidade: </h2>
    <p>Selecione os dias da semana e os respetivos horários: </p>
    <div class="w3-row w3-section">
    <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-calendar"></i></div>
    <div class="w3-rest">
                <label for="distrito">Distrito:</label>
                <select name="distrito" class="">
                  <option value="Aveiro">Aveiro</option>
                  <option value="Beja">Beja</option>
                  <option value="Braga">Braga</option>
                  <option value="Bragrança">Bragrança</option>
                  <option value="Castelo Branco">Castelo Branco</option>
                  <option value="Coimbra">Coimbra</option>
                  <option value="Évora">Évora</option>
                  <option value="Faro">Faro</option>
                  <option value="Guarda">Guarda</option>
                  <option value="Leiria">Leiria</option>
                  <option value="Lisboa">Lisboa</option>
                  <option value="Portalegre">Portalegre</option>
                  <option value="Porto">Porto</option>
                  <option value="Santarém">Santarém</option>
                  <option value="Setúbal">Setúbal</option>
                  <option value="Viana do Castelo">Viana do Castelo</option>
                  <option value="Vila Real">Vila Real</option>
                  <option value="Viseu">Viseu</option>
                </select>
              <br>
              <br>
                <input class="w3-radio" type="checkbox" name="segunda" value="Segunda">
                <label>Segunda</label> 

                <label for="appt"> &nbsp | &nbsp De:</label>
                <input type="time" id="appt" name="segundaDe">

                <label for="appt"> a:</label>
                <input type="time" id="appt" name="segundaA">
              <br>
              <br>
                <input class="w3-radio" type="checkbox" name="terca" value="Terça" >
                <label>Terça</label>

                <label for="appt"> &nbsp | &nbsp De:</label>
                <input type="time" id="appt" name="tercaDe">

                <label for="appt"> a:</label>
                <input type="time" id="appt" name="tercaA">
              <br>
              <br>
                <input class="w3-radio" type="checkbox" name="quarta" value="Quarta">
                <label>Quarta</label>

                <label for="appt"> &nbsp | &nbsp De:</label>
                <input type="time" id="appt" name="quartaDe">

                <label for="appt"> a:</label>
                <input type="time" id="appt" name="quartaA">
              <br>
              <br>
                <input class="w3-radio" type="checkbox" name="quinta" value="Quinta">
                <label>Quinta</label>

                <label for="appt"> &nbsp | &nbsp De:</label>
                <input type="time" id="appt" name="quintaDe">

                <label for="appt"> a:</label>
                <input type="time" id="appt" name="quintaA">
              <br>
              <br>
                <input class="w3-radio" type="checkbox" name="sexta" value="Sexta">
                <label>Sexta</label>

                <label for="appt"> &nbsp | &nbsp De:</label>
                <input type="time" id="appt" name="sextaDe">

                <label for="appt"> a:</label>
                <input type="time" id="appt" name="sextaA">
              <br>
              <br>
                <input class="w3-radio" type="checkbox" name="sabado" value="Sábado">
                <label>Sábado</label>

                <label for="appt"> &nbsp | &nbsp De:</label>
                <input type="time" id="appt" name="sabadoDe">

                <label for="appt"> a:</label>
                <input type="time" id="appt" name="sabadoA">
              <br>
              <br>
        </div>

        <button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" href="home_voluntario.html">Registar</button>
</form>
</body>