<?php
session_start();
require "koneksi.php";
date_default_timezone_set('asia/kuala_lumpur');
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
    <link rel="stylesheet" type="text/css" href="style3.css">
    <link rel="icon" href="gambar/icons-dessert.ico">
    <title>Manage Song</title>
</head>
<body>

            <form action= "" method="POST" enctype="multipart/form-data">
            <div class="login-box container">
                <div class="logo-container">
                <a href="" class="logo" id="warna">
                <span>x</span>treme<span>musi</span><span>x</span>
                </a>
                </div>
                <h2>Add Song</h2>

                <div class="textbox">
                    <i class='bx bx-lock-alt'></i>
                    <span>Playlist Lagu</span>
                    <select name="playlist" required="" >
                        <option value="1">Popular Now</option>
                        <option value="2">Top Indonesian</option>
                        <option value="3">Best K-Pop</option>
                        <option value="4">Sad Song</option>
                        <option value="5">Recommended For Today</option>
                        <option value="6">#ThrowbackThursday</option>
                    </select>
                </div>

                <div class="textbox">
                    <i class='bx bx-user'></i>
                    <span >Nama Artis</span>
                    <input type="text" placeholder="Artist" name="artist" value="" required>
                </div>

                <div class="textbox">
                    <i class='bx bx-user'></i>
                    <span >Judul Lagu</span>
                    <input type="text" placeholder="Title" name="title" value="" required>
                </div>

                <div class="textbox">
                    <i class='bx bx-lock-alt'></i>
                    <span>Genre Lagu</span>
                    <select name="genre" required="">
                        <option value="Classic">Classic</option>
                        <option value="Blues">Blues</option>
                        <option value="Jazz">Jazz</option>
                        <option value="Country">Country</option>
                        <option value="Rock">Rock</option>
                        <option value="Pop">Pop</option>
                        <option value="Techno">Techno</option>
                        <option value="Balada">Balada</option>
                        <option value="Reggae">Reggae</option>
                        <option value="R&B">R&B</option>
                        <option value="Dangdut">Dangdut</option>
                        <option value="Death Metal">Death Metal</option>
                        <option value="Rap">Rap</option>
                        <option value="Hip Hop">Hip Hop</option>
                        <option value="Punk">Punk</option>
                        <option value="Electronics">Electronic</option>
                        <option value="Indie">Indie</option>
                        <option value="EDM">EDM</option>
                        <option value="Britpop">Britpop</option>
                        <option value="K-Pop">K-Pop</option>
                        <option value="Art Rock">Art Rock</option>
                        <option value="Eksperimental">Eksperimental</option>
                        <option value="Alternative Indie">Alternative Indie</option>
                        <option value="Dance">Dance</option>
                        <option value="Pop Rock">Pop Rock</option>
                    </select>
                </div>
                
                <div class="textbox">
                    <i class='bx bx-user'></i>
                    <span >Nama File Cover</span>
                    <input type="text" placeholder="file name" name="nama_cover" value="" required>
                </div>

                <div class="textbox">
                    <i class='bx bx-user'></i>
                    <span>Cover Lagu</span>
                    <input type="file" id="file" name="cover" required>
                </div>

                <button name="submit" class="btn">Add</button>
            
        </form>

        <?php
            if (isset($_POST['submit'])) {
                date_default_timezone_set('asia/kuala_lumpur');
                $playlist = $_POST['playlist'];
                $artist = htmlspecialchars($_POST['artist']);
                $title = htmlspecialchars($_POST['title']);
                $genre = htmlspecialchars($_POST['genre']);
                $waktu = date("m/d/y  H:i:s");
                $nama = htmlspecialchars($_POST['nama_cover']);
                $cover = $_FILES['cover']['name'];
                $x = explode('.', $cover);
                $extensi = strtolower(end($x));
                $gambar_baru = "$nama.$extensi";
                $temp = $_FILES['cover']['tmp_name'];
                

                $sql = mysqli_query($conn, "SELECT id, nama FROM artist WHERE nama = '$artist'");
                list($id, $nama_artist) = mysqli_fetch_array($sql);
                if (mysqli_fetch_assoc($sql)){
                    if(move_uploaded_file($temp, 'gambar/all_song/' .$gambar_baru)){
                        $query = mysqli_query($conn, "INSERT INTO `lagu` VALUES (0, '$id' ,'$title','$genre','$gambar_baru, '$waktu')");
                        $sql2 = mysqli_query($conn, "SELECT id_lagu FROM `lagu` WHERE judul = '$title'");
                        list($id_lagu) = mysqli_fetch_array($sql2);
                        $query2 = mysqli_query($conn, "INSERT INTO lagu_playlist VALUES (0, '$playlist','$id_lagu')");
                        if($query2){
                            echo "<script>alert('berhasil menambahkan lagu')
                                document.location.href = 'admin.php';
                            </script>";
                        }
                        else{
                            echo error_log($query);
                        }
                    }
                    else{
                        echo "<script>alert('terdapat kesalahan ketika menambahkan lagu')</script>";
                    }
                } else {
                    $artist2 = $artist;
                    if ($artist2 != $nama_artist) {
                    $query_1 = mysqli_query($conn, "INSERT INTO artist VALUES (0,'$artist2')");
                    }
                    if(move_uploaded_file($temp, 'gambar/all_song/' .$gambar_baru) ){
                        $sql1 = mysqli_query($conn, "SELECT id FROM artist WHERE nama = '$artist2'");
                        list($id_baru) = mysqli_fetch_array($sql1);
                        $query = mysqli_query($conn, "INSERT INTO `lagu` VALUES (0, '$id_baru' ,'$title','$genre','$gambar_baru', '$waktu')");
                        $sql2 = mysqli_query($conn, "SELECT id_lagu FROM `lagu` WHERE judul = '$title'");
                        list($id_lagu) = mysqli_fetch_array($sql2);
                        $query2 = mysqli_query($conn, "INSERT INTO lagu_playlist VALUES (0, '$playlist','$id_lagu')");
                        if($query2){
                            echo "<script>alert('berhasil menambahkan lagu')
                                    document.location.href = 'admin.php';
                            </script>";
                        }
                        else{
                            echo error_log($query);
                        }
                    }
                    else{
                        echo "<script>alert('terdapat kesalahan ketika menambahkan lagu')</script>";
                    }
                }
            }
        ?> 
        <br>Cancel add song? <a  class="daftar" href="admin.php" style="text-decoration:none">Back</a>
    </div>



</body>
</html>