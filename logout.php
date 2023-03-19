<?php
//logout.php
session_start();
$message = "Página não disponivel a visitantes";

if (isset($_SESSION['user'])) {
    $message = 'Até à próxima, ' . $_SESSION['user'];
}
//faz o logout do utilizador
unset($_SESSION['user']);

echo $message . '
        <a href="login.php">Inicio</a>
    </div>';
?>