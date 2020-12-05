<?php
/**
* The plugin bootstrap file
*
* @link              https://gianko.com
* @since             1.0.0
* @package           Gianko_Age_Verification
*
* @wordpress-plugin
* Plugin Name:       Verificación de Edad Pro
* Plugin URI:        https://gianko.com
* Description:       Verifique la edad de los visitantes antes de permitirles ver su sitio web. Traído a usted por <a href = 'https://gianko.com/' target = '_blank'>Gianko</a>
* Version:           1.0.0
* Author:            gianko
* Author URI:        https://gianko.com
* License:           GPL-2.0+
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain:       gianko-age-verification
* Domain Path:       /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
* The code that runs during plugin activation.
* This action is documented in includes/class-gianko-age-verification-activator.php
*/

function activate_gianko_age_verification() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-gianko-age-verification-activator.php';
    Gianko_Age_Verification_Activator::activate();
}

/**
* The code that runs during plugin deactivation.
* This action is documented in includes/class-gianko-age-verification-deactivator.php
*/

function deactivate_gianko_age_verification() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-gianko-age-verification-deactivator.php';
    Gianko_Age_Verification_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gianko_age_verification' );
register_deactivation_hook( __FILE__, 'deactivate_gianko_age_verification' );

/**
* The core plugin class that is used to define internationalization,
* admin-specific hooks, and public-facing site hooks.
*/
require plugin_dir_path( __FILE__ ) . 'includes/class-gianko-age-verification.php';

/**
* Begins execution of the plugin.
*
* Since everything within the plugin is registered via hooks,
* then kicking off the plugin from this point in the file does
* not affect the page life cycle.
*
* @since    1.0.0
*/

function run_gianko_age_verification() {

    $plugin = new Gianko_Age_Verification();
    $plugin->run();

}
run_gianko_age_verification();

/**
* Add Go Pro link on plugin page
*
* @since 2.2
* @param array $links an array of links related to the plugin.
* @return array updatead array of links related to the plugin.
*/

function gianko_pro_link( $links ) {
    // Pro link.
    $pro_link = '<a href="https://gianko.com" target="_blank" style="font-weight:700;">' . esc_attr__( 'gianko.com', 'gianko-age-verification' ) . '</a>';

    if ( ! function_exists( 'run_avwp_pro' ) ) {
        array_unshift( $links, $pro_link );
    }
    return $links;
}

$pluginname = plugin_basename( __FILE__ );

add_filter( "plugin_action_links_$pluginname", 'gianko_pro_link' );