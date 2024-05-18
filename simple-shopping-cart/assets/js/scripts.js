jQuery(document).ready(function($) {
    function formatNumber(num) {
        // Convertir el número a string con formato adecuado
        const parts = num.toFixed(2).split(".");
        const integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        const decimalPart = parts[1] !== "00" ? `,${parts[1]}` : '';
        return integerPart + decimalPart;
    }

    function fetchCart() {
        $.ajax({
            url: ssc_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'ssc_get_cart'
            },
            success: function(response) {
                let cartItemsHtml = '';
                response.cart_items.forEach(item => {
                    cartItemsHtml += `
                        <div class="ssc-cart-item" data-id="${item.id}">
                            <span>${item.name}</span>
                            <span>${response.currency_symbol}${item.formatted_price} c/u</span>
                            <button class="ssc-quantity-decrease">-</button>
                            <input type="number" value="${item.quantity}" min="1" readonly>
                            <button class="ssc-quantity-increase">+</button>
                            <span>Total: ${response.currency_symbol}${item.formatted_total}</span>
                        </div>
                    `;
                });
                $('#ssc-cart-items').html(cartItemsHtml);
                $('#ssc-subtotal').text(response.currency_symbol + formatNumber(parseFloat(response.subtotal.replace('.', '').replace(',', '.'))));

                // Agregar eventos a los botones de incremento y decremento
                $('.ssc-quantity-decrease').click(function() {
                    const $input = $(this).siblings('input');
                    let quantity = parseInt($input.val(), 10);
                    if (quantity > 1) {
                        $input.val(quantity - 1);
                        updateCart();
                    } else {
                        $(this).closest('.ssc-cart-item').remove();
                        updateCart();
                    }
                });

                $('.ssc-quantity-increase').click(function() {
                    const $input = $(this).siblings('input');
                    let quantity = parseInt($input.val(), 10);
                    $input.val(quantity + 1);
                    updateCart();
                });
            }
        });
    }

    function updateCart() {
        const cartItems = [];
        $('#ssc-cart-items .ssc-cart-item').each(function() {
            const id = $(this).data('id');
            const quantity = $(this).find('input').val();
            cartItems.push({ id, quantity });
        });

        $.ajax({
            url: ssc_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'ssc_update_cart',
                cart_items: cartItems
            },
            success: function(response) {
                fetchCart();
            }
        });
    }

    // Inicializar el carrito
    fetchCart();
});