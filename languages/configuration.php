<?php 

session_start();

if(!isset($_SESSION['lang']))
    $_SESSION['lang']= "es";

elseif(isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang']))
{
    if ($_GET['lang'] == "es")
        $_SESSION['lang'] = "es";
    else if($_GET['lang'] == "ch")
         $_SESSION['lang'] = "ch";
}

require_once "./languages/" . $_SESSION['lang'] ."." ."php";

?>