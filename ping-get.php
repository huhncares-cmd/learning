<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="60">
    <title>Get Lernsax Ping</title>
</head>
<body>
    <?php
        function ping(string $hostname, int $port){
            $start = microtime(true);
            $fso = fsockopen($hostname, $port, $errno, $errstr);
            if(!$fso){
                printf("%d / %s", $errno, $errstr);
            } else {
                $end = microtime(true);
                return ($end - $start) * 1000;
            }
        }
        $arr = array();
        for($i = 0; $i < 5; $i++){
            $time = ping("93.191.167.104", 443);
            array_push($arr, $time);
            printf("The Site took %.2f ms to respond.<br>", $time);
        }

        $max = $arr[0];
        $min = $arr[0];
        $mid = $arr[0];
        for($i = 1; $i < 5; $i++){
            if($arr[$i] > $max){
                $max = $arr[$i];
            }
            if($arr[$i] < $min){
                $min = $arr[$i];
            }
            $mid = ($mid + $arr[$i]);
        }
        $mid = $mid/$i;
        $date = date("l, d.m.Y -  H:i:s");
        $file = "ping.csv"; 
        $handle = fopen($file, 'a+');
        $data = sprintf("%s:\n%.2f;%.2f;%.2f\n", $date, $min, $mid, $max);
        fwrite($handle, $data); 
        fclose($handle);

    ?>
</body>
</html>
