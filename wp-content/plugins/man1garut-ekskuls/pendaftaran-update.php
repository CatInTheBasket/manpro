<?php

function man1garut_pendaftaran_update() {
    global $wpdb;
    $table_name = $wpdb->prefix . "pendaftaran";
    $id = $_GET["id"];
    $status = $_POST["status"];
	    $murid =$_POST["murid"];

		    $ekskul =$_POST["ekskul"];

//update
    if (isset($_POST['update'])) {
		if($status==1){
			$conn = new mysqli("localhost","root","","wordpress"); 
			if($conn->connect_errno){
        echo "Failed to connect.";
    }
$query = "INSERT INTO murid_ekskul(id_murid, id_ekskul) VALUES ($murid,'$ekskul')";
	if($result = $conn->query($query)){

	}
		}
		else{
			$wpdb->query($wpdb->prepare("DELETE FROM murid_ekskul WHERE id_murid = %s AND id_ekskul= \"$ekskul\"", $murid));
			//echo "Delete command initiated";
			//		echo "DELETE FROM murid_ekskul WHERE id_murid=%s AND id_ekskul= \"$ekskul\"".$murid;

		}
        $wpdb->update(
                $table_name, //table
                array('status' => $status), //data
                array('ID' => $id), //where
                array('%s'), //data format
                array('%s') //where format
        );
		
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE ID = '%s'", $id));
		echo "Delete command initiated";
		echo "DELETE FROM murid_ekskul WHERE id_murid=%s AND id_ekskul= \"$id_ekskul\"".$murid;
					$wpdb->query($wpdb->prepare("DELETE FROM murid_ekskul WHERE id_murid=%s AND id_ekskul= \"$id_ekskul\"", $murid));

    } else {//selecting value to update	
        $ekskuls = $wpdb->get_results($wpdb->prepare("SELECT ID,id_murid,id_ekskul,status from $table_name where ID=%s", $id));
       foreach ($ekskuls as $s) {
			$status = $s->status;
			$murid = $s->id_murid;
			$ekskul = $s->id_ekskul;
			
	   }

        
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/man1garut-ekskuls/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Pendaftaran</h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>ekskul deleted</p></div>
            <a href="<?php echo admin_url('admin.php?page=man1garut_pendaftaran_list') ?>">&laquo; Back to ekskuls list</a>

        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>ekskul updated</p></div>
            <a href="<?php echo admin_url('admin.php?page=man1garut_pendaftaran_list') ?>">&laquo; Back to ekskuls list</a>

        <?php } else { ?>
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed'><tr><th>Status</th><td><input type="number_format" name="status" value="<?php echo $status; ?>"/></td>
				<td><input type="hidden" name="murid" value="<?php echo $murid; ?>"/></td>
				<td><input type="hidden" name="ekskul" value="<?php echo $ekskul; ?>"/></td>
				</tr>
                </table>
                <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
                <input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('Apakah Anda yakin ingin menolak permintaan pendaftaran?')">
            </form>
        <?php } ?>

    </div>
    <?php
}