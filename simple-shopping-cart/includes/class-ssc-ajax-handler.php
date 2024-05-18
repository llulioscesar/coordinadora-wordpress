<?php

class SSC_Ajax_Handler {
    public static function init() {
        add_action('wp_ajax_ssc_update_cart', [__CLASS__, 'update_cart']);
        add_action('wp_ajax_nopriv_ssc_update_cart', [__CLASS__, 'update_cart']);
    }

    public static function update_cart() {
        // Aquí puedes agregar lógica para actualizar el carrito
        // Este ejemplo simplemente retorna el carrito simulado
        SSC_Cart::get_cart();
    }
}