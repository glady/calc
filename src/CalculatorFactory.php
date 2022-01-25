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

    /** @var array|string[] */
    private array $priorities;

    public function __construct(array $priorities = [self::GMP, self::BCMATH])
    {
        $this->priorities = $priorities;
    }
    
    public function create(string $type = null): CalculatorInterface
    {
        $type = $type ?? $this->determineType();

        return match ($type) {
            self::GMP => new GmpCalculator(),
            self::BCMATH => new BcmathCalculator(),
            default => new StandardFloatCalculator(),
        };
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
