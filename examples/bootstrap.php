<?php
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    // class loading via composer - needs composer install first
    require __DIR__ . '/../vendor/autoload.php';
    return;
}