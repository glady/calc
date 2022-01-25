<?php

require __DIR__ . '/bootstrap.php';

echo <<<HEADER

    [Example 1 of project glady/calc]

(i) This file shows basic usage of calculator factory and their dependency on system configuration

HEADER;

$calculatorFactory = new \glady\calc\CalculatorFactory();
$type = $calculatorFactory->determineType();

echo "Your system will use '$type' by default.\n";

$bcmath = $calculatorFactory->isTypeAvailable('bcmath');
echo " * bcmath is available: " . ($bcmath ? "yes" : "no") . "\n";
$gmp = $calculatorFactory->isTypeAvailable('gmp');
echo " * gmp is available: " . ($gmp ? "yes" : "no") . "\n";

$systemDependentCalculator = $calculatorFactory->create();
echo " * factory creates per default an instance of ". get_class($systemDependentCalculator) . "\n";
$bcmathCalculator = $calculatorFactory->create('bcmath');
echo " * factory can create an instance of ". get_class($bcmathCalculator) . "\n";
$gmpCalculator = $calculatorFactory->create('gmp');
echo " * factory can create an instance of ". get_class($gmpCalculator) . "\n";
$floatCalculator = $calculatorFactory->create('float');
echo " * factory can create an instance of ". get_class($floatCalculator) . "\n";

$priorities = ['float', 'bcmath', 'gmp'];
$calculatorFactory = new \glady\calc\CalculatorFactory($priorities);
echo " * factory priority can be changed, e.g. " . json_encode($priorities) . " creates per default an instance of ". get_class($calculatorFactory->create()) . "\n";

$priorities = ['bcmath', 'float', 'gmp'];
$calculatorFactory = new \glady\calc\CalculatorFactory($priorities);
echo " * factory priority can be changed, e.g. " . json_encode($priorities) . " creates per default an instance of ". get_class($calculatorFactory->create()) . "\n";

$priorities = [];
$calculatorFactory = new \glady\calc\CalculatorFactory($priorities);
echo " * factory priority can be empty, e.g. " . json_encode($priorities) . " creates per default an instance of ". get_class($calculatorFactory->create()) . "\n";

$priorities = ['gmp', 'bcmath', 'float'];
$calculatorFactory = new \glady\calc\CalculatorFactory($priorities);
echo " * factory standard priority is " . json_encode($priorities) . ", creates per default an instance of ". get_class($calculatorFactory->create()) . "\n";
