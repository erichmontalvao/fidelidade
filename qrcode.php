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

include_once('vendor/autoload.php');


/*$data = 'https://google.com';

// quick and simple:
echo '<img src="'.(new QRCode)->render($data).'" alt="QR Code" />';*/

require_once('vendor/chillerlan/php-qrcode/src/QRCode.php');

require_once('vendor/chillerlan/php-settings-container/src/SettingsContainerInterface.php');
require_once('vendor/chillerlan/php-settings-container/src/SettingsContainerAbstract.php');
require_once('vendor/chillerlan/php-qrcode/src/QROptionsTrait.php');

require_once('vendor/chillerlan/php-qrcode/src/QROptions.php');
require_once('vendor/chillerlan/php-qrcode/src/QRCodeException.php');
require_once('vendor/chillerlan/php-qrcode/src/Output/QRCodeOutputException.php');




use chillerlan\QRCode\QrCode;
use chillerlan\Settings\SettingsContainerInterface;
use chillerlan\Settings\SettingsContainerAbstract;
use chillerlan\QRCode\QROptionsTrait;
use chillerlan\QRCode\QROptions;
use chillerlan\QRCode\QRCodeException;
use chillerlan\QRCode\Output\QRCodeOutputException;

/*use chillerlan\QRCode\Common\Version;
use chillerlan\QRCode\Common\MaskPattern;
use chillerlan\QRCode\Common\EccLevel;
use chillerlan\QRCode\Output\QROutputInterface;
use chillerlan\QRCode\QROptions;*/




$url="https://www.google.com";


echo "<h2>Gerar QrCode da url: $url</h2>";

$qrcode = (new chillerlan\QRCode\QRCode())->render($url);

echo "<img src='$qrcode'>";

//echo '<img src="'.(new QRCode)->render($url).'" alt="QR Code" />';


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
    $mail->Body = 'Ola, '.$nome.'<br>'.'Seu Password e: <strong>'.$senha.'</strong>'.'<a href = "http://localhost/fidelidade/mudar_pass.php?email='.$email.'">Teste</a>' ; 
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