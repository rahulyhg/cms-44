<?php

date_default_timezone_set('UTC');

// Adjust config path here
$config_path = 'config/';

include $config_path . 'constants.php';

// Get composer object
$composer = include VENDOR_PATH . 'autoload.php';

// Register system path and namespace
$composer->addPsr4('System\\', SYSTEM_PATH);

// Load module namespaces
$modules = require CONFIG_PATH . 'modules.php';
foreach ($modules as $module) {
  $namespace = $module . '\\';
  $path      = MODULE_PATH . $module . DS . 'src' . DS;

  $composer->addPsr4($namespace, $path);
}

// Get configuration
$config = (file_exists(CONFIG_PATH . 'app.php')) ? ['settings' => require CONFIG_PATH . 'app.php'] : [];

// Load Slim
$app = new \Slim\App($config);

// Get Slim container
$container = $app->getContainer();

// get components
require CONFIG_PATH . 'components.php';

// get controllers
require CONFIG_PATH . 'controllers.php';

// get routes
require CONFIG_PATH . 'routes.php';

// Start app!
$app->run();
