<?php

namespace glady\calc\Calculator;

use glady\calc\AbstractCalculator;
use glady\calc\CalculatorInterface;
use glady\calc\Number;

class GmpCalculator extends AbstractCalculator implements CalculatorInterface
{

    public function round(Number $a, int $scale = 0): Number
    {
        // TODO: Implement round() method.
    }

    public function ceil(Number $a, int $scale = 0): Number
    {
        // TODO: Implement ceil() method.
    }

    public function floor(Number $a, int $scale = 0): Number
    {
        // TODO: Implement floor() method.
    }

    public function abs(Number $a): Number
    {
        // TODO: Implement abs() method.
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
}
