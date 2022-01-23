<?php

namespace glady\calc;

interface CalculatorInterface
{
    // unary operators
    public function round(Number $a, int $scale = 0): Number;
    public function ceil(Number $a, int $scale = 0): Number;
    public function floor(Number $a, int $scale = 0): Number;
    public function abs(Number $a): Number;
    
    // binary operators
    public function add(Number $a, Number $b): Number;
    public function sub(Number $a, Number $b): Number;
    public function mul(Number $a, Number $b): Number;
    public function div(Number $a, Number $b, int $scale = null): Number;
    public function divWithFraction(Number $a, Number $b): Number;
    public function pow(Number $a, Number $b): Number;
    
    // aggregations
    public function sum(Number ...$numbers): Number;
    public function prod(Number ...$numbers): Number;
    public function max(Number ...$numbers): Number;
    public function min(Number ...$numbers): Number;
    public function cnt(Number ...$numbers): Number;
    public function avg(Number ...$numbers): Number;
    
    // comparisons
    public function equal(Number $a, Number $b): bool;
    public function notEqual(Number $a, Number $b): bool;
    
    public function greater(Number $a, Number $b): bool;
    public function lower(Number $a, Number $b): bool;
    
    public function greaterOrEqual(Number $a, Number $b): bool;
    public function lowerOrEqual(Number $a, Number $b): bool;
    
    public function nearlyEqual(Number $a, Number $b, Number $epsilon): bool;
    public function notNearlyEqual(Number $a, Number $b, Number $epsilon): bool;
    
    // conditions
    public function if(bool $condition, Number $then, Number $else): Number;

    public function format(Number $number, int $scale = null, string $decimalSeparator = '.', string $tousandSeparator = ''): string;
    public function convertFractionToDecimals(Number $a, int $scale = null): Number; 
}