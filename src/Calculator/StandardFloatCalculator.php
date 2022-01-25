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
            $f = $this->pow(new Number('10'), new Number((string) $scale));
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
            $f = $this->pow(new Number('10'), new Number((string)$scale));
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
        return new Number($a->getValue() + $b->getValue());
    }

    public function sub(Number $a, Number $b): Number
    {
        return new Number($a->getValue() - $b->getValue());
    }

    public function mul(Number $a, Number $b): Number
    {
        return new Number($a->getValue() * $b->getValue());
    }

    public function div(Number $a, Number $b, int $scale = null): Number
    {
        return new Number($a->getValue() / $b->getValue());
    }

    public function divWithFraction(Number $a, Number $b): Number
    {
        // TODO: Implement divWithFraction() method.
    }

    public function pow(Number $a, Number $b): Number
    {
        return new Number(pow($a->getValue(), $b->getValue()));
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
        return $a->getValue() === $b->getValue();
    }

    public function greater(Number $a, Number $b): bool
    {
        return $a->getValue() > $b->getValue();
    }

    public function nearlyEqual(Number $a, Number $b, Number $epsilon): bool
    {
        return abs($a->getValue() - $b->getValue()) < $epsilon->getValue();
    }

}
