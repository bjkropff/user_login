<?php

    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";

    //Class constructors
    require_once __DIR__."/../src/User.php";

    $app = new Silex\Application();

    //MySQL database info
    $server = 'mysql:host=localhost:33067;dbname=cred';
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

    $app->get("/login", function() use ($app) {
        return $app['twig']->render('login.html.twig');
    });

    $app->get("/home", function() use ($app) {
      $name = $_GET['name'];
      $pass = $_GET['pass'];
      $user = User::find($name, $pass);
      return $app['twig']->render('home.html.twig',array('user' => $user));
    });

    // $app->post("/home", function() use ($app) {
    //     $name = $_POST['name'];
    //     $pass = $_POST['pass'];
    //     $user = User::find($name, $pass);
    //     // $userName = $user->getName();
    //     // $userPass = $user->getPass();
    //     // $userMail = $user->getMail();
    //     return $app['twig']->render('home.html.twig',array(
    //       'user' => $user
    //     ));
    // });

    $app->post("/home", function() use ($app) {
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $user = User::find($name, $pass);
        // $userName = $user->getName();
        // $userPass = $user->getPass();
        // $userMail = $user->getMail();
        return $app['twig']->render('home.html.twig',array(
          'user' => $user
          //'name' => $userName, 'email' => $userMail
        ));
    });


    // $app->get("/home", function($name, $pass) use ($app) {
    //     $user = User::find($name, $pass);
    //     $userPass = $user->getPass();
    //     $userName = $user->getName();
    //     return $app['twig']->render('home.html.twig');
    // });

    $app->get("/user/{name}", function($name, $pass) use ($app) {
        $user = User::find($name, $pass);
        $userPass = $user->getPass();
        $userName = $user->getName();
      //  if (!$pass == $userPass || !$name == $userName) {
          return $app['twig']->render('home.html.twig');
        // }
        // return $app['twig']->render('home.html.twig', array('name' => $name, 'email' => $mail));
    });

    $app['debug'] = true;


    return $app;
?>
