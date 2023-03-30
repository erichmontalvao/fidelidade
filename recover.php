<?php
//logout.php
session_start();

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include 'config.php';


$utilizador = "";
$password_utilizador = "";
$senha="";
$nome="";
$email="";


if (isset($_POST['text_email'])) {
    $utilizador = $_POST['text_email'];
    //armazenando na sessão o email do usuario
    $_SESSION['email_user']=$utilizador;
   // $password_utilizador = $_POST['text_password'];
}else{

echo '<p>É necessário Preencher o Email.<p/><br><br>
            <a href="recover_page.php">Recuperar Acesso</a>';


}

//$passwordEncrip = password_hash($password_utilizador, PASSWORD_DEFAULT);

$connection = new PDO("mysql:dbname=$data_base;host=$host", $user, $password);
$engine = $connection->prepare("SELECT * FROM user WHERE email = ?");
$engine->bindParam(1, $utilizador, PDO::PARAM_STR);
$engine->execute();
$connection = null;
//Verifica se os dados correspondem a valores da base de dados
if ($engine->rowCount() == 0) {
    echo '<p>Email de usuario não cadastrado no Banco de Dados.<p/><br><br>
            <a href="signup.php">Registo</a>';
    exit;
} else {
    //definir os dados da sessão
    $dado_user = $engine->fetch(PDO::FETCH_ASSOC);
  //  $_SESSION['Id_user'] = $dado_user['Id_user'];
  //  $_SESSION['user'] = $dado_user['email'];
   
    $nome=$dado_user['name'];
    $email=$dado_user['email'];
    $senha = $dado_user['password_user'];

    //armazenando na sessão o nome de usuario
    $_SESSION['nome_user']=$nome;

/*    $connection = new PDO("mysql:dbname=$data_base;host=$host", $user, $password);
    $engine = $connection->prepare("UPDATE user SET password_user= ? WHERE email = ?");
    $engine->bindParam(1, $passwordEncrip, PDO::PARAM_STR);
    $engine->bindParam(2, $utilizador, PDO::PARAM_STR);
    $engine->execute();
    $connection = null;
   echo 'Bem vindo, ' .  $_SESSION['user'] . '!<br>  <a href="reserva.php">Continuar</a>';*/


   EnviarEmail($nome,$email,$senha);


}


function EnviarEmail($nome,$email,$senha){

$mail = new PHPMailer(true);

try {
 //   $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'prjfidelidade@gmail.com';
    $mail->Password = 'ohhklmpqxwasxcok';
    $mail->Port = 587;

    $mail->setFrom('prjfidelidade@gmail.com');
    $mail->addAddress($email);
    $mail->addAddress('erich.montalvao@hotmail.com');
    $mail->addAddress('windson.m.bezerra@gmail.com');
    //$mail->addAddress('beatrizmarcelinoce@gmail.com');
    //$mail->addAddress('tiago11work@gmail.com');
    

    $mail->isHTML(true);
    $mail->Subject = 'Recuperacao de Password via gmail do projeto Fidelidade';
    $mail->Body = 'Ola, '.$nome.'<br>'.'<a href = "http://localhost/fidelidade/mudar_pass.php?email='.$email.'">Redefinir</a>' ; 
    $mail->AltBody = 'Recuperacao de Password do projeto de fidelidade';

    if($mail->send()) {
        echo 'Email enviado com sucesso';
    } else {
        echo 'Email nao enviado';
    }
} catch (Exception $e) {
    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}

}




/*$mailenv;
$message;

if(isset($_POST['text_email'])){

$mailenv = $_POST['text_email'];


}else {

$message="É Necessário Preencher o Email !";
echo $message . '
        <a href="recover_page.php">Voltar</a>
    </div>';

}


if (isset($_SESSION['user'])) {
    $mailenv = $_SESSION['user'];
}*/


?>