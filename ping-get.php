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

        $time = ping("93.191.167.104", 443);
        $arr = array();
        array_push($arr, $time);
        echo "The Site took $arr[0] ms to respond.";
        
        $file = "ping.txt"; 
        $handle = fopen($file, 'a+');
        $data = "$time ms\n";
        fwrite($handle, $data); 
        fclose($handle);

    ?>
</body>
</html>