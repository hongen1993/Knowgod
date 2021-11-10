<?php
// model.php
  
 require_once 'config.php'; 
  
function getPostsCH(){ 

$conexCH = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME); 

 $resultCH = $conexCH->query('SELECT id, title, content, link, date FROM postb ORDER BY id desc'); 
 
 return $resultCH; 
}
 
?>