<!DOCTYPE html>
<html lang="pt" >

<title>REFOOD-ADMIN</title>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    #erro {
        color: red;
    }
</style>

<body class="w3-blue">
<?php
    session_start();

    if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
        header("Location: admin_dashboard.php");
        exit();
    }

    if(isset($_POST['submit'])){
        include 'abreconexao.php';

        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = mysqli_query($conn, "SELECT * FROM Adm WHERE email = '$email'");
        $row = mysqli_fetch_assoc($query);

        if(mysqli_num_rows($query) === 0){
            $erro_1 = 'Email inválido';
        } else {
            if(password_verify($password, $row['password'])){
                $_SESSION['logado'] = true;
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['email'] = $email;

                header("Location: admin_dashboard.php");
            } else {
                $erro_2 = 'Password inválida';
            }
        }
    }
?>


    <!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
      <a class="w3-bar-item w3-button">REFOOD-UL</a>
      <!-- Right-sided navbar links. Hide them on small screens -->
    </div>
  </div>

 
  <br><br><br>
    <div style="margin: 20%; margin-top: auto;">
    <form action="admin_login.php" method="post" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
    <h2 class="w3-center">Admin</h2>
    
    <div class="w3-row w3-section">
    <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
        <div class="w3-rest">
        <div id='erro'>  
                <?php
                  //Se a variável $erro_1 for declarada
                  if(isset($erro_1)){
                    echo $erro_1;
                  }
                ?>
                </div>
        <input class="w3-input w3-border" name="email" type="text" placeholder="Email">
        </div>
    </div>

            
    <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-key"></i></div>
        <div class="w3-rest">
        <div id='erro'>  
                <?php
                  //Se a variável $erro_2 for declarada
                  if(isset($erro_2)){
                    echo $erro_2;
                  } 
                ?>
                </div>
            <input class="w3-input w3-border" name="password" type="password" placeholder="Palavra-passe">
        </div>
    </div>

    <button name="submit" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Seguinte</button>

    </form>
    </div>


</body>
</html> 