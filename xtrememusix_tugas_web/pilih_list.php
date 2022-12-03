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
    <link rel="stylesheet" type="text/css" href="list.css">
    <link rel="icon" href="gambar/icons-dessert.ico">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Choice song</title>
</head>
<body>
<form action= "" method="POST" enctype="multipart/form-data">
            <div class="login-box container">
                <div class="logo-container">
                <a href="" class="logo" id="warna">
                <span>x</span>treme<span>musi</span><span>x</span>
                </a>
                </div>
                <h2>List Song</h2>

                <button name="submit" class="btn">Popular Now</button>
                <button name="submit2" class="btn">Top Indonesian</button>
                <button name="submit3" class="btn">Best K-Pop</button>
                <button name="submit4" class="btn">Recommended For Today</button>
                <button name="submit5" class="btn">Sad Song</button>
                <button name="submit6" class="btn">#ThrowbackThursday</button>
            
        </form>
        <?php
                if (isset($_POST['submit'])) {
                    header("Location: popular_now.php");
                }
                elseif (isset($_POST['submit2'])) {
                    header("Location: top_indonesian.php");
                }
                elseif (isset($_POST['submit3'])) {
                    header("Location: best_kpop.php");
                }
                elseif (isset($_POST['submit2'])) {
                    header("Location: top_indonesian.php");
                }
                elseif (isset($_POST['submit3'])) {
                    header("Location: best_kpop.php");
                }
                elseif (isset($_POST['submit4'])) {
                    header("Location: recommended.php");
                }
                elseif (isset($_POST['submit5'])) {
                    header("Location: sad_song.php");
                }
                elseif (isset($_POST['submit6'])) {
                    header("Location: throwback.php");
                }
            ?>
</body>
</html