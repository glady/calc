<?php

namespace glady\calc;

use glady\calc\Calculator\BcmathCalculator;
use glady\calc\Calculator\GmpCalculator;
use glady\calc\Calculator\StandardFloatCalculator;
use function extension_loaded;

class CalculatorFactory
{
    public const STANDARD_FLOAT = 'float';
    public const BCMATH = 'bcmath';
    public const GMP = 'gmp';
    
    public function __constuct(array $priorities = [self::GMP, self::BCMATH])
    {
        $this->priorities = $priorities;
    }
    
    public function create(string $type = null): CalculatorInterface
    {
        $type = $type ?? $this->determineType();
        
        switch ($$type) {
            case self::GMP:
                return new GmpCalculator();
            
            case self::BCMATH:
                return new BcmathCalculator();
            
            case self::STANDARD_FLOAT:
            default:
                return new StandardFloatCalculator();
        }
    }
    
    public function determineType(): string
    {
        foreach ($this->priorities as $type) {
            if ($this->isTypeAvailable($type)) {
                return $type;
            }
        }
        return self::STANDARD_FLOAT;
    }
    
    public function isTypeAvailable(string $type): bool
    {
        return $type === self::STANDARD_FLOAT
            || extension_loaded($type);
    }
}