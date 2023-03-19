<?php
//teste paginainicial
session_start();
if (isset($_SESSION['user'])) {
    echo 'Login feito com sucesso: BEM VINDO<br><br>';
}

echo '<a href="logout.php">Logout</a>';
?>