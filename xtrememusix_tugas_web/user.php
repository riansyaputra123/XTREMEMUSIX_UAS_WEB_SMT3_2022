<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    if ($_SESSION['priv'] != 'user'){
        header('Location: proses_login.php');
    }
    // session_destroy();
    // header('proses_login.php');
    // $_SESSION['username'] = "riannscarlezt";
    require "koneksi.php";
    $id_us = $_SESSION['id'];
    $sqlpl = mysqli_query($conn, "SELECT id_playlist FROM playlist WHERE id_user = '$id_us'");
    list($idpl) = mysqli_fetch_array($sqlpl);
    $recommended = mysqli_query($conn, "SELECT lagu.id_lagu as id_musik, cover, judul, genre, nama FROM lagu_playlist
                                    JOIN lagu ON lagu_playlist.id_lagu = lagu.id_lagu 
                                    JOIN artist ON artist.id = lagu.id_artist
                                    WHERE id_playlist = 5");
    $sad_song = mysqli_query($conn, "SELECT lagu.id_lagu as id_musik, cover, judul, genre, nama FROM lagu_playlist
                                    JOIN lagu ON lagu_playlist.id_lagu = lagu.id_lagu 
                                    JOIN artist ON artist.id = lagu.id_artist
                                    WHERE id_playlist = 4");
    $throwback = mysqli_query($conn, "SELECT lagu.id_lagu as id_musik, cover, judul, genre, nama FROM lagu_playlist
                                    JOIN lagu ON lagu_playlist.id_lagu = lagu.id_lagu 
                                    JOIN artist ON artist.id = lagu.id_artist
                                    WHERE id_playlist = 6");
?>
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Xtrememusix
    </title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="icon" href="gambar/icons-dessert.ico">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="nav container">
            <a href="" class="logo" id="warna">
            <span>x</span>treme<span>musi</span><span>x</span>
            </a>
            <form action="searching.php" method="GET">
                <div class="search-box">
                    <input type="search" name="search" id="search-input" placeholder="Search music" autocomplete="off">
                    <button type="submit" name="cari"> <i class="bx bx-search"></i></button>
                </div>
            </form>
            <?php
                // if (isset($_GET['cari'])){
                //     $keyword = $_GET['search'];
                //     $result = mysqli_query($conn, "SELECT * FROM popular_now WHERE judul LIKE '%$keyword%' or genre LIKE '%$keyword%'");
                // } else {
                //     $result = mysqli_query($conn, "SELECT * FROM popular_now");
                // }
                // $pencarian = [];
                // while ($row = mysqli_fetch_array($result)) {
                //     $pencarian[] = $row;
                // }
            ?>
            <a href="#about-me" class="user">
                <img src="gambar/logo-dessertskuy.jpg" alt="" class="user-img">
            </a>
            <div class="navbar">
                <a href="" class="nav-link">
                    <i class="bx bx-home"></i>
                    <span class="nav-link-title">Home</span>
                </a>
                <a href="favorite.php?id=<?php echo $_SESSION["id"]; ?>" class="nav-link">
                    <i class='bx bxs-book-heart'></i>
                    <span class="nav-link-title">Favorite</span>
                </a>
                <a href="#about-me" class="nav-link">
                    <i class="bx bx-user"></i>
                    <span class="nav-link-title">About Us</span>
                </a>
                
                    <?php if (!isset($_SESSION["username"])){
                        echo(
                            '<a href="proses_login.php" class= "nav-link" id= "login">
                    <i class="bx bx-user-circle"></i><span class="nav-link-title">Login</span>');
                    } else {
                        echo(
                            '<a href="proses_keluar.php" class= "nav-link" id= "lgout">
                    <i class="bx bx-user-circle"></i><span class="nav-link-title">Logout</span>');
                    }?>
                    
                </a>
                <label>
                    <input type="checkbox" class="checkbox" id="tombol">
                    <span class="check"></span>
                </label>
            </div>
        </div>
    </header>
    <!--Section Beranda-->
    <section class="beranda container" id="beranda">
        <img src="gambar/just.png" alt="" class="beranda-img" id="gambar1">
        <div class="beranda-teks">
            <h1 class="judul-beranda">The Chainsmokers & Coldplay - Something Just Like This</h1>
            <p>“Something Just Like This” is a song recorded and performed by The Chainsmokers (an American EDM-pop duo)
                <br>
                and the British rock band Coldplay. According to the Chainsmokers, the lyrics of the song are about
                <br>
                a romantic relationship between two people that does not necessarily have to be “superhumanly perfect” to work.
            </p>
            <audio id="audios">
                <source src="musik/cs_something.mp3">
            </audio>
            <button style="font-size : 20px; background-color: #1e1e2a; border : none; outline : none; color: white;" id="btnplay" onclick="playpause('icon');" class="tombol-ntn">
                <i id="icon" class="bx bx-caret-right-circle"></i>
                <span>Play Music </span>
            </button>
        </div>
    </section>

    <!--Section Based on your recent listening-->
    <section class="populer container" id="based">
        <div class="head">
            <h2 class="judul-populer">Recommended For Today</h2>
        </div>
        

        <div class="list-music container">
                <?php $i = 0; while ($row = mysqli_fetch_assoc($recommended)) :?>
                <div class="music">
                    <div class="music-image">
                        <img style="height : 100%" src="gambar/all_song/<?=$row['cover']?>" alt="">
                    </div>
                    <div class="music-text">
                    <div class="bookmark">
                    <span><a style="color: #000;" href="tambah_favorite.php?id=<?php echo $row['id_musik'];?>&id1=<?php echo $idpl ;?>" class='bx bxs-heart'></a></span>
                        </div>
                        <div class="judul">
                            <span> <i class='bx bx-play'></i></span>
                            <h3><?=$row['nama']?> - <?=$row['judul']?></h3>
                        </div>
                        <div class="genre">
                            <p><?=$row['genre']?></p>
                        </div>
                    </div>
                </div>
                <?php ; $i++; if ($i > 3): break;endif;endwhile;?>
            </div>
      
        

        <div class="more">
            <a href="#movies" >Lainnya</a>
        </div>
    </section>

    <!--Section #Sad Song-->
    <section class="populer container" id="sadsong">
        <div class="head">
            <h2 class="judul-populer">Sad Song</h2>
        </div>
        

        <div class="list-music container">
        <?php $i = 0; while ($row = mysqli_fetch_assoc($sad_song)) :?>
                <div class="music" >
                    <div class="music-image">
                        <img style="height : 100%" src="gambar/all_song/<?=$row['cover']?>" alt="">
                    </div>
                    <div class="music-text">
                    <div class="bookmark">
                    <span><a style="color: #000;" href="tambah_favorite.php?id=<?php echo $row['id_musik'];?>&id1=<?php echo $idpl ;?>" class='bx bxs-heart'></a></span>
                        </div>
                        <div class="judul">
                            <span> <i class='bx bx-play'></i></span>
                            <h3><?=$row['nama']?> - <?=$row['judul']?></h3>
                        </div>
                        <div class="genre">
                            <p><?=$row['genre']?></p>
                        </div>
                    </div>
                </div>
                <?php ; $i++; if ($i > 3): break;endif;endwhile;?>
            </div>
                    
        

        <div class="more">
            <a href="#movies" >Lainnya</a>
        </div>
    </section>


    <!--Section #ThrowbackThursday -->
    <section class="populer container" id="throwback">
        <div class="head">
            <h2 class="judul-populer">#ThrowbackThursday</h2>
        </div>
        

        <div class="list-music container">
        <?php $i = 0; while ($row = mysqli_fetch_assoc($throwback)) :?>
                <div class="music">
                    <div class="music-image">
                        <img style="height : 100%" src="gambar/all_song/<?=$row['cover']?>" alt="">
                    </div>
                    <div class="music-text">
                    <div class="bookmark">
                    <span><a style="color: #000;" href="tambah_favorite.php?id=<?php echo $row['id_musik'];?>&id1=<?php echo $idpl ;?>" class='bx bxs-heart'></a></span>
                        </div>
                        <div class="judul">
                            <span> <i class='bx bx-play'></i></span>
                            <h3><?=$row['nama']?> - <?=$row['judul']?></h3>
                        </div>
                        <div class="genre">
                            <p><?=$row['genre']?></p>
                        </div>
                    </div>
                </div>
                <?php ; $i++; if ($i > 3): break;endif;endwhile;
                
                
                ?>
            </div>
                    
        

        <div class="more">
            <a href="#movies" >Lainnya</a>
        </div>
    </section>

    <footer id="about-me">
    <div class="footer container">
            <h1 align="center">About Us</h1><br>
            <div class="img"></div>
            <div class="text">Rian Syaputra<span> Ainun Naim</span></div</div>
        <p class="desc"> Hallo!, nama saya Rian. Saya adalah CEO website ini, silahkan dukung website ini dengan cara menon-aktifkan AdBlock browser kalian. Enjoy the music!.</p>
        </div>
        <div class="sosmed-footer" align="center">
            <div><a target="blank" href="https://www.instagram.com/riannscarlezt/" class="nav-link">
                <i class="bx bxl-instagram" ></i>
                <span class="sosmed-range">Instagram  </span>
            </a>
            </div>
            <div><a target="blank" href="https://wa.wizard.id/913782" class="nav-link">
                <i class="bx bxl-whatsapp"></i>
                <span class="sosmed-range">  WhatsApp</span>
                <a/>
            </div>
        </div>
    </footer>
    <script src="javascript.js"></script>
    <script src="playmusic.js"></script>
    <script>
        var tombols = document.getElementById("tombol");

        tombols.onclick = function(){
            document.body.classList.toggle("white-mode");
        }

    </script>
    <script>
        var tombol = document.getElementById("like");

        tombol.onclick = function(){
            document.body.classList.toggle("like-color");
        }

    </script>

    </body>
</html>