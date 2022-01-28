<?php

namespace glady\calc;

use RuntimeException;
use function chunk_split;
use function explode;
use function strrev;
use function str_contains;
use function trim;

class Number
{
    private ?string $value;
    
    public function __construct(string $value = null)
    {
        $this->setValue($value);
    }
    
    public function setValue(string $value = null): void
    {
        $this->value = $value;
    }
    
    public function getValue(): ?string
    {
        return $this->value;
    }
    
    public function isFraction(): bool 
    {
        return $this->value !== null
            && str_contains($this->value, '/');
    }
    
    public function getFraction(): array
    {
        if ($this->isFraction()) {
            [$num, $denum] = explode('/', $this->value, 2);
            if ($num === '') {
                $num = null;
            }
            if ($denum === '') {
                $denum = null;
            }
            return [$num, $denum];
        }
        return [$this->value, '1'];
    }

    public function format(string $decimalSeparator = '.', string $thousandSeparator = ''): string
    {
        if ($this->isFraction()) {
            throw new RuntimeException("Can not format a fraction to a decimal string. Use a calculator for converting and rounding.");
        }
          
        // has decimals? 
        if (str_contains($this->value, '.')) {
            [$integerPart, $decimalPart] = explode('.', $this->value, 2); 
        } else {
            [$integerPart, $decimalPart] = [$this->value, null];
        }
    
        // add thousand separators
        if ($thousandSeparator) {
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
            
        return $integerPart . $decimalSeparator . $decimalPart;
    }
}
