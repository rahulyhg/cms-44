<?php

// Configuration schema expected by phinx.
$db['phinx'] = [
  'adapter'   => 'mysql',
  'host'      => 'localhost',
  'name'      => 'production_db',
  'user'      => 'root',
  'pass'      => '',
  'port'      => '3306',
  'charset'   => 'utf8mb4',
  'collation' => 'utf8mb4_unicode_ci'
];

// Convert our migration config to follow the variable naming
// scheme expected by doctrine.
$db['doctrine'] = [
  'driver'   => ['pdo_mysql'],
  'user'     => $db['phinx']['user'],
  'password' => $db['phinx']['pass'],
  'dbname'   => $db['phinx']['name'],
  'host'     => $db['phinx']['host'],
  'charset'  => $db['phinx']['charset']
];

return [
  'migrations' => $db['phinx'],
  'database'   => $db['doctrine']
];
