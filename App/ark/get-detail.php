<?php
    if(isset($_GET['id_karyawan'])){
        $id_karyawan    =$_GET['id_karyawan'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include "koneksi.php";
    $query    =mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE id_karyawan='$id_karyawan'");
    $result    =mysqli_fetch_array($query);
?>