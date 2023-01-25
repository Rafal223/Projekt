<html>
    <head>

    </head>
    
    <body>
        <?php
            include "../includes/header.php";
            $_SESSION["email"]="";
            $_SESSION["password"]="";
            header("Location: login.php");
        ?>
    </body>
</html>