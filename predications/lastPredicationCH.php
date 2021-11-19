<?php 
    require_once '../predications/model.php'; 
?>

    <h1 class="predicationsTitle"><?php echo $lang['mostRecent'] ?></h1> 
    <ul>
    <?php foreach($lastPredicationsCH as $lastPredicationCH): ?>
            <li>
                <div class="predications">
                    <a href="../predications/predication.php?id=<?php echo $lastPredicationCH['id']?>">
                        <h3 class="predicationTitle"><?php echo $lastPredicationCH['title'] ?></h3>
                    </a>
                    <div>
                        <iframe
                            frameborder='0' allowfullscreen='' scrolling='no' height='200' src="
                                <?php echo $lastPredicationCH['link'] ?>
                            " style='border:1px solid #EEE; box-sizing:border-box; width:100%;'>
                        </iframe>
                    </div>
                    <div class="predicationContent">
                        <?php echo $lastPredicationCH['content'] ?>
                    </div>
                    <div class="predicationDate">
                        <?php echo $lastPredicationCH['date'] ?>
                    </div>
                    <hr>
                </div>
            </li>
    <?php endforeach; ?>
    </ul>
