<?php

class SSC_Cart {
    public static function init() {
        add_action('wp_ajax_ssc_get_cart', [__CLASS__, 'get_cart']);
        add_action('wp_ajax_nopriv_ssc_get_cart', [__CLASS__, 'get_cart']);
    }

    public static function get_cart() {
        $options = get_option('ssc_settings');
        $currency_symbol = $options['ssc_currency_symbol'] ?? '$';
        $tax_rate = $options['ssc_tax_rate'] ?? 0;
        $cart_items = json_decode($options['ssc_cart_items'] ?? json_encode([
            ["id" => 1, "name" => "Artículo 1", "price" => 10.00, "quantity" => 1],
            ["id" => 2, "name" => "Artículo 2", "price" => 20.00, "quantity" => 2]
        ]), true);

        $subtotal = array_reduce($cart_items, function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

        $total_with_tax = $subtotal * (1 + $tax_rate / 100);

        $response = [
            'cart_items' => $cart_items,
            'subtotal' => number_format($total_with_tax, 2),
            'currency_symbol' => $currency_symbol,
        ];

        wp_send_json($response);
    }
}