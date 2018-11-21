<?php

function man1garut_ekskuls_list() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/man1garut-ekskuls/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>ekskuls</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=man1garut_ekskuls_create'); ?>">Add New</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "ekskul";

        $rows = $wpdb->get_results("SELECT id,name,kuota,status_dibuka,id_pembimbing from $table_name");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
                <th class="manage-column ss-list-width">ID</th>
                <th class="manage-column ss-list-width">Name</th>
				<th class="manage-column ss-list-width">Kuota</th>
                <th class="manage-column ss-list-width">Status</th>
				<th class="manage-column ss-list-width">Pembimbing</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $row->id; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->name; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->kuota; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->status_dibuka; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->id_pembimbing; ?></td>

                    <td><a href="<?php echo admin_url('admin.php?page=man1garut_ekskuls_update&id=' . $row->id); ?>">Update</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php
}