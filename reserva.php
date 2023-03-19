    <?php
    //teste paginainicial
    session_start();
    if (isset($_SESSION['user'])) {

     //   $nomeusuario = $_SESSION['user'];

        // echo 'Bem-vindo, '. $nomeusuario .'<br> <br>';
    }else{
        //Não tem autorização para aceder a este conteúdo
        echo header('location:http://localhost/fidelidade/login.php');
    }



    /*echo '<form action="newreservation.php">
    <form><input type="submit" value="NOVA RESERVA" id="btn-reserva "> 
    </form>' . '<input type="submit" value="GERIR RESERVA" id="btn-gerir_reserva">
    </form>';
            


    echo '<br><br><a href="logout.php">Logout</a>';*/


    ?>

     <!DOCTYPE html>
                <html>
                <head>
                  <meta charset="utf-8" />
                  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                  <!-- Mobile Metas -->
                  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                  <!-- Site Metas -->
                  <meta name="keywords" content="" />
                  <meta name="description" content="" />
                  <meta name="author" content="" />
                  <link rel="shortcut icon" href="images/logo.png" type="">

                  <title> Página Inicial </title>
                  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
                  <link href="css/font-awesome.min.css" rel="stylesheet" />

                  <link rel="stylesheet" type="text/css" href="css/styles.css">
                 

                </head>


                    <body>



    <!--                 <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link active" href="reserva.php">Página Inicial</a>
                      </li>
                        <li class="nav-item">
                             <i class="fa fa-phone" aria-hidden="true"></i>
                        <a class="nav-link active" href="#">Definições</a>
                      </li>
                      <li class="nav-item">
                        <i class="fa-thin fa-user"></i>
                        <a class="nav-link" href="perfil.php">Perfil de Utilizador</a>
                      </li>
                      <li class="nav-item">
                        <span class="fa-solid fa-user"></span>
                        <a class="nav-link" href="minhasreservas.php">Minhas Reservas</a>
                      </li>


                    </ul> -->

                    <?php include 'nav.php';?>











    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                    </body>


                </html>

