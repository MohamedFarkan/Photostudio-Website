<?php 
session_start();
session_destroy();
header("Location: log2.php");
?>