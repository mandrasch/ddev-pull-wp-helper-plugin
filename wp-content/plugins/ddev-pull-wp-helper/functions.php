<?php

/**
 * Plugin Name:       DDEV pull wp helper
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
        'DDEV pull wp helper',
        'DDEV pull wp helper',
        'manage_options',
        'ddev-pull-wp-helper', // page slug (options-general.php?page=wp-configure-cors-origin)
        __NAMESPACE__ . '\render_settings_page'
    );
}
add_action('admin_menu', __NAMESPACE__ . '\add_settings_page');

function render_settings_page()
{
?>
    <h2>DDEV pull wp helper</h2>
    <?php get_home_path(); ?>
<?php
}
