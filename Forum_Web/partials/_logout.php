<?php
session_start();


session_destroy();
echo 'Logging  u out';
header("location: /phpt/PHP_Projects/Forum_Web/index.php");
exit;

?>