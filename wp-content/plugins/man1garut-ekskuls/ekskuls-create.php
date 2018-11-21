<?php

function man1garut_ekskuls_create() {
    $id = $_POST["id"];
    $name = $_POST["name"];
	$kuota = $_POST["kuota"];
	$status = $_POST["status"];
	$pembimbing= $_POST["pembimbing"];
	
    //insert
    if (isset($_POST['insert'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . "ekskul";

        $wpdb->insert(
                $table_name, //table
                array('name' => $name,'id' => $id,'kuota' => $kuota,'status_dibuka' => $status, 'id_pembimbing' => $pembimbing),
                array('%s'), //data format
                array('%s') //where format
        );
        $message.="Data berhasil ditambah";
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/man1garut-ekskuls/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Add New ekskul</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p>Three capital letters for the ID</p>
            <table class='wp-list-table widefat fixed'>
                <tr>
                    <th class="ss-th-width">ID</th>
                    <td><input type="text" name="id" value="<?php echo $id; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">ekskul</th>
                    <td><input type="text" name="name" value="<?php echo $name; ?>" class="ss-field-width" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">kuota</th>
                    <td><input type="text" name="kuota" value="<?php echo $kuota; ?>" class="ss-field-width" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">status_dibuka</th>
                    <td><input type="text" name="status" value="<?php echo $status; ?>" class="ss-field-width" /></td>
                </tr>
				<tr>
				<th class="ss-th-width">pembimbing</th>
                    <td><select name="pembimbing">
				<?php
				global $wpdb;
        $table_name = $wpdb->prefix . "pembimbing";
				        $rows = $wpdb->get_results("SELECT id,Nama_Pembimbing from $table_name");
						
foreach ($rows as $row){
echo "<option value=\"".$row->id."\"/>".$row->Nama_Pembimbing."</option>";
}


?>
</select></td></tr>
            </table>
            <input type='submit' name="insert" value='Save' class='button'>
        </form>
    </div>
    <?php
}