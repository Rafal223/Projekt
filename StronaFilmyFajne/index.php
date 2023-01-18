<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <center>
    <?php
        echo '<div class="blokGlownyDuzy"><h1>Wypożyczalnia Filmów</h1>';
        session_start();

        $con = new mysqli("127.0.0.1","root","","Projekt");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM film");
        $cos = $res->fetch_all();

        $res1 = $con->query("SELECT * FROM user");
        $cos1 = $res1->fetch_all();

        $offset=($_GET['page']-1)*10;
        $cos2 = $con->query("SELECT * FROM film LIMIT 10 OFFSET ".$offset."");
        $cos22 = $cos2->fetch_all();

        for($i = 0; $i<count($cos22);$i++)
        {
            echo '<div class="blok"><div class="lewy">Nazwa: '.$cos22[$i][1].', Opis: '.$cos22[$i][2].'<br>Typ: '.$cos22[$i][3].'<a href="szczegol.php?id='.$i.'">Szczegóły</a></div><div class="lewy">   </div></div>';
        }
        echo '<br><div class="dol">';
        $ile = (count($cos)/10)+1;
        for($i = 1; $i<$ile; $i++)
        {
            echo '<a class="przycisk" href="index.php?page='.$i.'">'.$i.'</a>';
        }
        echo '</div></form>';

        echo '</div>';
    ?>
        </center>
    </body>
</html>