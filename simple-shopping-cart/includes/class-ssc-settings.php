<?php

class SSC_Settings {
    public static function init() {
        add_action('admin_menu', [__CLASS__, 'add_admin_menu']);
        add_action('admin_init', [__CLASS__, 'register_settings']);
    }

    public static function add_admin_menu() {
        add_menu_page(
            'Configuración del Carrito',
            'Carrito Configuración',
            'manage_options',
            'ssc_settings',
            [__CLASS__, 'settings_page'],
            'dashicons-cart',
            20
        );
    }

    public static function register_settings() {
        $default_cart_items = json_encode([
            ["id" => 1, "name" => "Artículo 1", "price" => 10.00, "quantity" => 1],
            ["id" => 2, "name" => "Artículo 2", "price" => 20.00, "quantity" => 2]
        ]);

        register_setting('ssc_settings_group', 'ssc_settings', [
            'default' => [
                'ssc_currency_symbol' => '$',
                'ssc_tax_rate' => 0,
                'ssc_cart_items' => $default_cart_items
            ]
        ]);

        add_settings_section(
            'ssc_settings_section',
            'Configuraciones del Carrito de Compras',
            null,
            'ssc_settings'
        );

        add_settings_field(
            'ssc_currency_symbol',
            'Símbolo de Moneda',
            [__CLASS__, 'currency_symbol_callback'],
            'ssc_settings',
            'ssc_settings_section'
        );

        add_settings_field(
            'ssc_tax_rate',
            'Tasa de Impuesto',
            [__CLASS__, 'tax_rate_callback'],
            'ssc_settings',
            'ssc_settings_section'
        );

        add_settings_field(
            'ssc_cart_items',
            'Ítems del Carrito (JSON)',
            [__CLASS__, 'cart_items_callback'],
            'ssc_settings',
            'ssc_settings_section'
        );
    }

    public static function settings_page() {
        ?>
        <div class="wrap">
            <h1>Configuraciones del Carrito de Compras</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('ssc_settings_group');
                do_settings_sections('ssc_settings');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public static function currency_symbol_callback() {
        $options = get_option('ssc_settings');
        ?>
        <input type="text" name="ssc_settings[ssc_currency_symbol]" value="<?php echo esc_attr($options['ssc_currency_symbol'] ?? '$'); ?>" />
        <?php
    }

    public static function tax_rate_callback() {
        $options = get_option('ssc_settings');
        ?>
        <input type="number" name="ssc_settings[ssc_tax_rate]" value="<?php echo esc_attr($options['ssc_tax_rate'] ?? 0); ?>" step="0.01" />
        <?php
    }

    public static function cart_items_callback() {
        $options = get_option('ssc_settings');
        ?>
        <textarea name="ssc_settings[ssc_cart_items]" rows="10" cols="50"><?php echo esc_textarea($options['ssc_cart_items'] ?? ''); ?></textarea>
        <?php
    }
}