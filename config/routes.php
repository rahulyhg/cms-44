<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$moduleConfig = '';

foreach ($modules as $module) {
  $registeredRoutes = System\getRegisteredRoutes($container);
  $moduleConfig = MODULE_PATH . $module . DS . 'config' . DS . 'routes.php';

  // Include any routes which should all be in their own modules.
  if (file_exists($moduleConfig)) {
    require $moduleConfig;
  }
}

// Run it one last time to make sure we have all the routes
$registeredRoutes = System\getRegisteredRoutes($container);

if (! in_array('/', $registeredRoutes)) {
  $app->get('/', function (Request $request, Response $response, array $args) {

    $response->getBody()->write("Simple Slim Based CMS Framework");

    return $response;
  });
}
