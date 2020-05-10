<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuration</title>
</head>
<body>
<?php 
    require_once 'assets/dompdf-master/autoload.inc.php'; 
    date_default_timezone_set("Asia/Jakarta"); 
    function get($val){ 
        return 
    isset($_GET[$val])?htmlspecialchars($_GET[$val]):null; 
    } 
    function post($val){ 
        return 
    isset($_POST[$val])?htmlspecialchars($_POST[$val]): 
    null; 
    } 
    function inc($val){ 
        global $koneksi; 
        include file_exists($val.'.php')?$val.'.php':'nofile.php'; 
    } 
?>  
</body>
</html>