<?php 
		include "../conn.php";
		include 'skp.php';
        
		if($_POST['upload']){
			$ekstensi_diperbolehkan	= array('pdf');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
            $folder = "files/";
			$file_baru=$folder.basename($nama);
			$ket=$_POST['keterangan'];
			
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 111){			
					move_uploaded_file($file_tmp, $file_baru);
                    $sql="INSERT INTO SKP (nm_file,keterangan)  VALUES ('$nama','$ket')";
					$query=sqlsrv_query($conn,$sql);
					if($query){
						echo "<script>
						swal('Sak Josee!', 'Data Wes Kesimpen!', 'success')
						</script>";
					}else{
						echo 'GAGAL SLUR';
					}
				}else{
					echo "<script>
					swal('Kegeden file nya', 'Cilik aja to!', 'warning')
					</script>";
				}
			}else{
				echo 	"<script>
						swal('Salah Format mazehh', 'Kudu PDF tur Ukuran Cilik!', 'error')
						</script>";
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

 