<?php
session_start();

//carregar bibliotecas de email
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');


//namespace das bibliotecas do email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include 'config.php';

include_once('vendor/autoload.php');

//carregar bibliotecas do qrcode
require_once('vendor/chillerlan/php-qrcode/src/QRCode.php');

require_once('vendor/chillerlan/php-settings-container/src/SettingsContainerInterface.php');
require_once('vendor/chillerlan/php-settings-container/src/SettingsContainerAbstract.php');
require_once('vendor/chillerlan/php-qrcode/src/QROptionsTrait.php');

require_once('vendor/chillerlan/php-qrcode/src/QROptions.php');
require_once('vendor/chillerlan/php-qrcode/src/QRCodeException.php');
require_once('vendor/chillerlan/php-qrcode/src/Output/QRCodeOutputException.php');

//namespace das bibliotecas do qrcode
use chillerlan\QRCode\QrCode;
use chillerlan\Settings\SettingsContainerInterface;
use chillerlan\Settings\SettingsContainerAbstract;
use chillerlan\QRCode\QROptionsTrait;
use chillerlan\QRCode\QROptions;
use chillerlan\QRCode\QRCodeException;
use chillerlan\QRCode\Output\QRCodeOutputException;


// criar endereço que apontará o qrcode
$url="https://www.google.com";

//instancia do objeto do qrcode com o endereço apontado
$qrcode = (new chillerlan\QRCode\QRCode())->render($url);

//carregando a imagem do qrcode
echo "<img src='$qrcode' alt='QRCode'>";

$qr= "<img src='$qrcode' alt='QRCode'> <br>";

// variavel que captura o email da sessão
$email = $_SESSION['user'];

// variavel que captura o nome do usuario da sessão
$nome = $_SESSION['nome_user'];



if (isset($_SESSION['user'])) {
    echo "olá ". $nome;
    include('config.php');
    $connection = new PDO("mysql:dbname=$data_base;host=$host", $user, $password);
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //teste de passagem de dados.
    echo $_SESSION['data'] . $_SESSION['period'] . $_SESSION['building'] . $_SESSION['floor'] . $_SESSION['workspace'] ;

    /*
    $engine = $connection->prepare("INSERT INTO reservation (username,CodSpace,Reservation_Date,Id_period) VALUES (?,?)");

        $engine->bindParam(1, $utilizador, PDO::PARAM_STR);
        $engine->bindParam(2, $passwordEncrip, PDO::PARAM_STR);

        $engine->execute();
        $connection = null;

        */


        EnviarEmail($nome,$email,$qr);



} else {
    //Não tem autorização para aceder a este conteúdo
 echo header('location:http://localhost/fidelidadeV2/login.php');
//
}





// função que envia o email
function EnviarEmail($nome,$email,$qr){

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
        $mail->Subject = 'Confirmacao de Reserva do projeto de fidelidade';
        $mail->Body = 'Ola, '.$nome.'<br>'. "<img src='$qrcode' alt='QRCODE'> <br>".$qr ; 
        $mail->AltBody = 'Confirmacao de Reserva do projeto de fidelidade';
    
        if($mail->send()) {
            echo 'Email de confirmação de reserva enviado com sucesso';
        } else {
            echo 'Email de confirmacao de reserva nao enviado';
        }
    } catch (Exception $e) {
        echo "Erro ao enviar mensagem de confirmação: {$mail->ErrorInfo}";
    }
    
    }




?>