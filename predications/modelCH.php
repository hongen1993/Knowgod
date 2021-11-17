<?php
// model.php
  
 require_once '../include/config.php'; 
  
function getPostsCH(){ 

$conexCH = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME); 

 $resultCH = $conexCH->query('SELECT id, title, content, link, date FROM postb ORDER BY id DESC'); 
 
 return $resultCH; 
}
function lastPredicationCH(){ 

    $conex = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME); 
    
     $result = $conex->query('SELECT id, title, content, link, date FROM postb ORDER BY id DESC LIMIT 1'); 
     
     return $result; 
    }
?>