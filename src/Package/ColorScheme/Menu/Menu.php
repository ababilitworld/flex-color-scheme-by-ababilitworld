<?php
namespace Ababilitworld\FlexColorSchemeByAbabilitworld\Package\ColorScheme\Menu;

(defined( 'ABSPATH' ) && defined( 'WPINC' )) || exit();

use Ababilitworld\{
    FlexTraitByAbabilitworld\Standard\Standard,
    FlexColorSchemeByAbabilitworld\Package\ColorScheme\ColorScheme as ColorScheme,
};

use const Ababilitworld\FlexColorSchemeByAbabilitworld\{
    PLUGIN_NAME,
    PLUGIN_DIR,
    PLUGIN_URL,
    PLUGIN_FILE,
    PLUGIN_VERSION
};

if ( ! class_exists( __NAMESPACE__.'\Menu' ) ) 
{
    /**
     * Class Menu
     *
     * @package Ababilitworld\FlexColorSchemeByAbabilitworld
     */
    class Menu 
    {
        use Standard;

        public function __construct() 
        {
            add_action('admin_menu', [$this, 'admin_menu']);
        }

        public function admin_menu() 
        {
            add_menu_page(
                'Theme Settings',
                'Theme Settings',
                'manage_options',
                'theme-settings',
                [$this, 'theme_settings_page'],
                'dashicons-admin-customizer',
                60
            );
    
            add_submenu_page(
                'theme-settings',
                'Color Schemes',
                'Color Schemes',
                'manage_options',
                'edit.php?post_type=color_scheme'
            );
    
            add_submenu_page( 
                'theme-settings',
                'Active Color Scheme',
                'Active Color Scheme',
                'manage_options',
                'active-color-scheme',
                [$this, 'active_color_scheme_page']
            );
        }

        
    }

}
	