<div class="footer">

</div>
<div class="footer-menu">

    <?php
                    if(isset($_SESSION['user']) && !empty($_SESSION['user']))
                    {
                        echo   ' <div class="container">
                        <div class="f-menu">
                        <a href="./LogOut.php">se deconnecter</a>
                        </div> ';
                    }
                    else
                    {
                            echo   ' <div class="container">
                            <div class="f-menu">
                                <a href="./inscription.php">S\'inscrire</a>
                                <a href="./connexion.php">Se connecter</a>
                            </div> ';
                    }
                    ?>
</div>
</div>

<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 copyright">
                <p>Copyright &copy; . Hepl News info All Rights Reserved</p>
            </div>
        </div>
    </div>
</div>