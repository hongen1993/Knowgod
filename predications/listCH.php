<?php 
    require_once '../predications/model.php'; 
    ?>

    <h1 class="predicationsTitle"><?php echo $lang['predicationTitle'] ?></h1> 
    <ul class="predicationsList">
    <?php foreach($postsCH as $postCH): ?>
            <li>
                <div class="predications">
                <a class="predicationA" href="../predications/predicationCH.php?id=<?php echo $postCH['id']?>">
                    <h3 class="predicationTitleB"><?php echo $postCH['title'] ?></h3>
                        <div class="predicationContentB">
                            <?php echo $postCH['content'] ?>
                        </div>
                </a>
                    <div class="predicationDateB">
                        <?php echo $postCH['date'] ?>
                    </div>
                    <hr>
                </div>
            </li>
    <?php endforeach; ?>
    </ul>
