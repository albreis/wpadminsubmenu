<?php global $plugin_name;

$component = basename(dirname(__FILE__));
$component_name = 'Configurações';

add_action('admin_init', function() use ($plugin_name, $component, $component_name){
    register_setting("{$plugin_name}_settings", "{$plugin_name}_{$component}_instalado", []);
});

add_action("wp_ajax_{$plugin_name}_update_settings", function() use ($plugin_name, $component, $component_name){
    $data = json_decode(file_get_contents('php://input'));
    wp_send_json(update_option($data->key, $data->value));
});

add_action('admin_menu', function() use ($plugin_name, $component, $component_name){
    /**
     * Menu de configurações
     */
    add_submenu_page($plugin_name, $component_name, $component_name, 'manage_options', "{$plugin_name}-{$component}", function(){
        include dirname(__FILE__) . '/index.php';
    });
});


add_action( 'admin_enqueue_scripts', function() use ($plugin_name, $component, $component_name){
    wp_enqueue_style( "{$plugin_name}-{$component}-admin", plugin_dir_url( __FILE__ ) . 'admin.css', array(), time() );
    wp_enqueue_script( "{$plugin_name}-{$component}-admin", plugin_dir_url( __FILE__ ) . 'admin.js', array('jquery'), time() );
    wp_enqueue_style( "{$plugin_name}-{$component}-front", plugin_dir_url( __FILE__ ) . 'front.css', array(), time() );
    wp_enqueue_script( "{$plugin_name}-{$component}-front", plugin_dir_url( __FILE__ ) . 'front.js', array('jquery'), time() );
});

add_action( 'wp_enqueue_scripts', function() use ($plugin_name, $component, $component_name){
    wp_enqueue_style( "{$plugin_name}-{$component}-front", plugin_dir_url( __FILE__ ) . 'front.css', array(), time() );
    wp_enqueue_script( "{$plugin_name}-{$component}-front", plugin_dir_url( __FILE__ ) . 'front.js', array('jquery'), time() );
});