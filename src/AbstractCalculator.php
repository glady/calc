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
    
    public function format(Number $number, int $scale = null, string $decimalSeparator = '.', string $thousandSeparator = ''): string
    {
        if ($scale !== null) {
            $number = $this->round($number, $scale);
        }
        $value = $number->getValue();

        // handle fractals
        if (strstr($value, '/')) {
            [$num, $denum] = explode('/', $value, 2);
            $value = $this->div($num, $denum, true);
        }

        // has decimals? 
        if (strstr($value, '.')) {
            [$integerPart, $decimalPart] = explode('.', $value, 2); 
        } else {
            [$integerPart, $decimalPart] = [$value, null];
        }

         // add thousand separators
        if ($htousandSeparator) {
            $integerPart = strrev(
                chunk_split(
                    strrev($integerPart),
                    3, 
                    $thousandSeparator
                )
            );
        }

        if ($decimalPart === null || trim($decimalPart, '0') === '') {
            return $integerPart;
        }
        
        return $integerPart. $decimalSeparator. $decimalPart;
    }
}