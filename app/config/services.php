<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql;
use MyApp\Services\FeeCalculationService;
use MyApp\Services\ApiService;

$di = new FactoryDefault();

// Database connection
$di->set('db', function () {
    return new Mysql([
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname'   => 'transactions',
    ]);
});

// Fee Calculation Service
$di->setShared('feeCalculationService', function () {
    return new FeeCalculationService();
});
