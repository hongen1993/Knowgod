        <div class="logo">
            <a href="<?php echo $lang['toEnter'] ?>">
                <img src="/src/assets/img/knowgodlogo.jpg" alt="logo"/>
            </a>
        </div>
        <div class="menu">
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn" >
                        <i class="fas fa-bars fa-lg"></i>
                </button>
                <div class="user" id="myDropdownB">
                    <a href="../account/perfil.php"><i class="fas fa-user"></i></a>
                </div>
                <div class="language" id="myDropdownC">
                    <a href="../index.php"><i class="fas fa-language"></i></a>    
                </div>
                <div class="dropdown-content" id="myDropdown">
                        <a href="../pages/whoIs.php"><?php echo $lang['menu-A'] ?></a>
                        <?php echo $lang['menu-BB'] ?></a>
                        <a href="../pages/contactUs.php"><?php echo $lang['menu-C'] ?></a>
                        <a href="../pages/pastor.php"><?php echo $lang['menu-D'] ?></a>
                </div>
            </div>
        </div>
