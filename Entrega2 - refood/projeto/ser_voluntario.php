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

    #erro {
        color: red;
    }
    </style>
    
</head>
<body>


<?php

session_start();

if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
    header("Location: pagina_inicial_logado.php");
    exit();
}

$valid = true;

//Quando o botão 'Seguinte' for carregado
if (isset($_POST['submit'])){
    //Verifica se o nome está vazio
    if (!empty($_POST['nome'])){
        $nome = $_POST['nome'];
    } else {
        $valid = false;
        $erro_nome = 'Por favor insira o seu nome';
    }
    
    //Verifica se o email está vazio
    if (!empty($_POST['email'])){
        //Verifica se o email é valido
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $valid = false;
            $erro_email2 = 'Formato do email incorreto';
        } else {
            $email = $_POST['email'];
        }
    } else {
        $valid = false;
        $erro_email = 'Por favor insira o  seu email';
    }

    //Verifica se o número de telefone está vazio
    if (!empty($_POST['phone'])){
        //Se o número de telémovel tiver 9 digitos
        if (strlen($_POST['phone']) === 9){
            $phone = $_POST['phone'];
        } else {
            $valid = false;
            $erro_phone2 = 'Por favor insira um número válido';
        }
    } else {
        $valid = false;
        $erro_phone = 'Por favor insira o seu número de telefone';
    }
    
    //Verifica se a password está vazia
    if (!empty($_POST['passwd'])){
        $password = $_POST['passwd'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $valid = false;
        $erro_passwd = 'Por favor insira uma palavra-passe';
    }
    
    //Verifica se a morada está vazio
    if (!empty($_POST['morada'])){
        $morada = $_POST['morada'];
    } else {
        $valid = false;
        $erro_morada = 'Por favor insira a sua morada';
    }
    
    //Verifica se o cartão de cidadão está vazio
    if (!empty($_POST['cartao_cidadao'])){
        $cidadao = $_POST['cartao_cidadao'];
    } else {
        $valid = false;
        $erro_cidadao= 'Por favor insira o número de identificação civil';
    }
    
    //Verifica se a carta de condução está vazia
    if (!empty($_POST['carta_conducao'])){
        $conducao = $_POST['carta_conducao'];
    } else {
        $valid = false;
        $erro_conducao= 'Por favor insira o número da carta de condução';
    }
    
    $rawnascimento = $_POST['nascimento'];
    $nascimento = date('Y-m-d', strtotime($rawnascimento));
    $data_inicio = date("Y/m/d");
    $genero = $_POST['gender'];
    
    //Se o form estiver válido insere as informações na base de dados
    if ($valid) {
        include "abreconexao.php";
        
        $query = "INSERT INTO Participante (email, nome, morada, telefone, passwd, tipo) 
              VALUES ('$email', '$nome', '$morada', '$phone', '$hash', 'Voluntário')";
    
        $query1 = "INSERT INTO Voluntario (email, carta_conducao, CC, data_inicio, data_nascimento, genero, pontuacao) 
                VALUES ('$email', '$conducao', '$cidadao', '$data_inicio', '$nascimento', '$genero', '')";
    
        //Executa as queries na base de dados
        mysqli_query($conn, $query);
        mysqli_query($conn, $query1);
    
        $_SESSION['logado'] = true;
        $_SESSION['nome'] = $nome;
        $_SESSION['tipo'] = 'Voluntário';
        $_SESSION['email'] = $email;

        header("Location: disponibilidade_voluntario.php");
        mysqli_close($conn);
    }
}

?>


<!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
      <a href="pagina_inicial.php" class="w3-bar-item w3-button">REFOOD-UL</a>
      <!-- Right-sided navbar links. Hide them on small screens -->
      <div class="w3-right w3-hide-small">
      <a href="pagina_inicial.php" class="w3-bar-item w3-button">Voltar</a>
      </div>
    </div>
  </div>

