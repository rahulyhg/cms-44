<?php

$db = (file_exists(CONFIG_PATH . 'db.php')) ? CONFIG_PATH . 'db.php' : [];

return [
  'displayErrorDetails'    => true,
  'addContentLengthHeader' => true,
  'db' => (isset($db['database'])) ? $db['database'] : [],
];
