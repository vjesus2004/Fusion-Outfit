<?php
session_start();

if (isset($_SESSION['carrito']) || isset($_POST['titulo'])) {
    if (isset($_SESSION['carrito'])) {
        $carrito_mio = $_SESSION['carrito'];
    } else {
        $carrito_mio = array();
    }

    if (isset($_POST['titulo'])) {
        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $ref = $_POST['ref'];
        
        $encontrado = false;
        foreach ($carrito_mio as &$item) {
            if ($ref == $item['ref']) {
                $encontrado = true;
                $item['cantidad'] += $cantidad;
                break;
            }
        }
        
        if (!$encontrado) {
            $carrito_mio[] = array("titulo" => $titulo, "precio" => $precio, "cantidad" => $cantidad, "ref" => $ref);
        }
    }

    if (isset($_POST['cantidad'])) {
        $id = $_POST['id'];
        $cuantos = $_POST['cantidad'];
        
        if ($cuantos < 1) {
            unset($carrito_mio[$id]);
        } else {
            $carrito_mio[$id]['cantidad'] = $cuantos;
        }
    }

    if (isset($_POST['id2'])) {
        $id = $_POST['id2'];
        unset($carrito_mio[$id]);
    }

    $_SESSION['carrito'] = $carrito_mio;
}

header("Location: ".$_SERVER['HTTP_REFERER']);
?>