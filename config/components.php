<?php

$moduleConfig = '';

foreach ($modules as $module) {
  $moduleConfig = MODULE_PATH . $module . DS . 'config' . DS . 'components.php';

  // Include any components which should all be in their own modules.
  if (file_exists($moduleConfig)) {
    require $moduleConfig;
  }
}

if (file_exists($system_components = SYSTEM_PATH . 'config' . DS . 'components.php')) {
  require $system_components;
}
