<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_name'])) {
    $product_name = $_POST['product_name'];

    if (eliminarProductoDelCarrito($product_name)) {
        $total = calcularTotal($_SESSION['carrito']);
        echo json_encode(array("message" => "Producto eliminado del carrito correctamente.", "total" => $total));
        exit();
    } else {
        echo json_encode(array("message" => "Error al intentar eliminar el producto del carrito."));
        exit();
    }
} else {
    echo json_encode(array("message" => "Error en la solicitud."));
    exit();
}

function eliminarProductoDelCarrito($product_name)
{
    if (isset($_SESSION['carrito']) && is_array($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
        foreach ($_SESSION['carrito'] as $key => $producto) {
            if (isset($producto['name']) && $producto['name'] === $product_name) {
                unset($_SESSION['carrito'][$key]);
                return true; // Producto eliminado exitosamente
            }
        }
    }
    return false; // Producto no encontrado en el carrito
}

function calcularTotal($carrito)
{
    $total = 0.00;
    foreach ($carrito as $producto) {
        if (isset($producto['price'])) {
            $precio = $producto['price'];
            $total += $precio;
        }
    }
    return number_format($total, 2);
}







