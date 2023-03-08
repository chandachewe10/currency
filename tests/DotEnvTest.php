<?php

require_once './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1));
$dotenv->load();
it('asserts DotEnv is working Fine', function () {
    // Prepare
    $base_url_exchangerate = 'https://api.exchangerate.host/';

    // Act
    $dot_env_base_url_exchangerate = $_ENV['BASE_URL_EXCHANGERATE'];

    // Assert
    expect($base_url_exchangerate)->toEqual($dot_env_base_url_exchangerate);
});
?>