<html>
    <head>
    <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <center>
        <div class="blokGlowny">
    <?php
        include "../includes/header.php";
        $con = new mysqli("127.0.0.1","root","","Projekt");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM film");
        $cos = $res->fetch_all();

        echo '<h1>Zaawansowane Szczegóły:</h1>
        <div class="details">Nazwa: '.$cos[$_GET["id"]][1].'<br>
        Typ: '.$cos[$_GET["id"]][3].'<br>
        Opis: '.$cos[$_GET["id"]][2].'<br>
        foto </div>';
        echo '<br><a href="../index.php?page=1">Strona Główna</a>';
        echo '<br><br><input name="1" type="submit" value="usun"></a>';
        echo '<br><br><input name="1" type="submit" value="ukryj"></a>';
        
        if($_POST!=null)
            {
            if($_POST["1"]=="usun")
            {
                $sqlquery2 = "DELETE FROM `user_has_film` WHERE `user_has_film`.`film_id` = ".$cos[$_GET["id"]][0]."";
                $con->query($sqlquery2);

                $sqlquery = "DELETE FROM `film` WHERE `film`.`id` = ".$cos[$_GET["id"]][0]."";
                $con->query($sqlquery);
                header('location: ../index.php?page=1');
            }
            if($_POST["1"]=="ukryj")
            {
                $sqlquery3 = "UPDATE `film` SET `widocznosc` = 0 WHERE `film`.`id` = ".$_GET["id"].";";
                $con->query($sqlquery3);
            }
        }
        echo '</form>';
    ?>
        </div>
        </center>
    </body>
</html>