<?php 
    require_once 'model.php'; 
?>

    <h1 class="predicationsTitle"><?php echo $lang['predicationTitle'] ?></h1> 
    <ul>
    <?php foreach($posts as $post): ?>
            <li>
                <div class="predications">
                    <a href="predication.php?id=<?php echo $post['id']?>">
                        <h3 class="predicationTitle"><?php echo $post['title'] ?></h3>
                    </a>
                    <div class="predicationContent">
                        <?php echo $post['content'] ?>
                    </div>
                    <div class="predicationDate">
                        <?php echo $post['date'] ?>
                    </div>
                    <hr>
                </div>
            </li>
    <?php endforeach; ?>
    </ul>
