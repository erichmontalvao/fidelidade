            <?php
            session_start();
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

              <title> Recuperação de Password </title>
              <link rel="stylesheet" type="text/css" href="css/styles.css">
             

            </head>


                <body>



                    <form action="recover.php" method="POST">
                    <div class="container">
                            <div class="header">
                    <h2>Dados de Recuperação de Password</h2>
                    </div>
                    <div class="main">
                                <div class="content">
                                <label for="email">E-mail</label>
                                <input type="text" size="25" name="text_email" placeholder="Insira o seu E-mail" required>
                            </div>

                    </div>
                    <div class="footer">
                                <div class="content">
                                    <a href="login.php" id="recover_pw">Voltar para o Login?</a>
                                    <input type="submit" value="Enviar" id="btn-login">
                                    <span id="create-account">Não tem uma conta?<a href="signup.php" id="link-register">Registe-se</a></span>
                                </div>
                            </div>
                        </div>
                            </form>


                </body>


            </html>