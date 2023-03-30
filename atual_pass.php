<?php

session_start();

include 'config.php';

$password1 = $_POST["password"];
$password2 = $_POST["password2"];
$nome = $_SESSION['nome_user'];
$email = $_SESSION['email_user'];


if (isset($_SESSION['paramemail'])) {
    $paramemail = $_SESSION["paramemail"];
    echo 'Valor do parametro é' .$paramemail;

}else{

echo '<p>Parametro email vazio.<p/><br><br>
            <a href="recover_page.php">Recuperar Acesso </a>';

}

if ($password1 == $password2) {

    //encriptando o password digitado para salvar
    $passwordEncrip = password_hash($password1, PASSWORD_DEFAULT);
    //conectando ao banco de dados e executando um update na tabela user
    $connection = new PDO("mysql:dbname=$data_base;host=$host", $user, $password);
    $engine = $connection->prepare("UPDATE user SET password_user= ? WHERE email = ?");
    $engine->bindParam(1, $passwordEncrip, PDO::PARAM_STR);
    $engine->bindParam(2, $email, PDO::PARAM_STR);
    $engine->execute();
    $connection = null;
    echo 'Password Redefinido com sucesso';

}
else{
    echo 'Password não são iguais';
}

?>