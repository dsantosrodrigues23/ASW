<?php
session_start();

//Destroi as variáveis de sessão e volta para a página inicial
session_destroy();
header('Location: pagina_inicial.php');
?>