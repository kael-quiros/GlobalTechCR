<?php
// Iniciar la sesión para acceder a $_SESSION
session_start();

// Verificar si es una solicitud POST y si se ha enviado el nombre del producto a eliminar
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_name'])) {
    $product_name = $_POST['product_name'];

    // Verificar si se pudo eliminar el producto del carrito
    if (eliminarProductoDelCarrito($product_name)) {
        // Calcular el total del carrito después de eliminar el producto
        $total = calcularTotal($_SESSION['carrito']);
        // Devolver una respuesta con un mensaje y el total actualizado
        echo json_encode(array("message" => "Producto eliminado del carrito correctamente.", "total" => $total));
        exit();
    } else {
        // Si hubo un error al eliminar el producto, devolver un mensaje 
        echo json_encode(array("message" => "Error al intentar eliminar el producto del carrito."));
        exit();
    }
} else {

    echo json_encode(array("message" => "Error en la solicitud."));
    exit();
}

// Función para eliminar un producto del carrito
function eliminarProductoDelCarrito($product_name)
{
    // Verificar si la sesión del carrito existe
    if (isset($_SESSION['carrito']) && is_array($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
        // Iterar sobre los productos en el carrito
        foreach ($_SESSION['carrito'] as $key => $producto) {
            // Verificar si existe el nombre del producto 
            if (isset($producto['name']) && $producto['name'] === $product_name) {
                // Eliminar el producto del carrito 
                unset($_SESSION['carrito'][$key]);
                return true; // Producto eliminado exitosamente
            }
        }
    }
    return false; // Producto no encontrado en el carrito
}

//  para calcular el total 
function calcularTotal($carrito)
{
    $total = 0.00;
    foreach ($carrito as $producto) {
        // Verificar si existe el precio del producto y sumarlo al total
        if (isset($producto['price'])) {
            $precio = $producto['price'];
            $total += $precio;
        }
    }
    // Formatear el total como número con dos decimales
    return number_format($total, 2);
}


?>




