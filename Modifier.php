<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Modifier</title>
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
    <!-- Top Bar Start -->
    <?php require "./Decoupe/header.php" ?>
    <?php require "./PHP/bdd.php" ?>
    <?php require "./PHP/modele.php" ?>
<div class="login-form">
    <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'success':
                            ?>
                                <div class="alert alert-success">
                                    <strong>Succès</strong> New ajouter dans BD !
                                </div>
                            <?php
                        break;

                        case 'dateInvalide':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Date expiration invalide
                            </div>
                        <?php
                        break;

                        case 'ErrorBDD':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> Erreur lors de l'enregistrement dans la base
                                </div>
                            <?php
                        break;

                        case 'Titre' :
                            ?>
                            <div class="alert alert-danger">
                                    <strong>Erreur</strong> Pas assez ou trop de caractére dans le titre 
                                </div>
                            <?php

                        case 'News' :
                               ?>
                              <div class="alert alert-danger">
                                      <strong>Erreur</strong> Pas assez ou trop de caractére dans la news
                             </div>
                             <?php


                    }
                }
    ?> 
</div>
        
   <?php

        $id = $_GET["id"];

        
     
       
        $data = getNewsById($id);

        

         $titre = $data['titre'];
         //echo  $data['texte'];
         $date = $data['expiration'];

    

         

    ?>
      <div class="contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="contact-form">
                        <form  method = "POST" action="./PHP/encodeModification.php?var=<?php echo $id ?>">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="titre">Votre titre  :</label>
                                    <input type="text" class="form-control" value="<?php  echo $titre ?>" name="titre" placeholder="Votre titre"
                                        required="required" />
                                </div>
                                <div class="form-group col-md-6">
                                <label  for="categorie" >Votre categorie  :</label>
                                    <select name="categorie" >
                                        <option value=1>Enfant</option>
                                        <option value=2>Adulte</option>
                                        <option value=4>Senior</option>
                                        <option value=6>Adolescent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date">Date expiration :</label>
                                <input type="date" class="form-control" value="<?php echo $date ?>" placeholder="date Expiration" name="date"/>
                            </div>
                            <div class="form-group">
                                <label for="news">Votre News  :</label>
                                <textarea class="form-control"  required="required" name="news" rows="5" placeholder="Votre news "><?php echo $data['texte'] ?></textarea>
                            </div>
                            <div><button class="btn" type="submit">Enregistre news </button></div>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>


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