<?php
session_start();
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $_SESSION['paramemail']=$email;
  
}else{

echo '<p>Parametro email vazio.<p/><br><br>
            <a href="recover_page.php">Recuperar Acesso</a>';

}
?>

<!DOCTYPE html>
<html lang="en">
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
             
    <title>Alterar Senha</title>
</head>
<body>
<form action="atual_pass.php" method="POST">
                    <div class="container">
                            <div class="header">
                    <h2>Alterar Senha</h2>
                    </div>
                    <div class="main">
                                <div class="content">
                                <label for="password">Password</label>
                                <input type="text" size="25" name="password" placeholder="Insira a nova senha" required>
                            </div>
                            <div class="content">
                                <label for="password2">Password</label>
                                <input type="text" size="25" name="password2" placeholder="Confirme a senha" required>
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