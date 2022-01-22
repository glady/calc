# calc

This repository should provide a PHP library for arbitary precision calculations.

## System requirements 

* PHP 8+
* optional: bcmath 
* optional: gmp

## Purposes / Goals

* We have multiple named variables a, b, c, d, ...
* We have multiple value sets containing values for each variable
** set 1 = a1, b1, c1, d1, ...
** set 2 = a2, b2, c2, d2, ...
** ...
* We have different calculation needs that can be expressed as formula. E.g. F = a + b - c * d / e
* We can calculate formula results per value set and aggregate these formula results over all result sets
* We can also use aggregated results (over all result sets) within a formula in order to compare a single result set with all others.
* We want to be able to configure an arbitary precision for calculations.
* We want to be unit and currency aware including conversions (min => h, g => kg, € => $) and logical formula awareness (50km / 30 min = 50 km / 0,5 h = 100 km/h )
