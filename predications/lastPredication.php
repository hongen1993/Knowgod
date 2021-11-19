<?php 
    require_once '../predications/model.php'; 
?>

    <h1 class="predicationsTitle"><?php echo $lang['mostRecent'] ?></h1> 
    <ul>
    <?php foreach($lastPredications as $lastPredication): ?>
            <li>
                <div class="predications">
                    <a href="../predications/predication.php?id=<?php echo $lastPredication['id']?>">
                        <h3 class="predicationTitle"><?php echo $lastPredication['title'] ?></h3>
                    </a>
                    <div>
                        <iframe
                            frameborder='0' allowfullscreen='' scrolling='no' height='200' src="
                                <?php echo $lastPredication['link'] ?>
                            " style='border:1px solid #EEE; box-sizing:border-box; width:100%;'>
                        </iframe>
                    </div>
                    <div class="predicationContent">
                        <?php echo $lastPredication['content'] ?>
                    </div>
                    <div class="predicationDate">
                        <?php echo $lastPredication['date'] ?>
                    </div>
                    <hr>
                </div>
            </li>
    <?php endforeach; ?>
    </ul>
