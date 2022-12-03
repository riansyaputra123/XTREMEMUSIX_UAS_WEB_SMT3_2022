<?php
session_start();

$id ='';
$id =$_GET['id'];
$idpl =$_GET['id1'];
require 'koneksi.php';

if ($query2 = mysqli_query($conn, "INSERT INTO lagu_playlist VALUES (0, '$idpl','$id')")) {
        echo "<script>alert('berhasil menambahkan ke favorit')
        document.location.href = 'user.php';
        </script>";
    }
    else{
        echo "<script>alert('data tidak berhasil di hapus')</script>";
    }

                            ?>