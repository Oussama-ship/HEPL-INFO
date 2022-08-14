<?php 


        session_start();
        require_once("./PHP/bdd.php");
        require_once("./PHP/modele.php");

        if(isset($_POST['pseudo']) && isset($_POST['password']))
        {
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $password = htmlspecialchars($_POST['password']);

                $check = getDatabyUsername($pseudo);
                $check->execute(array($pseudo));
                $data = $check->fetch();  
                $nrow = $check->rowCount();


                if($nrow > 0 )
                {
                        if(password_verify($password, $data['mdp']))
                        {
                                $_SESSION['user'] = $data['pseudo'];
                                header('Location: index.php');
                                die();
                        }else{ header('Location: connexion.php?login_err=password'); die(); }
                }else{ header('Location: connexion.php?login_err=already'); die(); }




        }else header('location:connexion.php');
        





?>