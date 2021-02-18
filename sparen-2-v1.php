<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sparen-1</title>
</head>
<body>
    <h1>Zinsrechner</h1>
    <form action="" method="GET">

    <?php

        $einzahlung = !empty($_GET['einzahlung']) ? $_GET['einzahlung'] : 100;
        $zinssatz = !empty($_GET['zinssatz']) ? $_GET['zinssatz'] : 10;
        $interval = !empty($_GET['interval']) ? $_GET['interval'] : "M";
        $dauer = !empty($_GET['dauer']) ? $_GET['dauer'] : 12;


        $kapital = 0;
        $start = $kapital;
        $zinsenKumulativ = 0;

    ?>


    <a>Jahreszinssatz in %:<br> <input type="number" placeholder="Jahreszinssatz in %" name="zinssatz" value="<?=$zinssatz?>"></a><br>
    <br><br><input type="radio" name="interval" value="M" <?php if($interval=="M")echo "checked"?>></input>
    <label for="M">Monatlich</label><br>
    <input type="radio" name="interval" value="H" <?php if($interval=="H")echo "checked"?>></input>
    <label for="H">Halbjährlich</label><br>
    <input type="radio" name="interval" value="V" <?php if($interval=="V")echo "checked"?>></input>
    <label for="V">Vierteljährlich</label><br>
    <input type="radio" name="interval" value="J" <?php if($interval=="J")echo "checked"?>></input>
    <label for="J">Jährlich</label><br><br>
    <a>Einzahlung im gegebenen Interval:<br> <input type="number" placeholder="Einzahlung" name="einzahlung" value="<?=$einzahlung?>"></a><br>
    <a id="interval">Dauer des Kredites in M:<br><input type="number" placeholder="Dauer des Kredites in M" name="dauer" value="<?=$dauer?>"></a><br><br>

    <a><input id="submit-button" type="submit" value="Absenden"></a><br><br>

    <table>
    <tr>
        <th>Monat</th>
        <th>Kapital</th>
        <th>Zinsen</th>
        <th>Zinsen kumulativ</th>
    </tr>
    <?php

        
        if($interval == "M"){
            for($monat=1; $monat<=$dauer; $monat++) {
                $kapital = $kapital + $einzahlung;
                $zinsen = $kapital * ($zinssatz/100)/12;
                $kapital = $kapital + $zinsen;
                $zinsenKumulativ = $zinsenKumulativ + $zinsen;
                
                $k = sprintf("%.2F", $kapital);
                $z = sprintf("%.2F", $zinsen);
                $zK = sprintf("%.2F", $zinsenKumulativ);
                echo "<tr style='color: rgb(168, 129, 56); font-style: italic;'><td><a>".$monat."</a></td><td><a>".$k." €</a></td><td><a>".$z." €</a></td><td><a>".$zK." €</a></td></tr>";

            }
        }
        if($interval == "H"){
            for($monat=0; $monat<$dauer; $monat++) {

                if($monat%6 == 0){
                    $kapital = $kapital + $einzahlung;
                }
                $zinsen = $kapital * ($zinssatz/100)/12;
                $kapital = $kapital + $zinsen;
                $zinsenKumulativ = $zinsenKumulativ + $zinsen;
                
                $k = sprintf("%.2F", $kapital);
                $z = sprintf("%.2F", $zinsen);
                $zK = sprintf("%.2F", $zinsenKumulativ);
                echo "<tr";
                if($monat%6 == 0){
                    echo " style='font-style: italic; color: rgb(168, 129, 56);'";
                }
                $printMonat = $monat + 1;
                echo "><td><a>".$printMonat."</a></td><td><a>".$k." €</a></td><td><a>".$z." €</a></td><td><a>".$zK." €</a></td></tr>";
            }
        }
        if($interval == "V"){
            for($monat=0; $monat<$dauer; $monat++) {

                if($monat%3 == 0){
                    $kapital = $kapital + $einzahlung;
                }
                $zinsen = $kapital * ($zinssatz/100)/12;
                $kapital = $kapital + $zinsen;
                $zinsenKumulativ = $zinsenKumulativ + $zinsen;
                
                $k = sprintf("%.2F", $kapital);
                $z = sprintf("%.2F", $zinsen);
                $zK = sprintf("%.2F", $zinsenKumulativ);
                echo "<tr";
                if($monat%3 == 0){
                    echo " style='font-style: italic; color: rgb(168, 129, 56);'";
                }
                $printMonat = $monat + 1;
                echo "><td><a>".$printMonat."</a></td><td><a>".$k." €</a></td><td><a>".$z." €</a></td><td><a>".$zK." €</a></td></tr>";
            }
        }
        if($interval == "J"){
            for($monat=0; $monat<$dauer; $monat++) {

                if($monat%12 == 0){
                    $kapital = $kapital + $einzahlung;
                }
                $zinsen = $kapital * ($zinssatz/100)/12;
                $kapital = $kapital + $zinsen;
                $zinsenKumulativ = $zinsenKumulativ + $zinsen;
                
                $k = sprintf("%.2F", $kapital);
                $z = sprintf("%.2F", $zinsen);
                $zK = sprintf("%.2F", $zinsenKumulativ);
                echo "<tr";
                if($monat%12 == 0){
                    echo " style='font-style: italic; color: rgb(168, 129, 56);'";
                }
                $printMonat = $monat + 1;
                echo "><td><a>".$printMonat."</a></td><td><a>".$k." €</a></td><td><a>".$z." €</a></td><td><a>".$zK." €</a></td></tr>";
            }
        }

    ?>

    </table>
    </form>
</body>
</html>