<?php

namespace glady\calc;

use function array_pop;

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
    public function notNearlyEqual(Number $a, Number $b, Number $epsilon): bool
    {
        return $this->nearlyEqual($a, $b, $epsilon);
    }

    public function if(bool $condition, Number $then, Number $else): Number
    {
        return $condition ? $then : $else;
    }

    public function convertFractionToDecimals(Number $number, int $scale = null): Number
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

    public function max(Number ...$numbers): Number
    {
        if (empty($numbers)) {
            return new Number(null);
        }
        $result = array_pop($numbers);
        foreach ($numbers as $number) {
            $result = $this->if($this->greater($result, $number), $result, $number);
        }
        return $result;
    }

    public function prod(Number ...$numbers): Number
    {
        if (empty($numbers)) {
            return new Number(null);
        }
        $result = new Number('1');
        foreach ($numbers as $number) {
            $result = $this->mul($result, $number);
        }
        return $result;
    }

    public function min(Number ...$numbers): Number
    {
        if (empty($numbers)) {
            return new Number(null);
        }
        $result = array_pop($numbers);
        foreach ($numbers as $number) {
            $result = $this->if($this->lower($result, $number), $result, $number);
        }
        return $result;
    }

    public function sum(Number ...$numbers): Number
    {
        if (empty($numbers)) {
            return new Number(null);
        }
        $result = new Number('0');
        foreach ($numbers as $number) {
            $result = $this->add($result, $number);
        }
        return $result;
    }

    public function cnt(Number ...$numbers): Number
    {
        $result = new Number('0');
        foreach ($numbers as $number) {
            if ($number->getValue() === null) {
                $result = $this->add($result, new Number('1'));
            }
        }
        return $result;
    }

    public function avg(Number ...$numbers): Number
    {
        return $this->div($this->sum(...$numbers), $this->cnt(...$numbers));
    }

    public function divWithFraction(Number $a, Number $b): Number
    {
        return new Number($a->getValue() . '/' . $b->getValue());
    }
}
