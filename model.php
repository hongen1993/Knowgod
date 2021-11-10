<?php
// model.php
  
 require_once 'config.php'; 
  
function getPosts(){ 

$conex = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME); 

 $result = $conex->query('SELECT id, title, content, link, date FROM post ORDER BY id DESC LIMIT 10'); 
 
 return $result; 
}
function lastPredication(){ 

    $conex = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME); 
    
     $result = $conex->query('SELECT id, title, content, link, date FROM post ORDER BY id DESC LIMIT 1'); 
     
     return $result; 
    }
?>