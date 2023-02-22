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

        $res5 = $con->query("SELECT * FROM film WHERE film.id=".$_GET["id"]."");
        $cos5 = $res5->fetch_all();

        echo '<h1>Szczegóły:</h1>
        <div class="details">Nazwa: '.$cos5[0][1].'<br>
        Typ: '.$cos5[0][3].'<br>
        Opis: '.$cos5[0][2].'<br>
        foto </div>';
        echo '<br><a href="../index.php?page=1">Strona Główna</a>';
        echo '</form>';
    ?>
        </div>
        </center>
    </body>
</html>