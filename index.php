
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="login/css/form.css">
</head>

<body>

    <div class="alert-box">
        <p class="alert">Message</p>
    </div>

    <div class="formdiv">
    <form class="form" action="" method="post">

        <h1 class="heading">Login</h1>
        <input type="email"    placeholder="email" autocomplete="off" class="email" name="email" required>
        <input type="password" placeholder="password" name="password" autocomplete="off" class="password" required>
    
        <button class="submit-btn" type="submit" name="validadelogin" value="GO">login</button>

        <a href="register.html" class="link">Don't have an account? register one</a>
    
        </form>
    </div>

    <script src="login/js/login.js"></script>
</body>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['validadelogin']))
    {

        // definições de host, database, usuário e senha
        $host = "127.0.0.1";
        $db   = "user_network";
        $user = "root";
        $pass = "root";
        // conecta ao banco de dados
        $con = mysqli_connect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR);
        // seleciona a base de dados em que vamos trabalhar
        mysqli_select_db($con, $db);
        // define variavel que vai receber valor de um FORM POST com 'name' especifico (email)
        $email = $_POST['email'];
        // define variavel que vai receber valor de um FORM POST com 'name' especifico (password)
        $password = $_POST['password'];
        // cria a instrução SQL que vai selecionar os dados
        //$query = sprintf("SELECT * FROM helper_users WHERE name = 'Leonardo Carlos'",);
        $query = sprintf("SELECT * FROM helper_users WHERE email = '$email'");
        // executa a query
        $dados = mysqli_query($con, $query) or die(mysql_error());
        // transforma os dados em um array
        $linha = mysqli_fetch_assoc($dados);
        // calcula quantos dados retornaram
        $total = mysqli_num_rows($dados);

            if($linha['password'] == $password) {
                header('Location: main_menu/mainMenu.html');
            } else {
                echo "Wrong password or email";
            }

    }
?>