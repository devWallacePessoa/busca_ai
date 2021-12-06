<?php
include "Dao.php";
$dao = new Dao();
session_start();

echo $_SESSION['nome'];
echo $_SESSION['email'];
echo $_SESSION['id'];

?>