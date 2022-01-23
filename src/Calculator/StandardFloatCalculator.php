<?php

namespace glady\calc\Calculator;

use glady\calc\Calculator;
use glady\calc\CalculatorInterface;
use function abs;
use function ceil;
use function floor;
use function round;

class StandardFloatCalculator extends Calculator implements CalculatorInterface
{
    public function round(Number $a, int $scale = 0): Number
    {
        $result = round($a->getValue(), $scale);
        return new Number($result);
    }
    
    public function ceil(Number $a, int $scale = 0): Number
    {
        if ($scale) {
            $f = $this->pow('10', (string)$scale);
            $a = $this->mul($a, $f);
        }
        $result = ceil($a->getValue());
        if ($scale) {
            return $this->div(new Number($result), $f);
        } 
        return new Number($result);
    }
    
    public function floor(Number $a, int $scale = 0): Number
    {
        if ($scale) {
            $f = $this->pow('10', (string)$scale);
            $a = $this->mul($a, $f);
        }
        $result = floor($a->getValue());
        if ($scale) {
            return $this->div(new Number($result), $f);
        } 
        return new Number($result);
    }
    
    public function abs(Number $a): Number
    {
        $result = abs($a->getValue());
        return new Number($result);
    }
}