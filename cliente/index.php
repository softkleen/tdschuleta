<?php 
session_name('chulettaaa');
session_start();
?>

<h1>Area de cliente</h1>
<h2>Área exclusiva de <?=$_SESSION['login_usuario']?></h2>

<a href="../admin/logout.php" class="btn">Sair</a>