<br><br><br> 
    <form action="ser_voluntario.php" method="post" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
    <h2 class="w3-center">Ser Voluntário</h2>
    
    <div class="w3-row w3-section">
    <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
        <div class="w3-rest">
            <div id='erro'>    
                <?php
                    //Se a variável $erro_nome for declarada
                    if(isset($erro_nome)){
                        echo $erro_nome;
                    }
                ?>
            </div>  
        <input class="w3-input w3-border" name="nome" type="text" placeholder="Nome Completo">
        </div>
    </div>



    <div class="w3-row w3-section">
    <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
        <div class="w3-rest">
        <div id='erro'>    
                <?php 
                    //Se as variáveis $erro_email ou $erro_email2 for declarada
                    if(isset($erro_email)){
                        echo $erro_email;
                    } elseif (isset($erro_email2)){
                        echo $erro_email2;
                    }
                ?>
            </div>
        <input class="w3-input w3-border" name="email" type="text" placeholder="Email">
        </div>
    </div>

    <div class="w3-row w3-section">
    <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div>
        <div class="w3-rest">
        <div id='erro'>    
                    <?php
                        //Se as variáveis $erro_phone ou $erro_phone2 for declarada
                        if(isset($erro_phone)){
                            echo $erro_phone;
                        } elseif (isset($erro_phone2)){
                            echo $erro_phone2;
                        }
                    ?>
                </div>
        <input class="w3-input w3-border" name="phone" type="text" placeholder="Telémovel">
        </div>
    </div>


      <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-calendar"></i></div>
            <label for="data_nascimento"><b>Data Nascimento</b></label>
            <div class="w3-rest">
            <input class="w3-input w3-border" name="nascimento" input id="date" type="date"">
            </div>
        </div>

        <div class="w3-row w3-section">
            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-cc"></i></div>
                <div class="w3-rest">
                <div id='erro'>    
                <?php 
                    //Se a variável $erro_cidadao for declarada
                    if(isset($erro_cidadao)){
                        echo $erro_cidadao;
                    }
                ?>
            </div>
                <input class="w3-input w3-border" name="cartao_cidadao" type="text" placeholder="Número Cartão Cidadão">
                </div>
            </div>

        <div class="w3-row w3-section">
            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-automobile"></i></div>
                <div class="w3-rest">
                <div id='erro'>    
                <?php 
                    //Se a variável $erro_conducao for declarada
                    if(isset($erro_conducao)){
                        echo $erro_conducao;
                    }
                ?>
            </div>
                <input class="w3-input w3-border" name="carta_conducao" type="text" placeholder="Número Carta Condução">
                </div>
        </div>


    <div class="w3-row w3-section">
    <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-home"></i></div>
        <div class="w3-rest">
        <div id='erro'>    
                <?php 
                    //Se a variável $erro_morada for declarada
                    if(isset($erro_morada)){
                        echo $erro_morada;
                    }
                ?>
            </div>
        <input class="w3-input w3-border" name="morada" type="text" placeholder="Morada">
        </div>
    </div>

    <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-key"></i></div>
        <div class="w3-rest">
        <div id='erro'>    
                <?php 
                    //Se a variável $erro_passwd for declarada
                    if(isset($erro_passwd)){
                        echo $erro_passwd;
                    }
                ?>
            </div>
            <input class="w3-input w3-border" name="passwd" type="password" placeholder="Palavra-passe">
        </div>
    </div>

    <div>
        <label for="genero"><b>Género: </b></label>

        <div class="w3-row w3-section">
            <input class="w3-radio" type="radio" name="gender" value="male" checked>
            <label>Masculino</label>
    
            <input class="w3-radio" type="radio" name="gender" value="female">
            <label>Feminino</label>
    
            <input class="w3-radio" type="radio" name="gender" value="outro">
            <label>Outro</label>
        </div>
    
    <button name='submit' class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Seguinte</button>

    </div><center>
        <div class="container signin">
        <p>Já tenho uma conta. <a href="pagina_inicial.php#menu">Entrar</a>.</p>
    </div></center>
    </form>
    
</body>
</html> 