<?=session_start(); session_destroy(); session_unset();?>
<?php header('Location: ' . $_SERVER['HTTP_REFERER']); ?>