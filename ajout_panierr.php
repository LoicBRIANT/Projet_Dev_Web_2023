<?php
session_start();
var_dump($_POST);
echo(isset($_SESSION['info_login']));
echo($_SERVER['QUERY_STRING']);
if (is_numeric($_SERVER['QUERY_STRING'])&&isset($_SESSION['info_login'])){

}
?>