<html>
    <head>
    <link rel="stylesheet" href="styl.css">
    </head>
    <body>
    <?php
        session_start();
        $con = new mysqli("127.0.0.1","root","","Projekt");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM user");
        $cos = $res->fetch_all();

        echo '<center><div class="d1"><h1>Logowanie:</h1><br> Email: <input name="email"><br> Haslo: <input name="password" type="password"><br>';
        if($_POST!=NULL)
        {
            for($i=0;$i<count($cos);$i++)
            {
                if($_POST['email']==$cos[$i][1] && $_POST['password']==$cos[$i][2])
                {
                    $_SESSION["email"] = $_POST['email'];
                    $_SESSION["id"] = $i;
                    echo 'udalo sie zalogowac';
                    header("Location: ../index.php?page=1");
                }
            }
        }
        echo '<div class="trzy"><a href="register.php">Rejestracja</a><input type="submit"></div></center></div>';
        echo '</form>';
    ?>

    </body>
</html>