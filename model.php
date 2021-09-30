<?php
// model.php
  
 require_once 'config.php'; 
  
function getPosts(){ 

$conex = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME); 

 $result = $conex->query('SELECT id, title, content, link, date FROM post ORDER BY id desc'); 
 
 return $result; 
}
 
?>