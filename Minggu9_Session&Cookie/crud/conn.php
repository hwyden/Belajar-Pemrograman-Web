<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MySQL</title>
</head>
<body>
    <?php 
    $engi = "mysql"; 
    $host = "localhost";
    $dbse = "crud_pdo"; 
    $user = "root"; 
    $pass = ""; 
    $koneksi = new PDO($engi.':dbname='.$dbse.";host=".$host, $user,$pass); 
    ?>
</body>
</html>