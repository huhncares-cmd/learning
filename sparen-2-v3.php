<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sparen-2</title>
</head>
<body>
    <h1>Zinsrechner</h1>
    <form action="" method="GET">

    <?php

        $einzahlung = !empty($_GET['einzahlung']) ? $_GET['einzahlung'] : 100;
        $startkapital = !empty($_GET['startkapital']) ? $_GET['startkapital'] : 1000;
        $zinssatz = !empty($_GET['zinssatz']) ? $_GET['zinssatz'] : 10;
        $interval = !empty($_GET['interval']) ? $_GET['interval'] : 1;
        $dauer = !empty($_GET['dauer']) ? $_GET['dauer'] : 12;


        $kapital = $startkapital;
        $start = $kapital;
        $zinsenKumulativ = 0;

        $intervalOptionen = array(
            array(1, "Monatlich"),
            array(3, "Vierteljährlich"),
            array(6, "Hablbjährlich"),
            #array(9, "Dreivierteljährlich"),
            array(12, "Jährlich")
        );

    ?>


    <a>Jahreszinssatz in %:<br> <input type="number" placeholder="Jahreszinssatz in %" name="zinssatz" value="<?=$zinssatz?>"></input></a><br>
    <a>Dauer in M:<br> <input type="number" placeholder="Dauer in M" name="dauer" value="<?=$dauer?>"></input></a><br>
    <br><br>
    <?php
    for($radio = 0; $radio < count($intervalOptionen); $radio++){
        printf('<input type="radio" name="interval" value="%d" %s></input><label for="%d">%s</label><br>',
                $intervalOptionen[$radio][0],
                $intervalOptionen[$radio][0] == $interval ? "checked" : "",
                $intervalOptionen[$radio][0],
                $intervalOptionen[$radio][1]
        );
    }
    ?>
    <br><br>
    <a>Einzahlung im gegebenen Intervall:<br> <input type="number" placeholder="Einzahlung" name="einzahlung" value="<?=$einzahlung?>"></a><br>
    <a>Startkapital:<br> <input type="number" placeholder="Startkapital" name="startkapital" value="<?=$startkapital?>"></a><br><br>
    <a><input id="submit-button" type="submit" value="Absenden"></a><br><br>

    <table>
    <tr>
        <th>Monat</th>
        <th>Kapital</th>
        <th>Zinsen</th>
        <th>Zinsen kumulativ</th>
    </tr>
    <?php

        
    for($monat=0; $monat<$dauer; $monat++) {
        if($monat%$interval == 0){
            $kapital = $kapital + $einzahlung;
        }
        $zinsen = $kapital * ($zinssatz/100)/12;
        $kapital = $kapital + $zinsen;
        $zinsenKumulativ = $zinsenKumulativ + $zinsen;
        
        $k = sprintf("%.2F", $kapital);
        $z = sprintf("%.2F", $zinsen);
        $zK = sprintf("%.2F", $zinsenKumulativ);
        echo "<tr";
        if($monat%$interval == 0){
            echo " style='font-style: italic; color: rgb(168, 129, 56);'";
        }
        
        echo "><td><a>".($monat + 1)."</a></td><td><a>".$k." €</a></td><td><a>".$z." €</a></td><td><a>".$zK." €</a></td></tr>";
    }
       

    ?>

    </table>
    </form>
</body>
</html>