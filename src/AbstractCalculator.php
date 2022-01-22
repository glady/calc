<?php

namespace glady\calc;

use glady\calc\CalculatorInterface;

abstract class AbstractCalculator implements CalculatorInterface
{
    public function notEqual(Number $a, Number $b): bool
    {
        return !$this->equal($a, $b);
    }
    
    public function lower(Number $a, Number $b): bool
    {
        return $this->greater($b, $a);
    }
        
    public function greaterOrEqual(Number $a, Number $b): bool
    {
        return !$this->lower($a, $b);
    }
    
    public function lowerOrEqual(Number $a, Number $b): bool
    {
        return !$this->greater($a, $b);
    }
}