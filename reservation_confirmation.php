<?php
//teste paginainicial
session_start();
if (isset($_SESSION['user'])) {
    echo 'Olá ' . $_SESSION['user'] . '<br>
  A tua reserva: <br><br>';
} else {
    //Não tem autorização para aceder a este conteúdo
    echo header('location:http://localhost/fidelidade/login.php');
}

//Algumas funções javascript

function function_alert($message)
{

    // Display the alert box 
    echo "<script>confirm('$message');</script>";
}


// foram colocados "If's" separados para poder comentar cada processo:
// obter data
if (isset($_POST['data'])) {
    if (!empty($_POST['data'])) {
        $date = $_POST['data'];
        echo 'Data: ' . $date . "<br>";
    } else {
        echo 'Introduz uma data.';
    }
}
;

if (!empty($_POST['period'])) {
    $period = $_POST['period'];
    echo 'Periodo: ' . $period . "<br>";
} else {
    echo function_alert('Falta inserir o perido, será redirecionado para a página.') . header('location:http://localhost/fidelidade/newreservation.php');
}

//obter Edificio
if (!empty($_POST['building'])) {
    $building = $_POST['building'];
    echo 'Edifício: ' . $building . "<br>";
} else {
    echo function_alert('Falta inserir o perido, será redirecionado para a página.') . header('location:http://localhost/fidelidade/newreservation.php');
}

//obter piso
if (!empty($_POST['floor'])) {
    $floor = $_POST['floor'];
    echo 'Piso: ' . $floor . "<br>";
} else {
    echo function_alert('Falta inserir o perido, será redirecionado para a página.') . header('location:http://localhost/fidelidade/newreservation.php');
}

//obter espaço
if (!empty($_POST['workspace'])) {
    $workspace = $_POST['workspace'];
    echo 'Espaço: ' . $workspace . "<br>";
} else {
    echo function_alert('Falta inserir o perido, será redirecionado para a página.') . header('location:http://localhost/fidelidade/newreservation.php');
}

$_SESSION['data'] = $date;
$_SESSION['period'] = $period;
$_SESSION['building'] = $building;
$_SESSION['floor'] = $floor;
$_SESSION['workspace'] = $workspace;






echo "<br><br><a href='reservation_conclusion.php?nome=".$workspace."&floor=".$floor."'>Confirmar</a>";

?>