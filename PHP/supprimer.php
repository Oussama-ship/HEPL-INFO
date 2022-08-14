<?php

    session_start();
    require "bdd.php";
    require "modele.php";

    $id = $_GET["id"];


    deleteUser($id);

    header('Location:../index.php?login_err=supp');



?>