<?php
$conn = new mysqli("localhost","root","","wordpress"); 

    if($conn->connect_errno){
        echo "Failed to connect.";
    }
	session_start();

	$nama = $_POST['name'];
	$id_ekskul= $_POST['ekskul'];
	$id=$_POST['murid'];
	
	$query = "Select id from wp_murid where nama='$nama'";
	if($result = $conn->query($query)){
	$murid;
			
	if(isset($id)){
		$murid=$id;
	}
	else{
	while($row = $result->fetch_array()){
		$murid=$row['id'];
	}
	}

	if(isset($murid)){

	$query = "Select * from wp_pendaftaran where id_murid=$murid AND id_ekskul='$id_ekskul'";
	
	if($result = $conn->query($query)){

		if (mysqli_num_rows($result) == 0) {
			$query = "Select kuota from wp_ekskul where id='$id_ekskul'";
			$jumlah;
			if($result = $conn->query($query)){
				foreach ($result as $row){

					$jumlah=$row['kuota'];
					
					
					$query = "Select * from murid_ekskul where id_ekskul='$id_ekskul'";
					if($result = $conn->query($query)){
						//echo $jumlah."blaa".mysqli_num_rows($result);
			if(mysqli_num_rows($result)<$jumlah){
			
			$query = "Insert Into wp_pendaftaran(id_murid,id_ekskul,status) VALUES($murid,'$id_ekskul',0)";
			if($result = $conn->query($query)){
				//"Success";
				if(isset($id)){
					header("Location: http://localhost/manpro/wordpress/pembimbing/");
				}
				else{
				header("Location: http://localhost/manpro/wordpress/daftar-ekstrakulikuler/");
				}
			}
			else{
				echo "Pendaftaran gagal";
				//header("Location: http://localhost/manpro/wordpress/daftar-ekstrakulikuler/");
			}
			}
			else{
				echo "Ekstrakulikuler sudah penuh";
			}
			}
			else{
				$query = "Insert Into wp_pendaftaran(id_murid,id_ekskul,status) VALUES($murid,'$id_ekskul',0)";
			if($result = $conn->query($query)){
				//"Success";
				header("Location: http://localhost/manpro/wordpress/daftar-ekstrakulikuler/");
			}
			}
				}
			}			
			else{
				echo "Ekstrakulikuler sudah penuh";
			}
		}
			
		 else { 
			echo "Anda sudah pernah mendaftar";
		//header("Location: http://localhost/manpro/wordpress/daftar-ekstrakulikuler/");
		}  
		
	}
		
	
	
	


	
	}
	else{
		echo "Identitas tidak ditemukan";
	}
	}
?>