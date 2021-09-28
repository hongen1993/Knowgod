<?php 
// index.php 
require_once 'model.php'; 
$posts = getPosts(); 
require '/template/list.php'; 
?>