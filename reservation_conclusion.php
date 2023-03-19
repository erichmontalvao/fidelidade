<?php
session_start();
if (isset($_SESSION['user'])) {
    echo "olá";
    include('config.php');
    $connection = new PDO("mysql:dbname=$data_base;host=$host", $user, $password);
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //teste de passagem de dados.
    echo $_SESSION['data'] . $_SESSION['period'] . $_SESSION['building'] . $_SESSION['floor'] . $_SESSION['workspace'] ;

$engine = $connection->prepare("INSERT INTO reservation (username,CodSpace,Reservation_Date,Id_period) VALUES (?,?)");

        $engine->bindParam(1, $utilizador, PDO::PARAM_STR);
        $engine->bindParam(2, $passwordEncrip, PDO::PARAM_STR);

        $engine->execute();
        $connection = null;























} else {
    //Não tem autorização para aceder a este conteúdo
 echo header('location:http://localhost/fidelidadeV2/login.php');
//
}



?>