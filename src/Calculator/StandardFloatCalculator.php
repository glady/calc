<?php

namespace glady\calc\Calculator;

use glady\calc\AbstractCalculator;
use glady\calc\CalculatorInterface;
use glady\calc\Number;
use function abs;
use function ceil;
use function floor;
use function round;

class StandardFloatCalculator extends AbstractCalculator implements CalculatorInterface
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

    public function add(Number $a, Number $b): Number
    {
        // TODO: Implement add() method.
    }

    public function sub(Number $a, Number $b): Number
    {
        // TODO: Implement sub() method.
    }

    public function mul(Number $a, Number $b): Number
    {
        // TODO: Implement mul() method.
    }

    public function div(Number $a, Number $b, int $scale = null): Number
    {
        // TODO: Implement div() method.
    }

    public function divWithFraction(Number $a, Number $b): Number
    {
        // TODO: Implement divWithFraction() method.
    }

    public function pow(Number $a, Number $b): Number
    {
        // TODO: Implement pow() method.
    }

    public function sum(Number ...$numbers): Number
    {
        // TODO: Implement sum() method.
    }

    public function prod(Number ...$numbers): Number
    {
        // TODO: Implement prod() method.
    }

    public function max(Number ...$numbers): Number
    {
        // TODO: Implement max() method.
    }

    public function min(Number ...$numbers): Number
    {
        // TODO: Implement min() method.
    }

    public function cnt(Number ...$numbers): Number
    {
        // TODO: Implement cnt() method.
    }

    public function avg(Number ...$numbers): Number
    {
        // TODO: Implement avg() method.
    }

    public function equal(Number $a, Number $b): bool
    {
        // TODO: Implement equal() method.
    }

    public function greater(Number $a, Number $b): bool
    {
        // TODO: Implement greater() method.
    }

    public function nearlyEqual(Number $a, Number $b, Number $epsilon): bool
    {
        // TODO: Implement nearlyEqual() method.
    }

    public function notNearlyEqual(Number $a, Number $b, Number $epsilon): bool
    {
        // TODO: Implement notNearlyEqual() method.
    }

    public function if(bool $condition, Number $then, Number $else): Number
    {
        // TODO: Implement if() method.
    }
}
