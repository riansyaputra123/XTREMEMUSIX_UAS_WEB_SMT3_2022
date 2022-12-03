<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    $_SESSION['priv'] = "riannscarlezt";
    require "koneksi.php";
    $popular_now = mysqli_query($conn, "SELECT cover, judul, genre, nama FROM lagu_playlist
                        JOIN lagu ON lagu_playlist.id_lagu = lagu.id_lagu 
                        JOIN artist ON artist.id = lagu.id_artist
                        WHERE id_playlist = 1");
    $best_kpop = mysqli_query($conn, "SELECT cover, judul, genre, nama FROM lagu_playlist
                        JOIN lagu ON lagu_playlist.id_lagu = lagu.id_lagu 
                        JOIN artist ON artist.id = lagu.id_artist
                        WHERE id_playlist = 3");
    $top_indonesian = mysqli_query($conn, "SELECT cover, judul, genre, nama FROM lagu_playlist
                        JOIN lagu ON lagu_playlist.id_lagu = lagu.id_lagu 
                        JOIN artist ON artist.id = lagu.id_artist
                        WHERE id_playlist = 2");
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
            <a href="#about-me" class="user">
                <img src="gambar/logo-dessertskuy.jpg" alt="" class="user-img">
            </a>
            <div class="navbar">
                <a href="" class="nav-link">
                    <i class="bx bx-home"></i>
                    <span class="nav-link-title">Home</span>
                </a>
                <a href="#populer" class="nav-link">
                    <i class="bx bxs-hot"></i>
                    <span class="nav-link-title">Popular</span>
                </a>
                <a href="#about-me" class="nav-link">
                    <i class="bx bx-user"></i>
                    <span class="nav-link-title">About Us</span>
                </a>
                    <a href="proses_login.php" class= "nav-link" id= "login">
                    <i class="bx bx-user-circle"></i><span class="nav-link-title">Login</span>
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
        <img src="gambar/neckdeep.jpg" alt="" class="beranda-img" id="gambar1">
        <div class="beranda-teks">
            <h1 class="judul-beranda">Neck Deep - December</h1>
            <p>“December” is a slow, acoustic song about a breakup in the month of December.
                <br>
                It has become one of Neck Deep’s most successful tracks.</p>
            <audio id="audios1">
                <source src="musik/nd_december.mp3">
            </audio>
            <button style="font-size : 20px; background-color: #1e1e2a; border : none; outline : none; color: white;" id="btnplay" onclick="playpause1('icon');" class="tombol-ntn">
                <i id="icon" class="bx bx-caret-right-circle"></i>
                <span>Play Music </span>
            </button>
        </div>
    </section>

    <!--Section popular-->
    <section class="populer container" id="populer">
        <div class="head">
            <h2 class="judul-populer">Popular Now</h2>
        </div>
        

        <div class="list-music container">
        <?php $i = 0; while ($row = mysqli_fetch_assoc($popular_now)) :?>
                <div class="music">
                    <div class="music-image">
                        <img style="height : 100%" src="gambar/all_song/<?=$row['cover']?>" alt="">
                    </div>
                    <div class="music-text">
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
            </div>
      
        

        <div class="more">
            <a href="#" >Lainnya</a>
        </div>
    </section>

    <!--Section Top Indo-->
    <section class="populer container" id="indo">
        <div class="head">
            <h2 class="judul-populer">Top Indonesian</h2>
        </div>
        

        <div class="list-music container">

        <?php $i = 0; while ($row = mysqli_fetch_assoc($top_indonesian)) :?>
                <div class="music">
                    <div class="music-image">
                        <img style="height : 100%" src="gambar/all_song/<?=$row['cover']?>" alt="">
                    </div>
                    <div class="music-text">
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
            <a href="#" >Lainnya</a>
        </div>
    </section>


    <!--Section Best K-Pop -->
    <section class="populer container" id="kpop">
        <div class="head">
            <h2 class="judul-populer">Best K-Pop</h2>
        </div>
        

        <div class="list-music container">
        <?php $i = 0; while ($row = mysqli_fetch_assoc($best_kpop)) :?>
                <div class="music">
                    <div class="music-image">
                        <img style="height : 100%" src="gambar/all_song/<?=$row['cover']?>" alt="">
                    </div>
                    <div class="music-text">
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
            <a href="#" >Lainnya</a>
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
        var tombol = document.getElementById("tombol");

        tombol.onclick = function(){
            document.body.classList.toggle("white-mode");
        }

    </script>



    </body>
</html>