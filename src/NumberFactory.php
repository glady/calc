<?php

namespace glady\calc;

class NumberFactory
{
    private CalculatorFactory $calculatorFactory;
    
    public function __construct(CalculatorFactory $calculatorFactory)
    {
        $this->calculatorFactory = $calculatorFactory;
    }
    
    public function createNumber($value, int $scale = null): Number
    {
        // TODO: need more then one number abstraction? Need type? 
        $type = $this->calculatorFactory->determineType();
        return new Number($value, $scale);
    }
}