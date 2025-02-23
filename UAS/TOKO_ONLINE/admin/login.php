<?php 
    session_start();
    require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .main {
            height: 100vh;
        }

        .login-box {
            max-width: 500px;
            width: 100%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        @media (max-width: 768px) {
            .login-box {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <h2 class="text-danger mb-3 fst-italic text-center">Login dulu min!</h2>
        <div class="login-box shadow">
            <h3 class="text-center">Gundol's Store</h3>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" required autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div>
                    <button class="btn btn-success form-control mt-3" type="submit" name="loginbtn">Login</button>
                </div>
            </form>
        </div>

        <div class="mt-3 w-100 text-center"> 
            <?php
                if(isset($_POST['loginbtn'])){
                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);

                    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
                    $countdata = mysqli_num_rows($query);
                    $data = mysqli_fetch_array($query);
                    
                    if($countdata > 0){
                        if(password_verify($password, $data['password'])){
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['login'] = true;
                            header('location: ../admin');
                            exit();
                        } else {
                            echo '<div class="alert alert-warning text-center mx-auto p-2 p-md-3" style="max-width: 500px; width: 90%;" role="alert">
                                    Password salah!
                                  </div>';
                        }
                    } else {
                        echo '<div class="alert alert-warning text-center mx-auto p-2 p-md-3" style="max-width: 500px; width: 90%;" role="alert">
                                Akun tidak tersedia!
                             </div>';
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
