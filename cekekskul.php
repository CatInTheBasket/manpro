<?php
$conn = new mysqli("localhost","root","","wordpress"); 

    if($conn->connect_errno){
        echo "Failed to connect.";
    }
	session_start();

	$id_ekskul= $_POST['ekskul'];
	
	$query = "Select nama from wp_murid LEFT JOIN murid_ekskul on wp_murid.id=murid_ekskul.id_murid where id_ekskul='$id_ekskul'";
	if($result = $conn->query($query)){
	while($row = $result->fetch_array()){
		echo "<br>".$row['nama'];
	}
	}
?>