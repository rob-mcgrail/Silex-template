<?php

require_once __DIR__.'/../vendor/autoload.php';
$app = new Silex\Application();



// Connecting to database.
RedBean_Facade::setup('mysql:host=localhost;dbname=redbeantest','redbeantest','password');


// Register services =================

// Templating with twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));


// Require models ===================

// Require controllers ==============
require_once __DIR__.'/controllers/example_controller.php';


// Development mode only.
$app['debug'] = TRUE;

return $app;

?>
