<?php

if (! isset($container['logger'])) {
  require SYSTEM_PATH . 'components' . DS . 'monolog.php';
}
