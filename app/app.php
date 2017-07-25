<?php

    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";

    //Class constructors
    require_once __DIR__."/../src/User.php";

    $app = new Silex\Application();

    //MySQL database info
    $server = 'mysql:host=localhost:33067;dbname=test_cred';
    $username = 'root';
    $DB = new PDO($server, $username);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig');
    });

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig');
    });


    return $app;
?>
