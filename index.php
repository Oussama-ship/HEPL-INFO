<?php /*Lancement de la session (doit se faire avant tout le reste du code)*/
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hepl news Info</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
    <meta content="Bootstrap News Template - Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <?php require "./PHP/bdd.php"; ?>
    <?php require "./Decoupe/header.php"?>
    <?php require "./PHP/modele.php" ?>

    <div class="login-form">
        <?php

        if (isset($_GET['login_err'])) {
            $err = htmlspecialchars($_GET['login_err']);

            switch ($err) {
                case 'Deconnexion':
        ?>
        <div class="alert alert-success">
            <strong>Succès</strong> Deconnexion effectuée avec success
        </div>
        <?php
                    break;

                case 'success':
                ?>
        <div class="alert alert-success">
            <strong>Succès</strong> New ajouter dans BD !
        </div>
        <?php
                    break;

                    case 'supp' :
                        ?>

        <div class="alert alert-success">
            <strong>Succès</strong> Suppression Réussis
        </div>

        <?php break;

            }
        }
        ?>
    </div>


    <!-- Category News End-->
    <?php
    if (!empty($_GET['var']) || isset($_GET['var'])) {
        switch ($_GET['var']) {
            case 1:
                    $data = getDatabyCat(1);
                    break;
            case 2:
                    $data = getDatabyCat(2);
                    break;

            case 4:
                    $data = getDatabyCat(4);
                    break;


            case 6:
                    $data = getDatabyCat(6);
                    break;
                   
        }
    } else {
         
          $data = getDatabyCat();
    }



    foreach ($data as $value) {

        echo '<div class="NEWS-Oussama" > ';
        echo '<h3>' . $value['titre'] . '</h3>' . '<br>';
        if(isset($_SESSION['user']) && !empty($_SESSION['user']))
        if($_SESSION['user'] == $value['pseudo'])
        {
            echo   "<a href=\"./PHP/supprimer.php?id={$value['idNews']}\"> Supprimer</a> ";
            echo   " <a href=\"modifier.php?id={$value['idNews']}\">Modifier</a>";

        }
        switch ($value['categorie']) {
            case 1:
                echo '<h4>' . 'Categorie : Enfant' . '</h4>';
                break;
            case 2:
                echo '<h4>' . 'Categorie : Adulte' . '</h4>';
                break;
            case 4:
                echo '<h4>' . 'Categorie : Senior' . '</h4>';
                break;
            case 6:
                echo '<h4>' . 'Categorie : Ado' . '</h4>';
                break;
        }


        echo  '<p >' . "Date de publication : " . $value['publication'] . '</p>' .  '<br>';

        if (!empty($value['expiration']))
            echo '<p classe="dateexp">' . "date expiration : " . $value['expiration'] . '</p>' . '<br>';

        
       

        echo '<p >' . "Utilisateur : " . $value['pseudo'] . '</p>' . '<br>';


        echo '<p>' . $value['texte'] . '</p>' . '<br>';

        echo '</div>';
    }




    ?>

    <?php require "./Decoupe/footer.php"  ?>
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>