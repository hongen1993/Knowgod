<?php
// model.php
  
 require_once 'config.php'; 
 
  

  
function getPosts(){ 

$conex = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME); 

 $result = $conex->query('SELECT id, title FROM post ORDER BY id desc'); 
 
 return $result; 
}
 
function getPostById($id)
{
$conex = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME); 

 $result = $conex->query('SELECT date, title, content, link FROM post WHERE id ='.$id);
 $row = mysqli_fetch_assoc($result);
  
    return $row;
}
 
?>