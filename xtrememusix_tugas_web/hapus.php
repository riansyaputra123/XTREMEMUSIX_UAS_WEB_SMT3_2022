<?php
    session_start();

    $section = '';
    $id ='';
    $section =$_GET['section'];
    $id =$_GET['id'];
    require 'koneksi.php';
    if($mulai = mysqli_query($conn, "DELETE FROM `$section` WHERE id_lagu = $id")){
        echo "<script>alert('data berhasil di hapus')
        document.location.href = 'admin.php';
        </script>";
    }
    else{
        echo "<script>alert('data tidak berhasil di hapus')</script>";
    }
?>