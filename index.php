<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Supermercado </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <?php include 'funciones.php'; ?>
    <div class="container">
        <h1 class="mb-3"> Detalle de compra </h1>
        <div class="border-bottom-3">
            <h2> Cofre de descuentos </h2>
            <table class="table">
                <thead>
                    <tr>
                        <th> Moneda </th>
                        <th> Cantidad </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $datosTablaCofreDescuentos = [
                        [
                            'nombre' => NOMBRE_ORO,
                            'imagen' => 'img/iconos/detalle/oro.png',
                            'texto' => 'Oro ($200)',
                        ],
                        [
                            'nombre' => NOMBRE_PLATA,
                            'imagen' => 'img/iconos/detalle/plata.png',
                            'texto' => 'Plata ($50)',
                        ],
                        [
                            'nombre' => NOMBRE_BRONCE,
                            'imagen' => 'img/iconos/detalle/bronce.png',
                            'texto' => 'Bronce ($10)',
                        ],
                    ];
                    $detalle = getDetalleXCofre($cofre);
                    foreach ($datosTablaCofreDescuentos as $datoTabla) :
                    ?>
                        <tr>
                            <td>
                                <img src="<?php echo $datoTabla['imagen']; ?>" alt="<?php echo $datoTabla['nombre']; ?>" />
                                <?php echo $datoTabla['texto']; ?>
                            </td>
                            <td>
                                <?php echo $detalle[$datoTabla['nombre']]; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td>
                            <img src="img/iconos/detalle/bonif.png" alt="Bonificación" />
                            Bonificación
                        </td>
                        <td>
                            <?php echo '$' . $detalle['bonif']; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="border-bottom-3">
            <h2> Productos </h2>
            <table class="table">
                <thead>
                    <tr>
                        <th> Cod </th>
                        <th> Detalle </th>
                        <th> Precio </th>
                        <th> Cantidad </th>
                        <th> Subtotal </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $descuento = 10;
                    $montoTotal = getMontoXProductos($productos);
                    $montoConDescuento = $montoTotal - ($montoTotal * $descuento / 100);
                    if ($montoConDescuento < 0) {
                        $montoConDescuento = 0;
                    }
                    foreach ($productos as $producto) :
                    ?>
                        <tr>
                            <td>
                                <img src="img/iconos/categorias/<?php echo $producto['icono'] ? $producto['icono'] : 'imagen.png'; ?>" alt="Imágen de <?php echo $producto['detalle']; ?>" />
                                <?php echo $producto['cod']; ?>
                            </td>
                            <td><?php echo $producto['detalle']; ?></td>
                            <td>$<?php echo number_format($producto['precio'], 2, ',', '.'); ?></td>
                            <td><?php echo $producto['cantidad']; ?></td>
                            <td>
                                $<?php echo number_format($producto['precio'] * $producto['cantidad'], 2, ',', '.'); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">
                            <?php if ($descuento > 0): ?>
                                <span class="text-muted text-decoration-line-through">
                                    Total: $<?php echo number_format($montoTotal, 2, ',', '.'); ?>
                                </span>
                                /
                                <span class="text-success fw-bold">
                                    Total con descuento: $<?php echo number_format($montoConDescuento, 2, ',', '.'); ?>
                                </span>
                            <?php else: ?>
                                Total: $<?php echo number_format($montoTotal, 2, ',', '.'); ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>