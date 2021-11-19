<?php 
    require_once '../predications/model.php'; 
?>

    <h1 class="predicationsTitle"><?php echo $lang['predicationTitle'] ?></h1> 
    <ul>
    <?php foreach($posts as $post): ?>
            <li>
            
                <div class="predications">
                    <a class="predicationA" href="../predications/predication.php?id=<?php echo $post['id']?>">
                            <h3 class="predicationTitleB"><?php echo $post['title'] ?></h3>
                        <div class="predicationContentB">
                            <?php echo $post['content'] ?>
                        </div>
                    </a>
                    <div class="predicationDateB">
                        <?php echo $post['date'] ?>
                    </div>
                    <hr>
                </div>
            </li>
    <?php endforeach; ?>
    </ul>
