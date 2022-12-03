<?php
session_start();
require "koneksi.php";
?>

<script>
if ( window.history.replaceState ) {
 window.history.replaceState( null, null, window.location.href );
}
</script>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link rel="icon" href="gambar/icons-dessert.ico">
    <title>Sign Up</title>
</head>
<body>
<audio src="gambar/windah.mp3" autoplay loop></audio>

            <form action="" method="POST" enctype="multipart/form-data">
            <div class="login-box">
                <div class="logo-container">
                <a href="" class="logo" id="warna">
                <span>x</span>treme<span>musi</span><span>x</span>
                </a>
                </div>
                <h1>Sign Up</h1>
                <div class="textbox">
                    <i class='bx bx-user'></i>
                    <input type="text" placeholder="Username" name="username" value="" required>
                </div>

                <div class="textbox">
                    <i class='bx bx-lock-alt'></i>
                    <input type="email" placeholder="Email" name="email" value="" required>
                </div>

                <!-- <div class="textbox">
                    <i class='bx bx-user'></i>
                    <input id="phone" type="tel" name="phone" placeholder="08xx xxxx xxxx" pattern="[0-9]{4} [0-9]{4} [0-9]{4}" onKeyPress="if(this.value.length==15) return false;" required>
                </div> -->

                <div class="textbox">
                    <i class='bx bx-lock-alt'></i>
                    <input type="password" placeholder="Password" name="password" value="" required>
                </div>

                <div class="textbox">
                    <i class='bx bx-lock-alt'></i>
                    <input type="password" placeholder="Confirm Password" name="cpassword" value="" required>
                </div>

                <button name="submit" class="btn">Submit</button>
            
            <?php
                if (isset($_POST['submit'])) {
                    $user = $_POST['username'];
                    $pass = $_POST['password'];
                    $cpass = $_POST['cpassword'];
                    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$user'");
                    if ($pass !== $cpass) {
                        echo("<p>Konfirmasi Password Salah!</p>");
                    } elseif (mysqli_fetch_assoc($result)){
                        echo("<p>Username Telah Digunakan!</p>");
                    } else {
                        $pass = password_hash($pass, PASSWORD_DEFAULT);
                        $query = mysqli_query($conn, "INSERT INTO `user` VALUES (0,'$user','$pass','user')");
                        $sqlUser = mysqli_query($conn, "SELECT id FROM `user` WHERE username = '$user'");
                        list($idUser) = mysqli_fetch_array($sqlUser);
                        $query2 = mysqli_query($conn, "INSERT INTO `playlist` VALUES (0,'$idUser','Favorite')");
                        if (mysqli_affected_rows($conn) > 0) {
                            $_SESSION["username"] = $_POST['username'];
                            $_SESSION["priv"] = 'user';
                            $_SESSION['id'] = $idUser;
                            echo 
                            "<script>
                                alert('Sign Up Succes!')
                                document.location.href = 'user.php';
                            </script>";
                        } else {
                            echo 
                            "<script>
                                alert('Sign Up Failed!')
                                document.location.href = 'proses_daftar.php';
                            </script>";
                        }
                    }
                }

            ?>
        </form>
        <br>Sudah memiliki akun? <a  class="daftar" href="proses_login.php" style="text-decoration:none">Sign In</a>
    </div>



</body>
</html>