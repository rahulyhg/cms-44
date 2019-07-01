<?php

$container['logger'] = function($c) {
  $config       = require CONFIG_PATH . 'monolog.php';
  $logger       = new \Monolog\Logger($config['logger']);
  $file_handler = new \Monolog\Handler\StreamHandler($config['log_file']);
  $logger->pushHandler($file_handler);
  return $logger;
};
