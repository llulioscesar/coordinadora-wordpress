wp.blocks.registerBlockType('ssc/simple-shopping-cart', {
    title: 'Simple Shopping Cart',
    icon: 'cart',
    category: 'common',
    edit: function() {
        return wp.element.createElement('div', {}, 'Vista previa del carrito');
    },
    save: function() {
        return null; // Renderea en el lado del servidor
    },
});
