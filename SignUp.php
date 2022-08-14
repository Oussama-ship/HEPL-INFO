<?php

        require_once "./PHP/bdd.php";
       
        require_once("./PHP/modele.php");

        if(!empty($_POST['pseudo'])  && !empty($_POST['password']) && !empty($_POST['password_retype']))
        {
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $password = htmlspecialchars($_POST['password']);
                $password_retype = htmlspecialchars($_POST['password_retype']);


                $check =  $check = getDatabyUsername($pseudo);
                $check->execute(array($pseudo));
                $data = $check->fetch();  
                $nrow = $check->rowCount();


                if($nrow == 0)
                {
                        if(verifPseudo($pseudo))
                        {
                            if($password == $password_retype)
                            {
                                    if(verifMdp($password))
                                    {
                                        insertUser($password , $pseudo , $cost);
                                    
                                    }{header("Location:inscription.php?reg_err=MdpFaux"); die();}

                            }else{header("Location:inscription.php?reg_err=mdpdif"); die();}

                        }else{header("Location: inscription.php?reg_err=PseudoInvalide"); die();}
                    
                }else{ header('Location: inscription.php?reg_err=already'); die();}

        }















?>