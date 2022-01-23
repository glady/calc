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
    
    public function convertFractionToDecimals(Number $a, int $scale = null): Number
    {
        if ($number->isFraction()) {
            [$num, $denum] = $number->getFraction();
            $number = $this->div($num, $denum, $scale);
        }
        return $number;
    }
    
    public function format(Number $number, int $scale = null, string $decimalSeparator = '.', string $thousandSeparator = ''): string
    {
        $number = $this->convertFractionToDecimals($number, $scale === null ? null : $scale + 1);
        if ($scale !== null) {
            $number = $this->round($number, $scale);
        }
        return $number->format($decimalSeparator, $thousandSeparator);
    } 
}