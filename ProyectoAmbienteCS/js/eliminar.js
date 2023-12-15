document.addEventListener('DOMContentLoaded', function() {
    const eliminarBotones = document.querySelectorAll('.eliminarProducto');

    if (eliminarBotones) {
        eliminarBotones.forEach(boton => {
            boton.addEventListener('click', function(event) {
                event.preventDefault();
                const nombreProducto = this.getAttribute('data-producto');
                eliminarProducto(nombreProducto);
            });
        });
    } else {
        console.error('No se encontraron botones para eliminar productos.');
    }

    function eliminarProducto(nombreProducto) {
        console.log('Botón eliminar clickeado para:', nombreProducto);
        fetch('eliminarProducto.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `product_name=${encodeURIComponent(nombreProducto)}`
        })
        .then(response => {
            if (response.ok) {
                // Redireccionar a la página del carrito después de eliminar el producto
                window.location.href = 'shoppingCart.php';
            }
            throw new Error('Error al eliminar el producto');
        })
        .catch(error => {
            console.error(error.message);
        });
    }
    
});
