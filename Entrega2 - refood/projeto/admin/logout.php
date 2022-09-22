<?php
session_start();

//Destroi as variáveis de sessão e volta para a página inicial
session_destroy();
header('Location: admin_login.php');
?>