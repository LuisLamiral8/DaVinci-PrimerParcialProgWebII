<?php
define("NOMBRE_ORO", "oro");
define("NOMBRE_PLATA", "plata");
define("NOMBRE_BRONCE", "bronce");
define("VALOR_ORO", 200);
define("VALOR_PLATA", 50);
define("VALOR_BRONCE", 10);

$cofre = [
    'oro',
    'plata',
    'bronce',
    'bronce',
    'oro'
];

$productos = [
    [
        'cod' => 111,
        'precio' => 800,
        'cantidad' => 3,
        'detalle' => 'Coca Cola 1.5LT',
        'icono' => 'bebidas.png',
    ],
    [
        'cod' => 222,
        'precio' => 100,
        'cantidad' => 1,
        'detalle' => 'Azúcar Ledesma',
        'icono' => 'comidas.png',
    ],
    [
        'cod' => 333,
        'precio' => 800,
        'cantidad' => 2,
        'detalle' => 'Servilletas Elegante 3 rollos',
        'icono' => 'limpieza.png',
    ],
    [
        'cod' => 444,
        'precio' => 250,
        'cantidad' => 1,
        'detalle' => 'Alcohol etílico',
        'icono' => null,
    ],
    [
        'cod' => 555,
        'precio' => 5000,
        'cantidad' => 2,
        'detalle' => 'Papas Pringles',
        'icono' => 'comidas.png',
    ],
    [
        'cod' => 789,
        'precio' => 80000,
        'cantidad' => 1,
        'detalle' => 'Licuadora',
        'icono' => 'electro.png',
    ],
];

//Ejercicio 1
#$dinero = getBonifXCofre($cofre);
#echo "Ejercicio 1, el dinero es: ", +$dinero;
//#

//Ejercicio 2
#$detalle = getDetalleXCofre($cofre);
#echo '<br> Ejercicio 2, el detalle es: <pre>';
#var_dump($detalle);
#echo '</pre>';
//#

//Ejercicio 3
#$monto = getMontoXProductos($productos);
#echo "<br> Ejercicio 3, monto es: ", +$monto;
//#

function getBonifXCofre($cofre)
{
    $bonif = 0;
    foreach ($cofre as $moneda) {
        switch ($moneda) {
            case  NOMBRE_ORO:
                $bonif += VALOR_ORO;
                break;
            case NOMBRE_PLATA:
                $bonif += VALOR_PLATA;
                break;
            case NOMBRE_BRONCE:
                $bonif += VALOR_BRONCE;
                break;
            default:
                break;
        }
    }
    return $bonif;
}

function getDetalleXCofre($cofre)
{
    $detalle = [
        NOMBRE_ORO => 0,
        NOMBRE_PLATA => 0,
        NOMBRE_BRONCE => 0,
        'bonif' => 0
    ];
    foreach ($cofre as $moneda) {
        switch ($moneda) {
            case NOMBRE_ORO:
                $detalle[NOMBRE_ORO]++;
                $detalle['bonif'] += VALOR_ORO;
                break;
            case NOMBRE_PLATA:
                $detalle[NOMBRE_PLATA]++;
                $detalle['bonif'] += VALOR_PLATA;
                break;
            case NOMBRE_BRONCE:
                $detalle[NOMBRE_BRONCE]++;
                $detalle['bonif'] += VALOR_BRONCE;
                break;
            default:
                break;
        }
    }
    return $detalle;
}

function getMontoXProductos($productos)
{
    $monto = 0;
    foreach ($productos as $producto) {
        $monto += $producto['precio'] * $producto['cantidad'];
    }
    return $monto;
}