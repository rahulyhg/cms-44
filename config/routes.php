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

$registeredRoutes = System\getRegisteredRoutes($container);

if (file_exists($system_routes = SYSTEM_PATH . 'config' . DS . 'routes.php')) {
  require $system_routes;
}

$registeredRoutes = System\getRegisteredRoutes($container);

if (! in_array('/', $registeredRoutes)) {
  $app->get('/', function (Request $request, Response $response, array $args) {

    $this->logger->addInfo('No default route defined');

    return $this->view->render($response, 'error/not_defined.twig');
  });
}
