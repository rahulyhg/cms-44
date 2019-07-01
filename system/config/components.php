<?php

if (! isset($container['logger'])) {
  require SYSTEM_PATH . 'components' . DS . 'monolog.php';
}

if (! isset($container['view'])) {
  require SYSTEM_PATH . 'components' . DS . 'twig.php';
}
