<?php
session_start();
session_destroy(); // Destrói toda sessão
header("Location: ../index.php")
?>