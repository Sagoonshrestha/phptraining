<?php
session_start();
session_destroy();
setcookie('username','',time()-1);
header('Location:login');
?>