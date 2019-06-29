<?php
$modules = require CONFIG_PATH . 'modules.php';

$migrations = [
  BASE_PATH .'db/migrations'
];

$seeds = [
  BASE_PATH . 'db/seeds'
];

// Grab module migrations
foreach ($modules as $module) {

  $migrationPath = BASE_PATH . MODULE_PATH . $module . DS . 'db/migrations';
  $seedPath      = BASE_PATH . MODULE_PATH . $module . DS . 'db/seeds';

  if (is_dir($migrationPath)) {
    $migrations[] = $migrationPath;
  }
  if (is_dir($seedPath)) {
    $seeds[] = $seeds;
  }
}

$db = require CONFIG_PATH . 'db.php';

return
[
    'paths' => [
        'migrations' => $migrations,
        'seeds'      => $seeds,
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_database' => 'default',
        'default' => $db['migrations'],
    ],
    'version_order' => 'creation'
];
