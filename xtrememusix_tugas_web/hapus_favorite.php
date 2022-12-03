<?php
    session_start();

    $section = '';
    $id ='';
    $section =$_GET['section'];
    $id =$_GET['id'];
    $idpl =$_GET['id1'];
    require 'koneksi.php';
    if($mulai = mysqli_query($conn, "DELETE FROM `$section` WHERE id_lagu = $id AND id_playlist = $idpl")){
        echo "<script>alert('data berhasil di hapus')
        document.location.href = 'admin.php';
        </script>";
    }
    else{
        echo "<script>alert('data tidak berhasil di hapus')</script>";
    }
?>