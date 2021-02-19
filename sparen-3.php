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
        $interval = !empty($_GET['interval']) ? $_GET['interval'] : 1;
        $dauer = !empty($_GET['dauer']) ? $_GET['dauer'] : 12;


        $kapital = 0;
        $start = $kapital;
        $zinsenKumulativ = 0;

        $intervalOptionen = array(
            array(1, "Monatlich"),
            array(3, "Vierteljährlich"),
            array(6, "Hablbjährlich"),
            array(9, "Dreivierteljährlich"),
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
    <a>Einzahlung im gegebenen Interval:<br> <input type="number" placeholder="Einzahlung" name="einzahlung" value="<?=$einzahlung?>"></a><br><br>
    <a><input id="submit-button" name="submit" type="submit" value="Absenden"></a><br><br>

    <table>
    <?php
    
        if(isset($_GET['submit'])){
        $start = 0;
        $zinssatz = $zinssatz/100;
        
        $kapital = $start;
        $arr = array();
        for ($m = 0; $m < $dauer; $m++) {
            if($m%$interval == 0){
                $kapital = $kapital + $einzahlung;
            }
                $zinsen = $kapital * ($zinssatz/12);
                $kapital = $kapital + $zinsen;
                $zinsenKumulativ = $zinsenKumulativ + $zinsen;
            
            array_push($arr, $kapital);
            
            
        }
        echo "<tr>";
        echo "<th>Monat</th>";
        for($j = 0; $j < $dauer/12; $j++){
            echo "<th>".($j+1).". Jahr</th>";
        }
        echo "</tr>";
        for ($m = 0; $m < 12; $m++){
            echo "<tr>";
            printf("<td>%d</td>", $m + 1);
            for($j = 0; $m+($j*12)<$dauer; $j++){
                if(($m + $j*12)%$interval == 0){
                    $status = "style='font-style: italic; color: rgb(204, 159, 75);'";
                }
                else {
                    $status = "";
                }
                printf("<td><a %s>%.2F €</a></td>", $status,  $arr[$m + ($j * 12)]);
            }
            echo "</tr>";
        }
        }

?>

    </table>
    </form>
</body>
</html>