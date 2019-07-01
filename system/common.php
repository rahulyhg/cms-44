<?php namespace System;

// Feed the slim container object into this and get a
// list of routes
function getRegisteredRoutes($container)
{
  $routes = array_reduce(
    $container->get('router')->getRoutes(),
    function ($target, $route) {
           $target[$route->getPattern()] = [
               'methods' => json_encode($route->getMethods()),
               'callable' => $route->getCallable(),
               'middlewares' => json_encode($route->getMiddleware()),
               'pattern' => $route->getPattern(),
           ];
           return $target;
    }, []);

    $registeredRoutes = [];
    foreach ($routes as $pattern => $method) {
      $registeredRoutes[] = $pattern;
    }

    return $registeredRoutes;
}
