<?php

$moduleConfig = '';

foreach ($modules as $module) {
  $moduleConfig = MODULE_PATH . $module . DS . 'config' . DS . 'controllers.php';

  // Include any controllers which should all be in their own modules.
  if (file_exists($moduleConfig)) {
    require $moduleConfig;
  }
}
