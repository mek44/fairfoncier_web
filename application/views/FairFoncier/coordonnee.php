


<div class="contenue">

<form method="post">
      <div class="container">

        <?php if ($this->session->flashdata('success')): ?>
			 <div class="alert alert-success" role="alert">
				<?php echo $this->session->flashdata('success'); ?>
			</div>
		<?php endif ?>
        <?php if ($this->session->flashdata('danger')): ?>
			<?php if(is_array($this->session->flashdata('danger'))) { ?>
				 <div class="alert alert-danger" role="alert">
					<ul>
						<?php for ($i=0; $i < sizeof($this->session->flashdata('danger')) ; $i++) { 
							echo $this->session->flashdata('danger')[$i];
						} ?>                            
					</ul>
				</div>
			<?php }else { ?>
				<div class="alert alert-danger" role="alert">
					<?php 
						echo $this->session->flashdata('danger')[$i];
					?>
				</div>
			<?php } ?>
		<?php endif ?>
        
          <div class="row">
                  <div class="col-lg-6 col-md-6  col-sm-6">
                         <div class="form-group row">
                            <label for="num_carte" class="col-md-5 col-lg-5">Code parcelle:</label>
                            <div class="col-md-7 col-lg-7">
                                <input type="number" min="0" id="codeparc"  class="form-control" name="num_carte" 
                                value="<?php if($this->session->flashdata('value')) {echo $this->session->flashdata('value')['num_carte']; }  ?>" >
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="arron" class="col-md-5 col-lg-5">Nom & Prénoms :</label>
                            <div class="col-md-7 col-lg-7">
                                <input type="text" class="form-control" readonly="readonly" name="nom_prenom" 
                                value="<?php if($this->session->flashdata('value')) {echo $this->session->flashdata('value')['arron']; }  ?>" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="arron" class="col-md-5 col-lg-5">Arrondissement :</label>
                            <div class="col-md-7 col-lg-7">
                                <input type="text" class="form-control" readonly="readonly" name="arron" 
                                value="<?php if($this->session->flashdata('value')) {echo $this->session->flashdata('value')['arron']; }  ?>" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="etat_lieu" class="col-md-5 col-lg-5">Etat Lieu :</label>
                            <div class="col-md-7 col-lg-7">
                                <input type="text" class="form-control" readonly="readonly" name="etat_lieu"
                                value="<?php if($this->session->flashdata('value')) {echo $this->session->flashdata('value')['etat_lieu']; }  ?>">
                            </div>
                        </div>
                              
                        <div class="form-group row">
                            <label for="quartier" class="col-md-5 col-lg-5">Quartier :</label>
                            <div class="col-md-7 col-lg-7">
                                <input type="text" class="form-control" readonly="readonly" name="quartier"
                                value="<?php if($this->session->flashdata('value')) {echo $this->session->flashdata('value')['quartier']; }  ?>">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="parcelle" class="col-md-5 col-lg-5">Parcelle :</label>
                            <div class="col-md-7 col-lg-7">
                                <input type="text" class="form-control" readonly="readonly" name="parcelle"
                                value="<?php if($this->session->flashdata('value')) {echo $this->session->flashdata('value')['parcelle']; }  ?>">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="superficie" class="col-md-5 col-lg-5">Superficie : </label>
                            <div class="col-md-7 col-lg-7">
                                <input type="text" class="form-control" readonly="readonly" name="superficie"
                                value="<?php if($this->session->flashdata('value')) {echo $this->session->flashdata('value')['superficie']; }  ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prix_achat" class="col-md-5 col-lg-5">Prix d'achat :</label>
                            <div class="col-md-7 col-lg-7">
                                <input type="text" class="form-control" readonly="readonly" name="prix_achat"
                                value="<?php if($this->session->flashdata('value')) {echo $this->session->flashdata('value')['prix_achat']; }  ?>">
                            </div>
                        </div>
                  </div>

                  <div class="col-lg-6 col-md-6  col-sm-6">

                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 row">
                                <div class="col-md-6 col-lg-6 col-sm-6">
                                  <input type="number" class="form-control" name="x" placeholder="x" id="x">
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6">
                                  <input type="number" class="form-control" name="y" placeholder="y" id="y">
                                </div>
                                
                            </div>
                        </div> 
                        <div class="form-group row">
                            
                            <div class="col-md-4 col-lg-4 col-sm-4">
                                  <button id="getcoor" class="btn btn-primary">Recuperer </button><br>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-4">
                                  <button class="btn btn-primary" id="ajouterCoordonner">Ajouter</button> 
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-4">
                              <button class="btn btn-primary" id="ReprendreCoordonner">Reprendre</button>
                           </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-md-4 col-lg-4 ">
                                  
                                </div>
                                <div class="col-md-8 col-lg-8">
                                    <textarea name="coordonnee" id="detailcoordonnee" cols="30" rows="8" class="form-control" readonly="readonly"></textarea>   
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="numero_compte" class="col-md-8 col-lg-8"></label>
                            <div class="col-md-4 col-lg-4">
                                <button class="btn btn-primary btn-block" id="UpdateCoodonner">Envoyer</button>   
                            </div>  
                      </div>                        
                  </div>    
          </div>
      </div>
      </form> 
</div>


<script type="text/javascript">

    $('#getcoor').click(function(event) {
        event.preventDefault();

          if(navigator.geolocation)
          {
            
            navigator.geolocation.getCurrentPosition(onPositionRecieved);
          }else
          {
              
          }
    });

    function onPositionRecieved(position)
    {
        console.log(position);
        $('input[name=x]').val(position.coords.latitude);
        $('input[name=y]').val(position.coords.longitude);
    }
</script>
	
