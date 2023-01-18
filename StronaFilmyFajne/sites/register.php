<html>
    <head>
    <link rel="stylesheet" href="styl.css">
    </head>
    <body>
    <?php
        $con = new mysqli("127.0.0.1","root","","Projekt");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM user");
        $cos = $res->fetch_all();

        echo '<center><div class="d1"><h1>Rejestracja:</h1>
        <br> Imię: <input name="imie">
        <br> Nazwisko: <input name="nazwisko">
        <br> Email: <input name="email">
        <br> Hasło: <input name="password" type="password"><br>';
        if($_POST!=NULL)
        {
            if($_POST['email']!="" && $_POST['password']!="")
            {
                $sqlquery = "INSERT INTO `user` VALUES ('".count($cos)."','".$_POST["imie"]."','".$_POST["nazwisko"]."', '".$_POST['password']."', '".$_POST['email']."', '0');";
                $con->query($sqlquery);
                header('location: login.php');
            }
        }
        echo '<a href="login.php">Logowanie</a><input type="submit"></center></div>';
        echo '</form>';
    ?>

    </body>
</html>