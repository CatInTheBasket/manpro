<?php

function man1garut_ekskuls_update() {
    global $wpdb;
    $table_name = $wpdb->prefix . "ekskul";
    $id = $_GET["id"];
    $name = $_POST["name"];
	$kuota = $_POST["kuota"];
    $status = $_POST["status"];
	$pembimbing = $_POST["pembimbing"];
//update
    if (isset($_POST['update'])) {
		
        $wpdb->update(
                $table_name, //table
                array('name' => $name,'kuota' => $kuota,'status_dibuka' => $status, 'id_pembimbing' => $pembimbing),
				array('id' => $id),
                array('%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = %s", $id));
    } else {//selecting value to update	
        $ekskuls = $wpdb->get_results($wpdb->prepare("SELECT id,name,kuota,status_dibuka,id_pembimbing from $table_name where id=%s", $id));
        foreach ($ekskuls as $s) {
			$kuota =$s->kuota;
            $name = $s->name;
			$status = $s->status_dibuka;
			$pembimbing = $s->id_pembimbing;
        }
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/man1garut-ekskuls/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>ekskuls</h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>ekskul deleted</p></div>
            <a href="<?php echo admin_url('admin.php?page=man1garut_ekskuls_list') ?>">&laquo; Back to ekskuls list</a>

        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>ekskul updated</p></div>
            <a href="<?php echo admin_url('admin.php?page=man1garut_ekskuls_list') ?>">&laquo; Back to ekskuls list</a>

        <?php } else { ?>
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed'>
                    <tr><th>Name</th><td><input type="text" name="name" value="<?php echo $name; ?>"/></td></tr>
					                    <tr><th>Kuota</th><td><input type="number_format" name="kuota" value="<?php echo $kuota; ?>"/></td></tr>

										                    <tr><th>Status</th><td><input type="number_format" name="status" value="<?php echo $status; ?>"/></td></tr>
															<tr><th>Pembimbing</th><td><select name="pembimbing">
				<?php
				global $wpdb;
        $table_name = $wpdb->prefix . "pembimbing";
				        $rows = $wpdb->get_results("SELECT id,Nama_Pembimbing from $table_name");
						
foreach ($rows as $row){
  $data="";
  echo $row->id." BLAAA".$pembimbing;
  if($row->id==$pembimbing){
	  $data=" selected=\"selected\"";
  }
  else{
	  $data="";
  }
echo "<option value=\"".$row->id."\"".$data."/>".$row->Nama_Pembimbing."</option>";
}


?>
</select></td></tr>
                </table>
                <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
                <input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('Apakah anda yakin ingin menghapus data ekskul?')">
            </form>
        <?php } ?>

    </div>
    <?php
}