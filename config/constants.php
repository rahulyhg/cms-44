<?php


if (!defined('DS')) {
  define('DS', DIRECTORY_SEPARATOR);
}

define('BASE_PATH'  , getcwd() . DS);
define('CONFIG_PATH', $config_path);
define('SYSTEM_PATH', 'system' . DS);
define('MODULE_PATH', 'module' . DS);
define('VENDOR_PATH', 'vendor' . DS);
