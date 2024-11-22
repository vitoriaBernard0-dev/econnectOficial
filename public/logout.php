<?php
session_start();
session_destroy();
header('Location: inde-x.php');
exit();
?>
