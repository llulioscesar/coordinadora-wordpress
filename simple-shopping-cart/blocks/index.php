<?php

function ssc_register_block_server() {
    register_block_type('ssc/simple-shopping-cart', array(
        'render_callback' => 'ssc_render_block',
    ));
}
add_action('init', 'ssc_register_block_server');

function ssc_render_block() {
    return do_shortcode('[simple_shopping_cart]');
}
