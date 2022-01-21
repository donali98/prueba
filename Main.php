<?php

/**
 * Clase encargada de calcular el mejor tipo de viaje
 *
 * @author  Alejandro Donalí Hernández Ramos
 * 
 */
class UberRides
{
    /**
     * Propiedad que contendrá la cantidad de millas 
     *
     * @var int
     */
    private $l;

    /**
     * Propiedad que contendrá el valor de las distintas tarifas
     *
     * @var array.float
     */
    private $tarifas;

    /**
     * Propiedad que servirá como parámetro para calcular la mejor opción
     *
     * @var float
     */
    private $discount = 20.0;

    /**
     * Propiedad que contendrá el nombre de las tiers posibles, en orden ascendente
     *
     * @var array
     */
    private $tiers = ['Uber X', 'Uber XL', 'Uber Plus', 'Uber Black', 'Uber SUV'];


    /**
     * Método que calcula la mejor opción por el dinero
     * @param  int $l Cantidad de millas
     * @param  array $tarifas Arreglo que contiene los precios de cada tier
     * 
     */
    public function fancyRide(int $l, array $tarifas)
    {
        $this->l = $l;
        $this->tarifas = $tarifas;

        $tierCount = count($this->tiers) - 1;

        for ($i = count($this->tarifas) - 1; $i >= 0; $i--) {
            $finalPrice = $this->tarifas[$i] * $this->l;
            if ($finalPrice <= $this->discount)
                break;

            $tierCount--;
        }


        return $this->tiers[$tierCount];
    }
}

//Probando con consola
// $miles =  getMilesFromConsole($argv);
// $fees = getArrayFromConsole($argv);

//Prueba directa
$fees = [0.3, 0.7, 1, 4.0, 5.0];
$miles = 4;

//Calcula la mejor opción gracias a la clase UberRides
if ($miles != null && $fees != null) {
    $uberRides = new UberRides();
    $tierCalculated = $uberRides->fancyRide($miles, $fees);
    echo $tierCalculated;
} else echo 'error, check input values';


/**
 * Método que transforma lo ingresado a consola en un arreglo
 * @param  array $arguments El argumento que contiene todo lo ingresado desde consola
 * @throws \Exception Devuelve null en caso de caer en algún error
 */
function getArrayFromConsole($arguments)
{
    $feesArray = [];

    try {
        $feesString = $arguments[2];
        $stringFeesArray = explode(',', substr($feesString, 1, strlen($feesString) - 2));

        foreach ($stringFeesArray as $stringFee) {
            $feeFloat = floatval($stringFee);
            if ($feeFloat != 0)
                array_push($feesArray, floatval($stringFee));
        }
        return $feesArray;
    } catch (Exception $e) {
        return null;
    }
}
/**
 * Método que obtiene las millas de lo que se ingresa en consola
 * @param  array $arguments El argumento que contiene todo lo ingresado desde consola
 * @throws \Exception Devuelve null en caso de caer en algún error
 */
function getMilesFromConsole($arguments)
{
    try {
        return intval($arguments[1]);
    } catch (Exception $e) {
        return null;
    }
}
