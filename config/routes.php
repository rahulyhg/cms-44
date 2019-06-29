<?php

$moduleConfig = '';

foreach ($modules as $module) {
  $moduleConfig = MODULE_PATH . $module . DS . 'config' . DS . 'routes.php';

  // Include any routes which should all be in their own modules.
  if (file_exists($moduleConfig)) {
    require $moduleConfig;
  }
}
