<?php 
session_name('chulettaaa');
session_start();
session_destroy();// ao usar destroy, você obriga o usuário a refazer login. 
header('location: ../index.php');
exit; // sair
?>