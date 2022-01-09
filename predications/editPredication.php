<?php 
if (isset($_GET{'id'})) {
    include '../languages/configuration.php';
    require_once '../include/config.php';
    if (isset($_SESSION['userid'])) {
        $user = $_SESSION['userid'];
        $sql = "SELECT * FROM users WHERE userid ='$user'";

        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sqlPredication = "SELECT * FROM post WHERE id='$id'";
        $resultPredication = mysqli_query($conn, $sqlPredication) or die('Bad Query: $sqlPredication');
        $rowPredication = mysqli_fetch_array($resultPredication); ?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang['predicationsTitle'] ?></title>
    <link rel="stylesheet" type="text/css" href="/src/assets/css/header.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="/src/assets/css/predications.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="/src/assets/css/footer.css" media="screen"/>
</head>
<body>
    <header>
        <?php include('../include/header.php') ?>
    </header>
    <main>
        <div class='predicationEditForm'>
            <div class='predicationEditFormContent'>
                <h3><?php echo $lang['editPredication']?></h3>
        <?php
        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['user_type'] !== "2") {
                        $count=$dbo->prepare("select * from post where id='$id'");
                        if (!($count->execute())) {
                            echo "Database Problem ";
                            exit;
                        } else {
                            $rowPredication = $count->fetch(PDO::FETCH_OBJ);
                        }
                        echo "
                                    <form action='editPredicationck.php' method=post>
                                        <input type=hidden name=todo value=edit-predication>
                                        <input type='hidden' name='id' value='". $_GET['id']."'>

                                        <label>". $lang['titleForPredication'] .":</label>
                                        <input type=text name=title value='$rowPredication->title'><br>
                                        <label>". $lang['linkForPredication'] .":</label>
                                        <input type=text name=link value='$rowPredication->link'><br>
                                        <label>". $lang['descriptionForPredication'] .":</label>
                                        <input type=text name=content value='$rowPredication->content'><br>
                                        <input id=editPredicationButton type=submit value=".$lang['edit'].">
                                        <a href='javascript:javascript:history.go(-1)'>". $lang['cancel'] ."</a>
                                    </form>
                                </div>
                            </div>";
                    }
                }
                mysqli_free_result($result);
            } else {
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }

        mysqli_close($conn); ?>       
    </main>
    <footer class="main-footer">
        <?php include('../include/footer.php') ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://kit.fontawesome.com/c469a8b399.js" crossorigin="anonymous"></script>
    <script src="/src/assets/js/headerMenu.js"></script>

</body>
</html>
<?php
    } else {
        header("Location:../account/login.php");
        exit();
    }
}
 ?>