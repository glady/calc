<?php

namespace glady\calc;

class Number
{
    private ?string $value;
    
    public function __contruct(string $value = null)
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
    
    
}