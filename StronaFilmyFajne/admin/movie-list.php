<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <center>
    <?php
        include "../includes/header.php";
        echo '<form method="POST">';
        echo '<div class="blokGlownyDuzy"><h1>Wypożyczalnia Filmów</h1>';
        $con = new mysqli("127.0.0.1","root","","projekt");
        $res = $con->query("SELECT * FROM film");
        $cos = $res->fetch_all();

        $offset=($_GET['page']-1)*10;
        $cos2 = $con->query("SELECT * FROM film LIMIT 10 OFFSET ".$offset."");
        $cos22 = $cos2->fetch_all();

        for($i=0;$i<count($cos22);$i++)
        {
            echo '<div style="text-align: left">Id: '.$cos22[$i][0].' Nazwa: '.$cos22[$i][1].' Typ: '.$cos22[$i][3].' Opis: '.$cos22[$i][2].'<input type=checkbox name=zmienna'.$i.' value="'.$cos22[$i][0].'"></div>';
        }
        echo '<br><input type=submit value="Zaakceptuj"><br><br><a href="../index.php?page=1">Strona Glowna</a><br><div class="dol"><br>';
        $ile = (count($cos)/10)+1;
        for($i = 1; $i<$ile; $i++)
        {
            echo '<a href="movie-list.php?page='.$i.'">'.$i.'</a>';
        }

        if($_POST!=null)
        {
            for($i=0;$i<count($_POST);$i++)
            {
                $sqlquery="UPDATE `film` SET `widocznosc` = 1 WHERE `film`.`id` = ".$_POST["zmienna".$i.""].";";
                $con->query($sqlquery);
            }
        }
        echo '</div></form>';
        echo '</div>';
    ?>
        </center>
    </body>
</html>