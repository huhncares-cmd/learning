<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparen-1</title>
</head>
<body>
    <h1>Zinsrechner</h1>
    <form action="" method="GET">

    <?php
        $kapital = !empty($_GET['kapital']) ? $_GET['kapital'] : 10000;
        $zinssatz = !empty($_GET['zinssatz']) ? $_GET['zinssatz'] : 10;
        $jahre = !empty($_GET['jahre']) ? $_GET['jahre'] : 5;

        $start = $kapital;
        $zinsenKumulativ = 0;
    ?>

    <a>Sparbetrag:<br> <input type="number" placeholder="Sparbetrag" name="kapital" value="<?=$kapital?>"></a><br>
    <a>Jahreszinssatz in %:<br> <input type="number" placeholder="Jahreszinssatz in %" name="zinssatz" value="<?=$zinssatz?>"></a><br>
    <a>Dauer des Kredites in J: <br><input type="number" placeholder="Dauer des Kredites in J" name="jahre" value="<?=$jahre?>"></a><br><br>

    <a><input id="submit-button" type="submit" value="Absenden"></a><br><br>

    <table>
    <tr>
        <th>Jahr</th>
        <th>Kapital</th>
        <th>Zinsen</th>
        <th>Zinsen kumulativ</th>
    </tr>
    <?php

        for($jahr=1; $jahr<=$jahre; $jahr++) {

            $kapital = $kapital*(100 + $zinssatz)/100;
            $zinsen = $kapital - $start;
            $zinsenKumulativ = $zinsenKumulativ + $zinsen;
            
            $k = sprintf("%.2F", $kapital);
            $z = sprintf("%.2F", $zinsen);
            $zK = sprintf("%.2F", $zinsenKumulativ);
            echo "<tr><td><a>".$jahr."</a></td><td><a>".$k." €</a></td><td><a>".$z." €</a></td><td><a>".$zK." €</a></td></tr>";

        }

    ?>

    </table>
    </form>
</body>
<style>
    *{
        font-family: sans-serif, Arial;
    }
    h1{
        color: orange;
    }
    body{
        margin: 5%;
        color: white;
        background: #1c1c1c;
    }
    table{
        border: 1px solid white;
        border-collapse: collapse;
    }
    th{
        color: orange;
        border: 1px solid white;
    }
    td{
        border: 1px solid white;
    }
    td a{
        float: right;
    }
    a{
        margin: 5px 0 5px 0;
    }
    input{
        border: 1px solid orange;
        border-radius: 5px;
        color: white;
        background: #161616;
        padding: 5px;
    }
    #submit-button:hover{
        color: orange;
        background: black;
    }
</style>
</html>