<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Fair Foncier</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url(). 'Acceuil/create_user' ?>">Enrôllement</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url(). 'Acceuil/referentiel' ?>">Referentiel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url(). 'Acceuil/coordonnee' ?>">Coordonnees</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url(). 'Acceuil/identification' ?>">Identification</a>
            </li>

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url(). 'Acceuil/etat' ?>">Etat</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#"><?php echo $this->session->userdata('nom_prenom'); ?></a>
            </li> -->

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url(). 'Acceuil/deconnexion' ?>">Déconnexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>