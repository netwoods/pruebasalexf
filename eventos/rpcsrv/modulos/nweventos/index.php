<!DOCTYPE html>
<html>
    <head>
        <title>Form evento</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
        include "scripts.php";
         
        print scriptsNwEventos();

        if (isset($_POST["code"])) {
            checkCode($_POST["code"]);
        } else {
            print bodyEventos();
        }
        ?>
    </body>
</html>