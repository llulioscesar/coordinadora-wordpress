<?php

class SSC_Cart {
    public static function init() {
        add_action('wp_ajax_ssc_get_cart', [__CLASS__, 'get_cart']);
        add_action('wp_ajax_nopriv_ssc_get_cart', [__CLASS__, 'get_cart']);
    }

    public static function get_cart() {
        // Simular datos del carrito con JSON
        $cart_items = [
            ['id' => 1, 'name' => 'Artículo 1', 'price' => 10.00, 'quantity' => 1],
            ['id' => 2, 'name' => 'Artículo 2', 'price' => 20.00, 'quantity' => 2],
        ];

        $subtotal = array_reduce($cart_items, function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

        $response = [
            'cart_items' => $cart_items,
            'subtotal' => $subtotal,
        ];

        wp_send_json($response);
    }
}