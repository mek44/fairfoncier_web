
  
    <header class="masthead">
      <div class="container">
        <div class="intro-text" >
          <form method="post" action="<?php echo base_url().'Acceuil/login' ?>">
            <div class="row">
              <div class="col-lg-3 col-md-3"></div>
              <div class="col-lg-6 col-md-6">
                <?php if ($this->session->flashdata('danger')): ?>
                     <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('danger'); ?>
                    </div>
                <?php endif ?>

               
                <div class="form-group row">
                  <label for="pays" class="col-md-4 col-lg-4">Nom d'utilisateurs : </label>
                  <div class="col-md-7 col-lg-7">
                      <input type="text" class="form-control" name="username">
                  </div>
                </div>

                <div class="form-group row">
                    <label for="pays" class="col-md-4 col-lg-4">Mot de passe : </label>
                    <div class="col-md-7 col-lg-7">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
              </div>
            </div>
            
            
            <button class="btn btn-primary text-uppercase js-scroll-trigger" type="submit">Connexion</button>
          </form>
        </div>
      </div>
    </header>