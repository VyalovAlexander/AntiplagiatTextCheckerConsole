<?php

use Psr\Container\ContainerInterface;
use VyalovAlexander\AntiplagiatTextChecker\Checker;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client;


return [
    ClientInterface::class => function() {
        return new Client();
    },
    Checker::class => function(ContainerInterface $c, ClientInterface $client) {

        $checker = new Checker($client);
        return $checker->addDriver('ContentWatch', \VyalovAlexander\AntiplagiatTextChecker\Drivers\ContentWatch\Driver::class)
            ->addDriver('Copyscape', \VyalovAlexander\AntiplagiatTextChecker\Drivers\Copyscape\Driver::class)
            ->addDriver('TextRU', \VyalovAlexander\AntiplagiatTextChecker\Drivers\TextRU\Driver::class);

    }
];