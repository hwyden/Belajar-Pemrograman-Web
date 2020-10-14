<?php
    session_start();

    require 'functions.php';

    if(isset($_POST["login"]))
    {
        $username = $_POST["username"];
        $password = md5($_POST["password"]);

        $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' and password = '$password'");
        $row = mysqli_fetch_assoc($result);

        if(mysqli_affected_rows($koneksi) > 0)
        {
            $_SESSION['username'] = $username;
            echo $username;

            if(substr($username,0,3) == "A12")
            {
                header("location: mhs06106.php");
            }
            elseif(substr($username,0,4) == "0686")
            {
                header("location: dosen.php");
            }
            elseif(substr($username,0,6) == "yunita")
            {
                header("location: admin.php");
            }
        }
        else
        {
            echo "<script>
            alert('login gagal!');
            </script>";
        }

        $error = true;
    

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h5 class="h4 text-gray-900 mb-4">LOGIN</h5>
                        </div>
                        
                        <form method="post" action="">
                            <label for="username">Username </label>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password </label>
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required> 
                            </div>
                            <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>