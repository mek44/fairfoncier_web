
<div class="contenue">
  

<form action="<?php echo base_url(). 'Acceuil/save_user' ?>" method="post">
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
                            <label for="nom_prenom" class="col-md-2 col-sm-2 col-lg-2" >Photo</label>
                            
                            <div class="col-md-10 col-sm-10 col-lg-10">

                                <div id="my_camera" style="margin: 0; padding: 0;"></div>

                                <br/>

                                <input type=button value="Capturer" onClick="take_snapshot()" class="btn btn-primary btn-block">

                                <input type="hidden" name="image" class="image-tag"> <br>

                                <div id="results">
                                    <?php if ($this->session->flashdata('value')){ ?>
                                        <img src="<?php echo $this->session->flashdata('value')['img'] ?>">
                                    <?php }else {?>
                                       L'image capturée s'affichera ici...
                                    <?php } ?>
                                </div>

                            </div>
                        </div>

                         
                  </div>

                  <div class="col-lg-6 col-md-6  col-sm-6">

                      
                        <div class="form-group row">
                            <label for="nom" class="col-md-5 col-lg-5">Nom :</label>
                            <div class="col-md-7 col-lg-7">
                                <input type="text" class="form-control" name="nom" 
                                value="<?php if($this->session->flashdata('value')) {echo $this->session->flashdata('value')['nom']; }  ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prenom" class="col-md-5 col-lg-5">Prénoms :</label>
                            <div class="col-md-7 col-lg-7">
                                <input type="text" class="form-control" name="prenom"
                                value="<?php if($this->session->flashdata('value')) {echo $this->session->flashdata('value')['prenom']; }  ?>">
                            </div>
                        </div>
                              
                        <div class="form-group row">
                            <label for="date_naissance" class="col-md-5 col-lg-5">Date de Naissance :</label>
                            <div class="col-md-7 col-lg-7">
                                <input type="date" class="form-control" name="date_naissance"
                                value="<?php if($this->session->flashdata('value')) {echo $this->session->flashdata('value')['date_naissance']; }  ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telephone" class="col-md-5 col-lg-5">Téléphone :</label>
                            <div class="col-md-7 col-lg-7">
                                <input type="text" class="form-control" name="telephone"
                                value="<?php if($this->session->flashdata('value')) {echo $this->session->flashdata('value')['telephone']; }  ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="adresse" class="col-md-5 col-lg-5">Adresse :</label>
                            <div class="col-md-7 col-lg-7">
                                <input type="text" class="form-control" name="adresse"
                                value="<?php if($this->session->flashdata('value')) {echo $this->session->flashdata('value')['adresse']; }  ?>">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="numero_carte" class="col-md-5 col-lg-5">Numero de Carte : </label>
                            <div class="col-md-7 col-lg-7">
                                <input type="text" class="form-control" name="numero_carte"
                                value="<?php if($this->session->flashdata('value')) {echo $this->session->flashdata('value')['numero_carte']; }  ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="observation" class="col-md-5 col-lg-5">Observation :</label>
                            <div class="col-md-7 col-lg-7">
                                <textarea cols="10" rows="5" class="form-control" name="observation">
                                    <?php if($this->session->flashdata('value')) {echo $this->session->flashdata('value')['observation']; }  ?>
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numero_compte" class="col-md-8 col-lg-8"></label>
                            <div class="col-md-4 col-lg-4">
                                <button class="btn btn-primary">Ajouter Client</button>   
                            </div>
                             
                      </div>                     
                  </div>
                    
          </div>


      </div>

      </form> 
	  
	 

</div>
	  
<script>
    Webcam.set({

        width: 400,

        height: 200,

        image_format: 'jpeg',

        jpeg_quality: 90

    });


    Webcam.attach( '#my_camera' );
</script> 
