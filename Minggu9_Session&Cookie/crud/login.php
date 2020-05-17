<?php
session_start();
require 'connect.php';

if(isset($_COOKIE['id']) && isset($_COOKIE['key']))
{
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($conn, "SELECT username FROM tb_user WHERE hak = $id");
    $row = mysqli_fetch_assoc($result);

    if($key === hash('sha256', $row['username']))
    {
        $_SESSION['login'] = true;
    }
}


if(isset($_SESSION["login"]))
{
    header("location: index.php");
    exit;
}

if(isset($_POST["login"]))
{
    $username = $_POST["user"];
    $password = $_POST["pass"];

    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE 
    username = '$username' AND password = '$password'");

    if($username != "" || $password != "")
    {
        if(mysqli_num_rows($result) != 0)
        {
            $row = mysqli_fetch_assoc($result);
            
            //set session
            $_SESSION["login"] = true;

            //cek remember me
            if(isset($_POST["remember"]))
            {
                //buat cookie
                setcookie('id', $row['hak'], time()+60);
                setcookie('key', hash('sha256', $row['username']), time()+60);
            }

            header("location: index.php");
            exit;
        }
        else
        {
            $error1 = true;
        }
    }
    else
    {
        $error2 = true;   
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
<body>

<h1>Halaman Login</h1>

<?php if(isset($error1)) : ?>
    <p style="color: red; font-style: italic;">Username / password salah!</p>
<?php endif; ?>
<?php if(isset($error2)) : ?>
    <p style="color: red; font-style: italic;">Username / password harus diisi!</p>
<?php endif; ?>

<form action="" method="post">
    <ul>
        <li>
            <label for="username">Username:</label>
            <input type="text" name="user" id="user">
        </li>
        <li>
            <label for="password">Password:</label>
            <input type="password" name="pass" id="pass">
        </li>
        <li>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember me</label>
        </li>
        <li>
            <button type="submit" name="login">Login</button>
        </li>
    </ul>

</form>
</body>
</head>
</html>