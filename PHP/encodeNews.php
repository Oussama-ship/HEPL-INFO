<?php
    session_start();
    date_default_timezone_set("Europe/Paris");
    require "./bdd.php";
    require "./modele.php";

    
    

        if(!empty($_POST['titre']) && $_POST['categorie'] && $_POST['news'])
        {

            $titre = htmlspecialchars($_POST['titre']);
            $news = htmlspecialchars($_POST['news']);
            if(strlen($titre) > 3 && strlen($titre) < 95 )
            {
                if(strlen($news) > 10 && strlen($news) < 400 )
                {
                    $date = $_POST['date'];
            
                    $Sysdate = date("Y/m/d");
                    $user = $_SESSION['user'];
                    $cat = $_POST['categorie'];
                    $null = null;
                    if(empty($date))
                    {
                        insertNewsWithoutDate($titre , $news , $user , $Sysdate  , $cat);
                    }else
                    {
                        if(strtotime($date) < strtotime($Sysdate))
                        {
            
                            header('Location:../addNews.php?login_err=dateInvalide'); die(); 
            
                        }else{ 
                            insertNewsWithDate($titre , $news , $user , $Sysdate , $date , $cat);
                        } 
                     }
                }else{ header('Location:../addNews.php?login_err=News'); die(); }
              
            }else{ header('Location:../addNews.php?login_err=Titre'); die(); }
            
          
              
              
        }






?>