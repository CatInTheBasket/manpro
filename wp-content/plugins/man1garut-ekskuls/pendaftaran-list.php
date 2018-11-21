<?php

function man1garut_pendaftaran_list() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/man1garut-ekskuls/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Pendaftaran</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "pendaftaran";

        $rows = $wpdb->get_results("SELECT ID,id_murid,id_ekskul,status from $table_name");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
                <th class="manage-column ss-list-width">ID</th>
                <th class="manage-column ss-list-width">ID Murid</th>
				<th class="manage-column ss-list-width">ID Ekskul</th>
                <th class="manage-column ss-list-width">Status</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $row->ID; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->id_murid; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->id_ekskul; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->status; ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=man1garut_pendaftaran_update&id=' . $row->ID); ?>">Update</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php
}