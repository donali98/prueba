<?php

namespace Code;

class Test
{
    private $l;
    private $tarifas;

    public function __construct(int $l, array $tarifas)
    {
        $this->l = $l;
        $this->tarifas = $tarifas;
    }

    public function fancyRide()
    {
        if ($this->validateData()) {
        }
    }
    private function validateData()
    {
        foreach ($this->tarifas as $fee) {

            $elementType = gettype($fee);
            if ($elementType != 'integer' && $elementType != 'double')
                return false;
        }
        return true;
    }
}
