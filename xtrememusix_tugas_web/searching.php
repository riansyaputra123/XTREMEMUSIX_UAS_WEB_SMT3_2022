<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    // if ($_SESSION['priv'] != 'user'){
    //     header('Location: proses_login.php');
    // }
    // session_destroy();
    // header('proses_login.php');
    // $_SESSION['username'] = "riannscarlezt";
    require "koneksi.php";
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
                    <input type="search" name="search" id="search-input" placeholder="Search music">
                    <button type="submit" name="cari"> <i class="bx bx-search" ></i></button>
                </div>
            </form>
            <?php
                if (isset($_GET['cari'])){
                    $keyword = $_GET['search'];
                    $result = mysqli_query($conn, "SELECT * FROM lagu 
                    JOIN artist ON artist.id = lagu.id_artist 
                    WHERE judul LIKE '%$keyword%' or genre LIKE '%$keyword%' or nama LIKE '%$keyword%'");
                } else {
                    $result = mysqli_query($conn, "SELECT * FROM lagu");
                    
                }
                $pencarian = [];
                while ($row = mysqli_fetch_array($result)) {
                    $pencarian[] = $row;
                }
            ?>
            <a href="#about-me" class="user">
                <img src="gambar/logo-dessertskuy.jpg" alt="" class="user-img">
            </a>
            <?php
                if ($_SESSION['priv'] == 'user') {
                echo (    
                '
                <div class="navbar">
                <a href="user.php" class="nav-link">
                    <i class="bx bx-home"></i>
                    <span class="nav-link-title">Home</span>
                </a>
                <a href="" class="nav-link">
                    <i class="bx bxs-book-heart"></i>
                    <span class="nav-link-title">Favorite</span>
                </a>
                <a href="#about-me" class="nav-link">
                    <i class="bx bx-user"></i>
                    <span class="nav-link-title">About Us</span>
                </a>');
                

            } else if ($_SESSION['priv'] == 'admin') {
                echo (
                '
                <div class="navbar">
                <a href="admin.php" class="nav-link">
                    <i class="bx bx-home"></i>
                    <span class="nav-link-title">Home</span>
                </a>
                <a href="input_admin.php" class="nav-link">
                    <i class="bx bx-list-plus"></i>
                    <span class="nav-link-title">Manage</span>
                </a>
                <a href="pilih_list.php" class="nav-link">
                    <i class="bx bxs-playlist"></i>
                    <span class="nav-link-title">List Song</span>
                </a>
                ');
            } else {
                echo (
                '
                <div class="navbar">
                <a href="index.php" class="nav-link">
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
                ');
            }
            ?>
                
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
    <section class="beranda container">

            <table >
                <tr>
                    <th>Cover</th>
                    <th>Artis</th>
                    <th>Judul</th>
                    <th>Genre</th>

                </tr>
                <?php $i = 0; foreach ($pencarian as $pop_song):?>
                <tr class= "hasil-pencarian"><a href="">
                    <td size= ><img src="gambar/all_song/<?= $pop_song['cover'] ?>" width="70" height="60"></td>
                    <td ><?php echo $pop_song["nama"] ;?></td>
                    <td ><?php echo $pop_song["judul"] ;?></td>
                    <td><?php echo $pop_song["genre"] ;?></td>
                </tr></a>
                
                <?php $i++; endforeach;?>
            </table>
            <?php if ($i < 1) {
                echo '
                <div class="text-cari">
                    <p align="center"><h1>No result found</h1></p>
                </div>'; 
            } ?>
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
    <script>
        var tombol = document.getElementById("tombol");

        tombol.onclick = function(){
            document.body.classList.toggle("white-mode");
        }

    </script>


    </body>
</html>