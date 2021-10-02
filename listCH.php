<?php 
    require_once 'modelCH.php'; 
?>

    <h1 class="predicationsTitle"><?php echo $lang['predicationTitle'] ?></h1> 
    <ul>
    <?php foreach($postsCH as $postCH): ?>
            <li>
                <div class="predications">
                    <h2 class="predicationTitle"><?php echo $postCH['title'] ?></h2>
                    <div>
                        <iframe
                            frameborder='0' allowfullscreen='' scrolling='no' height='200' src="
                                <?php echo $postCH['link'] ?>
                            " style='border:1px solid #EEE; box-sizing:border-box; width:100%;'>
                        </iframe>
                    </div>
                    <div class="predicationContent">
                        <?php echo $postCH['content'] ?>
                    </div>
                    <div class="predicationDate">
                        <?php echo $postCH['date'] ?>
                    </div>
                </div>
            </li>
    <?php endforeach; ?>
    </ul>
