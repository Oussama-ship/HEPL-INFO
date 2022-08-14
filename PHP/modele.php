<?php
   
 
   function getDatabyCat($param = null)
   {
       require "bdd.php";
      

      if($param == null)
      {
        $check = $bdd->prepare('select * from news');
        $check->execute();
        $data = $check->fetchAll();

        return  $data = array_reverse($data , true) ;   
      }

      switch($param)
      {
        case 1:
            $check = $bdd->prepare('select * from news where categorie = 1');
            $check->execute();
            $data = $check->fetchAll();

            return  $data = array_reverse($data , true) ;   

            break;

        case 2 :

            $check = $bdd->prepare('select * from news where categorie = 2');
            $check->execute();
            $data = $check->fetchAll();
            return  $data = array_reverse($data , true) ;   
            break;

         case 4:
            $check = $bdd->prepare('select * from news where categorie = 4');
            $check->execute();
            $data = $check->fetchAll();

            return  $data = array_reverse($data , true) ;  
            break;

            case 6:
                $check = $bdd->prepare('select * from news where categorie = 6');
                $check->execute();
                $data = $check->fetchAll();
                
                return  $data = array_reverse($data , true) ; 
                break;


      }
       
   }


   function getDatabyNews($param ) {

    require "bdd.php";

    return $check = $bdd->prepare('select  * from  news where idNews = ?');
  
    
   }

   
   function getDatabyUsername($param = null) {

    require "bdd.php";

   return $check = $bdd->prepare('select pseudo , mdp from  utilisateur where pseudo = ? ');
    
   }


    function getNewsById( $id)
    {
       require "bdd.php";
       $check = $bdd->prepare('select  * from  news where idNews = ?');
       $check->execute(array($id));
       return  $check->fetch();
    }

    function verifPseudo($p)
    {
        return (bool) preg_match('#^[ -_a-zA-Z0-9]{4,20}$#' , $p  );
    }


    function verifMdp($m)
    {
        return (bool) preg_match('#^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{5,25}$#', $m  );
    }


    function encodeModifSansDate($id, $titre , $news , $user , $Sysdate  , $cat , $id2)
    {
      require "bdd.php";
      $check = $bdd -> prepare('update news set    idNews=? ,titre = ?, texte = ?, pseudo = ?, publication = ?, categorie = ? where idNews = ? ');
      $check->execute(array( $id, $titre , $news , $user , $Sysdate  , $cat , $id2));
      header('Location:../index.php?login_err=success');
      die(); 
    }

    function encodeModifAvecDate($id , $titre , $news , $user , $Sysdate , $date , $cat , $id2)
    {
        require "bdd.php";
        $check = $bdd -> prepare('update news set idNews = ?,titre = ?, texte = ?, pseudo = ?, publication = ?, expiration = ?, categorie  = ? where idNews = ?');
        $check->execute(array($id , $titre , $news , $user , $Sysdate , $date , $cat , $id2));
        header('Location:../index.php?login_err=success'); 
        die(); 
    }

    function insertNewsWithoutDate( $titre , $news , $user , $Sysdate  , $cat)
    {
      require "bdd.php";
      $check = $bdd -> prepare('insert into news (idNews,titre, texte, pseudo, publication, categorie) VALUES ( ? , ?, ? , ? , ? , ? ) ');
      $check->execute(array($null , $titre , $news , $user , $Sysdate  , $cat));
      header('Location:../index.php?login_err=success');
      die(); 
    }

    function insertNewsWithDate( $titre , $news , $user , $Sysdate , $date , $cat)
    {
      require "bdd.php";
      $check = $bdd -> prepare('insert into news (idNews,titre, texte, pseudo, publication, expiration, categorie) VALUES ( ? , ?, ? , ? , ? , ?, ? ) ');
      $check->execute(array($null , $titre , $news , $user , $Sysdate , $date , $cat));
      header('Location:../index.php?login_err=success'); 
      die(); 
    }

    function insertUser($password, $pseudo , $cost)
    {
      require "bdd.php";
     
         $cost = ['cost' => 12];
         $password = password_hash($password, PASSWORD_BCRYPT, $cost);

         $insert = $bdd->prepare('INSERT INTO utilisateur(pseudo, mdp) VALUES(:pseudo, :mdp)');

             $insert->execute(array(
                  'pseudo' => $pseudo,
                    'mdp' => $password
                           ));
                                        
            header('Location:inscription.php?reg_err=success');
            die();
    }

    function deleteUser($id)
    {
      require "bdd.php";
      $check = $bdd -> prepare('delete from news where idNews = ? ');
      $check->execute(array($id));
  
    }








?>