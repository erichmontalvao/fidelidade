    <?php
    //Assegurar sempre o login
    session_start();
    if (isset($_SESSION['user'])) {
     //   echo '<div class="container">
          //      <div class="header"><h1>Olá, ' . $_SESSION['user'] . '! Faz aqui a tua reserva!</h1></div>';
    } else {
        //Não tem autorização para aceder a este conteúdo
        echo header('location:http://localhost/fidelidade/login.php');
    }

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

          

                   
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="css/font-awesome.min.css" rel="stylesheet" />

          <title> Nova Reserva </title>
          <link rel="stylesheet" type="text/css" href="css/styles.css">


    </head>




    <body>

    <?php include 'nav.php';?>

    <section>
            <div class="container">

                <div class="row">
            <div class="header">
            <h2>Nova Reserva</h2>
            </div>

                    <form action="reservation_confirmation.php" method="POST">

              <!-- //data da reserva -->
                
                    <div class="content">
                        <label for="bookingdate">Data de Reserva</label>
                        <input type="date" name="data" id="bookingdate">
                    </div>
                   

             <!-- // periodo da reserva -->
                <div class="content">
                    <label for="periodo">Período</label>
                    <select name="period">
                    <option value="" disabled selected>Escolhe o periodo da reserva</option>
                        <option>Manhã</option>
                        <option>Tarde</option>
                        <option>Dia todo</option>
                    </select>
                    
                    
                </div>

        <!-- // edificio da reserva             -->
        <div class="content">
                    <label for="building">Edifício</label>
                    <select name="building" id="building">
                    <option value="" disabled selected>Escolhe um edifício</option>
                        <option>Edifício 1</option>
                        <option>Edifício 2</option>
                    </select>
                </div>

        <!-- // piso da reserva               -->
        <!--Pisos -2 a -5 são de garagem e Pisos de 1 a 7 são de espaços de trabalho-->
                <div class="content">
                    <label for="floor">Piso</label>
                    <select name="floor" id="floor">
                    <option value="" disabled selected>Escolhe um piso</option>
                        <option>Piso -5</option>
                        <option>Piso -4</option>
                        <option>Piso -3</option>
                        <option>Piso -2</option>
                        <option>Piso 1</option>
                        <option>Piso 2</option>
                        <option>Piso 3</option>
                        <option>Piso 4</option>
                        <option>Piso 5</option>
                        <option>Piso 6</option>
                        <option>Piso 7</option>
                    </select>
                </div>

        <!-- // espaço da reserva -->
        <div class="content">
                    <label for="workspace">Espaço de trabalho</label>
                    <select name="workspace" id="workspace">
                    <option value="" disabled selected>Escolhe um espaço</option>
                        <option>Espaço 1</option>
                        <option>Espaço 2</option>
                        <option>Espaço 3</option>
                        <option>Espaço 4</option>
                        <option>Espaço 5</option>
                        <option>Espaço 6</option>
                        <option>Espaço 7</option>
                        <option>Espaço 8</option>
                        <option>Espaço 9</option>
                        <option>Espaço 10</option>
                        <option>Espaço 11</option>
                        <option>Espaço 12</option>
                        <option>Espaço 13</option>
                        <option>Espaço 14</option>
                        <option>Espaço 15</option>
                        <option>Espaço 16</option>
                        <option>Espaço 17</option>
                        <option>Espaço 18</option>
                        <option>Espaço 19</option>
                        <option>Espaço 20</option>
                    </select>
                </div>

        <!-- // equipa da reserva -->
        <div class="content">
                    <label for="team">Equipa</label>
                    <select name="team" id="team">
                    <option value="" disabled selected>Escolhe uma equipa</option>
                        <option>Equipa 1</option>
                        <option>Equipa 2</option>
                        <option>Equipa 3</option>
                        <option>Equipa 4</option>
                        <option>Equipa 5</option>
                        <option>Equipa 6</option>
                        <option>Equipa 7</option>
                        <option>Equipa 8</option>
                        <option>Equipa 9</option>
                        <option>Equipa 10</option>
                    </select>
                </div>

                <div class="content">
                    <label for="carspace">Espaço de garagem</label>
                    <select name="carspace" id="carspace">
                    <option value="" disabled selected>Escolhe uma Garagem</option>
                        <option>Espaço 1</option>
                        <option>Espaço 2</option>
                        <option>Espaço 3</option>
                        <option>Espaço 4</option>
                        <option>Espaço 5</option>
                        <option>Espaço 6</option>
                        <option>Espaço 7</option>
                        <option>Espaço 8</option>
                        <option>Espaço 9</option>
                        <option>Espaço 10</option>
                        <option>Espaço 11</option>
                        <option>Espaço 12</option>
                        <option>Espaço 13</option>
                        <option>Espaço 14</option>
                        <option>Espaço 15</option>
                        <option>Espaço 16</option>
                        <option>Espaço 17</option>
                        <option>Espaço 18</option>
                        <option>Espaço 19</option>
                        <option>Espaço 20</option>
                    </select>
                </div>

        <!-- // em caso haver carro -->
        <div class="content-car">
                    <h3>Pretende associar um lugar de garagem à sua reserva?</h3>
                    <div class="car-btns">
                        <button type="button" id="btn-yes" onclick="displayDados('dadosveiculo');">Sim</button>
                        <button type="button" id="btn-no" onclick="esconderDados('dadosveiculo');">Não</button>
                    </div>





                <div class="inibida" id="dadosveiculo" style="display: none;">
                    <div class="content">
                        <label for="brand">Marca do veículo</label>
                        <input type="text" id="brand" autocomplete="off">
                    </div>
                    <div class="content">
                        <label for="plate">Matrícula do veículo</label>
                        <input type="text" id="plate" autocomplete="off" placeholder="00-XX-00">
                    </div>
                </div>






                </div>
                <div class="content">
        <!-- // fim de dados <input type="submit" name="submit" vlaue="choose options"> -->

        <input type="submit" name="submit" value="Confirmar" id="btn-confirm">
        
                 <input type="submit" value="Cancelar" id="btn-cancel">
            </div>
           


        
        </form>

    </div>

</div>


</section>



 


                <script>
        function displayDados(el) {
             document.getElementById(el).style.display = "inline";
        }
        function esconderDados(el) {
             document.getElementById(el).style.display = "none";
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        </body>

        </html>


    