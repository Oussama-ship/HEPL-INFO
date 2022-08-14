
<div class="top-bar">

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tb-contact">

                        </div>
                    </div>
                  <?php
                    if(isset($_SESSION['user']) && !empty($_SESSION['user']))
                    {
                        echo '<div class="col-md-6">
                        <div class="tb-menu">
                            <a href="./LogOut.php">se deconnecter</a>
                           
                              </div>
                           </div>';
                    }
                    else
                    {
                            echo   '<div class="col-md-6">
                                      <div class="tb-menu">
                                         <a href="./inscription.php">S\'inscrire</a>
                                          <a href="./connexion.php">Se connecter</a>
                                      </div>
                                    </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Top Bar Start -->
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="b-logo">
                            <a href="index.php">
                                <img src="img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="Titre">
                        <p>Hepl News Info</p>
                    </div>

                </div>
            </div>
        </div>
        <!-- Brand End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                                <div class="dropdown-menu">
                                    <a href="./index.php" class="dropdown-item">tout</a>
                                    <a href="./index.php?var=1" class="dropdown-item">Enfant</a>
                                    <a href="./index.php?var=2" class="dropdown-item">Adulte</a>
                                    <a href="./index.php?var=4" class="dropdown-item">Senior </a>
                                    <a href="./index.php?var=6" class="dropdown-item">Adolescent </a>
                                </div>
                            </div>
                            <?php
                                    if(isset($_SESSION['user']) && !empty($_SESSION['user']))
                                    echo '<a href="addNews.php" class="nav-item nav-link">Ajouter Une news</a>';
                            ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
        
        <!-- Breadcrumb Start -->
       