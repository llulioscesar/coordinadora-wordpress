jQuery(document).ready(function($) {
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
                            <input type="number" value="${item.quantity}" min="1">
                            <span>$${(item.price * item.quantity).toFixed(2)}</span>
                        </div>
                    `;
                });
                $('#ssc-cart-items').html(cartItemsHtml);
                $('#ssc-subtotal').text(response.subtotal.toFixed(2));
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

    // Manejar la actualización del carrito
    $('#ssc-update-cart').click(function() {
        updateCart();
    });
});