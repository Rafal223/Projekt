<html>
    <head>
    <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <center>
        <div class="blokGlowny">
    <?php
        include "../includes/header.php";
        $con = new mysqli("127.0.0.1","root","","projekt");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM film");
        $cos = $res->fetch_all();

        echo '<h1>Dodaj film:</h1>
        <div class="details">Nazwa: <input name="nazwa"><br>
        Typ: <input name="typ"><br>
        Opis: <input name="opis"><br>
        foto </div>';
        echo '<input type="submit">';
        echo '<br><a href="../index.php?page=1">Strona Główna</a>';
        echo '</form>';

        if($_POST!=NULL)
        {
            print_r($_POST);
            if($_POST["nazwa"]!="" && $_POST["typ"]!="" && $_POST["opis"]!="")
            {
                $liczba = count($cos);
                print_r($liczba);
                $sqlquery = "INSERT INTO `film` VALUES ('".$liczba."', '".$_POST['nazwa']."', '".$_POST['opis']."','".$_POST['typ']."');";
                $con->query($sqlquery);

                $sqlquery2 = "INSERT INTO `user_has_film` VALUES ('".$_SESSION["id"]."','".$liczba."');";
                $con->query($sqlquery2);
                header('location: ../index.php?page=1');
            }
        }

    ?>
        </div>
        </center>
    </body>
</html>