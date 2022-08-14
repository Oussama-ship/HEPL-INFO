<?php

    session_start();
    date_default_timezone_set("Europe/Paris");
    require "../PHP/bdd.php";
    require "../PHP/modele.php";
 

    if(!empty($_POST['titre']) && $_POST['categorie'] && $_POST['news'])
    {
        $titre = htmlspecialchars($_POST['titre']);
        $news = htmlspecialchars($_POST['news']);
        $id = $_GET['var'];

        echo $id;
       
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
                encodeModifSansDate($id, $titre , $news , $user , $Sysdate  , $cat , $id);
            }else
            {
                if(strtotime($date) < strtotime($Sysdate))
                {
    
                    header("Location:../Modifier.php?login_err=dateInvalide&id={$id}"); die(); 
    
                }else{ 
                        encodeModifAvecDate($id , $titre , $news , $user , $Sysdate , $date , $cat , $id);
                } 
            }
           }else{header("Location:../Modifier.php?login_err=News&id={$id}"); die(); }
        
       }else{header("Location:../Modifier.php?login_err=Titre&id={$id}"); die(); }

    
               
        
    }
