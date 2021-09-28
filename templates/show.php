<?php require_once '../model.php'; ?>
 
<?php $post = getPostById($_GET['id']); ?>
 
<html>
 <body>
  <h1><?php echo $post['title'] ?></h1>
   <div><?php echo $post['date'] ?></div>
   <div><?php echo $post['link'] ?></div>
   <br>
   <div>
    <?php echo $post['content'] ?>
   </div>
   <div>
   <br>
    <a href="showPdf.php?id=<?php echo $_GET['id'] ?>">Print PDF</a>
   <br>
   <br>
    <a href="../">Return to main page</a>
   </div>
  </body>
</html>