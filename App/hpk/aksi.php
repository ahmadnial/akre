<?php 
		include "../../conn.php";
		include_once 'hpk.php';
        
		if($_POST['upload']){
			$ekstensi_diperbolehkan	= array('pdf');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
            $folder = "../../item/hpk_upload/";
			$file_baru=$folder.basename($nama);
			$ket=$_POST['keterangan'];
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1890000000000000){			
					move_uploaded_file($file_tmp, $file_baru);
                    $sql="INSERT INTO hpk (nm_file,keterangan)  VALUES ('$nama','$ket')";
					$query=sqlsrv_query($conn,$sql);
					if($query){
						// echo "<script> window.location.replace('skp.php') </script>";
						echo "<script>
						swal('Sak Josee!', 'Data Wes Kesimpen!', 'success').then( () => {
							location.href = 'hpk.php'
						})
						</script>";
	
					}else{
						echo "<script>
						swal('Rs iso lur!', 'Gagal,coba cek maneh file mu,koneksi utowo di refresh!', 'warning')
						</script>";
					}
				}else{
					echo "<script>
					swal('Kegeden file nya', 'Cilik aja to!', 'warning')
					</script>";
				}
			}else{
					echo "<script>
						swal('Salah Format mazehh', 'Kudu PDF tur Ukuran Cilik!', 'error')
						</script>";
						
						// echo "<script> window.location.href = window.location.href </script>";
			}
			
		}

		
// 	if(isset($_POST['upload']))
// 	{
//     $temp = $_FILES['file']['tmp_name'];
//     $name = rand(0,9999).$_FILES['file']['name'];
//     $size = $_FILES['file']['size'];
//     $type = $_FILES['file']['type'];
//     $folder = "files/";
//     if ($size < 204800000 and ($type =='pdf' or $type == 'docx')) {
//         move_uploaded_file($temp, $folder . $name);
//         $sql="INSERT INTO akre_internal (tgl_upload,nm_file)  VALUES ('', '$nama')";
// 		$query=sqlsrv_query($conn,$sql);
//         header('location:index.php');
//     }else{
//         echo "<b>Gagal Upload File</b>";
//     }
// }
		?>

 