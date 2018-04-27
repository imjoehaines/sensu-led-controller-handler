<?php

require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

// load environment variables
$dotenv = new Dotenv(__DIR__);
$dotenv->load();
$dotenv->required('LED_API_URL')->notEmpty();

$rawSensuOutput = fgets(STDIN);
$sensuOutput = json_decode($rawSensuOutput, true);

$exitCode = $sensuOutput['check']['status'];
$name = $sensuOutput['check']['name'];

$paths = ['/ok', '/warning', '/critical'];

$path = isset($paths[$exitCode])
    ? $paths[$exitCode]
    : '/unknown';

$client = new GuzzleHttp\Client(['base_uri' => getenv('LED_API_URL')]);
$client->request('POST', $path, ['json' => ['sensor' => $name]]);
