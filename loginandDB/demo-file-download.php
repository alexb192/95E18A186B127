<?php
require_once('common.php');

// Very simple example to send this file (which you'd never do in
// a real web site).
HTTPUtils::sendFile(
  site_root_private_path('play.jpg'),
  'play.jpg',
  'image/jpeg',
  'JPEG Image'
);

?>
