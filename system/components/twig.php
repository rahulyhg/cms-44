<?php

$container['view'] = function($c) {

  $config = include CONFIG_PATH . 'twig.php';

  $view   = new \Slim\Views\Twig($config['templates'], $config['options']);
  $router = $c->get('router');
  $uri    = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));

  $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));
  return $view;
};
