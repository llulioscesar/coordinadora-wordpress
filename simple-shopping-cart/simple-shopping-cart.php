<?php
/*
Plugin Name: Simple Shopping Cart
Description: Un plugin simple de carrito de compras para WordPress.
Version: 1.0
Author: Julio Cesar
*/

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

// Definir constantes del plugin
define('SSC_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SSC_PLUGIN_URL', plugin_dir_url(__FILE__));

// Incluir archivos necesarios
require_once SSC_PLUGIN_DIR . 'includes/class-ssc-cart.php';
require_once SSC_PLUGIN_DIR . 'includes/class-ssc-ajax-handler.php';

// Inicializar el plugin
function ssc_init() {
    SSC_Cart::init();
    SSC_Ajax_Handler::init();
}
add_action('init', 'ssc_init');

// Registrar los scripts y estilos del plugin
function ssc_enqueue_assets() {
    wp_enqueue_style('ssc-styles', SSC_PLUGIN_URL . 'assets/css/styles.css');
    wp_enqueue_script('ssc-scripts', SSC_PLUGIN_URL . 'assets/js/scripts.js', array('jquery'), null, true);
    wp_localize_script('ssc-scripts', 'ssc_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'ssc_enqueue_assets');

// Crear el shortcode para mostrar el carrito
function ssc_display_cart() {
    ob_start();
    ?>
    <div id="ssc-cart">
        <h2>Carrito de Compras</h2>
        <div id="ssc-cart-items"></div>
        <div id="ssc-cart-total">
            <strong>Subtotal:</strong> $<span id="ssc-subtotal">0.00</span>
        </div>
        <div id="ssc-cart-actions">
            <button id="ssc-update-cart">Actualizar Carrito</button>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('simple_shopping_cart', 'ssc_display_cart');