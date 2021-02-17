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

    if (isset($_GET['kapital'])) {

        $kapital = $_GET['kapital'];
        $start = $_GET['kapital'];
        $zinssatz = $_GET['zinssatz'];
        $jahre = $_GET['jahre'];
        
        if($kapital != "" && $zinssatz != "" && $jahre != ""){
            $kapital = $_GET['kapital'];
            $start = $_GET['kapital'];
            $zinssatz = $_GET['zinssatz'];
            $zinsenKumulativ = 0;
        } else {
            $kapital = 10000;
            $start=10000;
            $zinssatz = 10;
            $jahre = 5;
            $zinsenKumulativ = 0;
        }

    } else {

        $kapital=10000;
        $start=10000;
        $zinssatz=10;
        $jahre = 5;
        $zinsenKumulativ = 0;

    }
    ?>

    <input type="text" placeholder="Sparbetrag" name="kapital" value=""><br>
    <input type="text" placeholder="Jahreszinssatz in %" name="zinssatz" value=""><br>
    <input type="text" placeholder="Dauer des Kredites in J" name="jahre" value="">

    <p><input type="submit" value="Absenden"></p><br>

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
        $kapital = sprintf("%.2F", $kapital);
        $zinsen = sprintf("%.2F", $zinsen);
        $zinsenKumulativ = sprintf("%.2F", $zinsenKumulativ);
        echo "<tr><td><a>".$jahr."</a></td><td><a>".$kapital." €</a></td><td><a>".$zinsen." €</a></td><td><a>".$zinsenKumulativ." €</a></td></tr>";

    }
    ?>

    </table>
    <?php 
    if(isset($msg)){ 
        echo $msg; 
    } 
    ?>
    </form>
</body>
</html>
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
        border:1px solid white;
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
</style>