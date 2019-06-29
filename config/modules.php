<?php

// Retrieve any modules and load their namespaces
// Initialize the module array.
$modules = [];

// Check for modules
if (is_dir(MODULE_PATH)) {
  if ($dh = opendir(MODULE_PATH)) {
    while (($module = readdir($dh)) !== false) {
      if (
        $module != '.' &&
        $module != '..' &&
        is_dir(MODULE_PATH . '/' . $module)) {
        $modules[] = $module;
      }
    }
  }
}

return $modules;
