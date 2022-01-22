<?php

namespace glady\calc;

interface CalculatorInterface
{
    // binary operators
    public function add(Number $a, Number $b): Number;
    public function sub(Number $a, Number $b): Number;
    public function mul(Number $a, Number $b): Number;
    public function div(Number $a, Number $b): Number;
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
//    public function if(bool $condition, Number $then, Number $else): Number;
}