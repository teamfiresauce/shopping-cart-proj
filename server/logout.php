<?php
setcookie('admin_username', '', time()-1);
header('Location: admin.php');
?>