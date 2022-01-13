<?php

/**
 * Plugin Name:       DDEV Pull WP Helper
 * Plugin URI:        https://github.com/mandrasch/ddev-pull-wp-helper-plugin
 * Description:       
 * Version:           0.9
 * Author:            Matthias Andrasch
 * Author URI:        https://matthias-andrasch.eu
 * License:           CC0
 * License URI:       https://creativecommons.org/publicdomain/zero/1.0/legalcode
 * Text Domain:       ddev-pull-wp-helper
 * Domain Path:       /languages
 */

// Namespace
// https://wptavern.com/beyond-prefixing-a-wordpress-developers-guide-to-php-namespaces
// for action hooks: https://stevegrunwell.com/blog/php-namespaces-wordpress/

namespace DdevPullWpHelper;

// ======== SETTINGS ===========

// Settings page  by tutorial
// https://neliosoftware.com/blog/how-to-create-settings-page-in-wordpress/

function add_settings_page()
{
    add_options_page(
        'DDEV Pull WP helper',
        'DDEV Pull WP helper',
        'manage_options',
        'ddev-pull-wp-helper', // page slug (options-general.php?page=wp-configure-cors-origin)
        __NAMESPACE__ . '\render_settings_page'
    );
}
add_action('admin_menu', __NAMESPACE__ . '\add_settings_page');

function render_settings_page()
{
    if (!class_exists('WP_Debug_Data')) {
        require_once ABSPATH . 'wp-admin/includes/class-wp-debug-data.php';
    }
    $debugData = \WP_Debug_Data::debug_data(); // call via \ without namespace

    // Full = full value from debug data, 
    // Short = short value for .ddev/config.yaml
    $phpVersionFull = $debugData['wp-server']['fields']['php_version']['value'];
    $phpVersionShort = substr($phpVersionFull, 0, strpos($phpVersionFull, '.', strpos($phpVersionFull, '.') + 1)); // strip after second .
    $pathOnServer = $debugData['wp-paths-sizes']['fields']['wordpress_path']['value'];
    $databaseServerVersionFull = $debugData['wp-database']['fields']['server_version']['value'];
    $webServerTypeFull = $debugData['wp-server']['fields']['httpd_software']['value'];
    // TODO: $databaseServerVersionShort = 
    $activeThemeFolderFull = $debugData['wp-active-theme']['fields']['theme_path']['value'];
    $activeThemeFolderShort = substr($activeThemeFolderFull, strrpos($activeThemeFolderFull, '/') + 1)

?>
    <h2>DDEV Pull WP Helper</h2>
    <ul>
        <li><b>PHP version:</b> <?php echo $phpVersionShort; ?> [<?php echo $phpVersionFull; ?>]</li>
        <li><b>Database server version:</b> <?php echo $databaseServerVersionFull; ?> </li>
        <li><b>WebServer type:</b> <?php echo $webServerTypeFull; ?></li>
        <li><b>WordPress path on server:</b> <?php echo $pathOnServer ?></li>
        <li><b>Active theme folder:</b> <?php echo $activeThemeFolderShort; ?></li>
    </ul>
    <p><b>Great! Now that we have the data, we can start to setup DDEV: </p>
    <p><a href="">&raquo; Tutorial for ddev pull</a></b></p>
    <pre>
    <?php
    //print_r($debugData);
    ?>
    </pre>
<?php
}
