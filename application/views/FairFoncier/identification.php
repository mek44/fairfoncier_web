


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
          	<div class=" form-group col-lg-7 col-md-7 col-sm-7 row">
                <label for="num_carte" class="col-md-5 col-lg-5">Code parelle:</label>
                <input type="text" min="0" id="codeparcident"  class="form-control col-md-5 col-lg-5" name="codeparcident" >
			</div>
			<div class="col-lg-5 col-md-5  col-sm-5">
                <input type="text" min="0" name="nompre"  class="form-control" readonly="readonly">
			</div>
          </div><br><br>
          <div class="row">
                  <div class="col-lg-6 col-md-6  col-sm-6">
                        <div class="form-group row">
                            <label for="conventionVente" class="col-md-5 col-lg-5">Convention de vente:</label>
                            <div class="col-md-5 col-lg-5">
                                <input type="text" min="0" id="conventionVente"  class="form-control" name="conventionVente" readonly="readonly">
                            </div>
                            <div>
                            	<button type="button" class="btn btn-primary smcapture" id="conventionVente" >
								  Charger
								</button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="permis" class="col-md-5 col-lg-5">Permis:</label>
                            <div class="col-md-5 col-lg-5">
                                <input type="text" min="0" id="permis "  class="form-control" name="permis" readonly="readonly">
                            </div>
                            <div>
                            	<button type="button" class="btn btn-primary smcapture" id="permis" >
								  Charger
								</button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="attestaionRecasement" class="col-md-5 col-lg-5">Attestation de recasement:</label>
                            <div class="col-md-5 col-lg-5">
                                <input type="text" min="0" id="attestaionRecasement"  class="form-control" name="attestaionRecasement" readonly="readonly">
                            </div>
                            <div>
                            	<button type="button" class="btn btn-primary smcapture" id="attestaionRecasement" >
								  Charger
								</button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="certificat" class="col-md-5 col-lg-5">Certificat:</label>
                            <div class="col-md-5 col-lg-5">
                                <input type="text" min="0" id="certificat"  class="form-control" name="certificat" readonly="readonly" >
                            </div>
                            <div>
                            	<button type="button" class="btn btn-primary smcapture" id="certificat" >
								  Charger
								</button>
                            </div>
                        </div>
                  </div>

                  <div class="col-lg-6 col-md-6  col-sm-6">
						
						<div class="form-group row">
                            <label for="quittanceTresor" class="col-md-5 col-lg-5">Quittance de trésor:</label>
                            <div class="col-md-5 col-lg-5">
                                <input type="text" min="0" id="quittanceTresor"  class="form-control" name="quittanceTresor" readonly="readonly">
                            </div>
                            <div>
                            	<button type="button" class="btn btn-primary smcapture" id="quittanceTresor" >
								  Charger
								</button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lettreAttricution" class="col-md-5 col-lg-5">Lettre d'attribution:</label>
                            <div class="col-md-5 col-lg-5">
                                <input type="text" min="0" id="lettreAttricution"  class="form-control" name="lettreAttricution" readonly="readonly">
                            </div>
                            <div>
                            	<button type="button" class="btn btn-primary smcapture" id="lettreAttricution" >
								  Charger
								</button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="empreinteFile" class="col-md-5 col-lg-5">Fichier d'empreinte:</label>
                            <div class="col-md-5 col-lg-5">
                                <input type="text" min="0" id="empreinteFile"  class="form-control" name="empreinteFile" readonly="readonly">
                            </div>
                            <div>
                            	<button type="button" class="btn btn-primary smcapture" id="empreinteFile" >
								  Charger
								</button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="empreinteImage" class="col-md-5 col-lg-5">Image empreinte:</label>
                            <div class="col-md-5 col-lg-5">
                                <input type="text" min="0" id="empreinteImage"  class="form-control" name="empreinteImage" readonly="readonly">
                            </div>
                            <div>
                            	<button type="button" class="btn btn-primary smcapture" id="empreinteImage" >
								  Charger
								</button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="autre" class="col-md-5 col-lg-5">Autres:</label>
                            <div class="col-md-5 col-lg-5">
                                <input type="text" min="0" id="autre"  class="form-control" name="autre"readonly="readonly">
                            </div>
                            <div>
                            	<button type="button" class="btn btn-primary smcapture" id="autre" >
								  Charger
								</button>
                            </div>
                        </div>
                  </div>

          </div>
      </div>
      </form> 
</div>



<!-- Modal -->
<div class="modal fade" id="imgCapture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Capture du document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="post">
      		<input type="hidden" id="id_client" name="id_client">
      		<input type="hidden" id="filename" name="filename">


			<div class="form-group row" id="nom_autre" style="display: none;">
				<div class="col-md-8 col-sm-8 col-lg-8">
					<input type="text" class="form-control" id="nom_fichier" name="nom_fichier" placeholder="Nom du document">
				</div>
			</div>

      		<div class="form-group row">
            
            <div class="col-md-12 col-sm-12 col-lg-12">

                <div id="my_camera" style="margin: 0; padding: 0;"></div>

                <br/>

                <input type=button value="Capturer" onClick="take_snapshot_identification()" class="btn btn-primary btn-block">

                <input type="hidden" name="image" class="image-tag"> <br>

              

            </div>
        </div>
      	</form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
        <button type="button" class="btn btn-primary" id="addFile">Ajouter</button>
      </div>
    </div>
  </div>
</div>
	


<script>
	Webcam.set({

        width: 450,

        height: 400,

        image_format: 'jpeg',

        jpeg_quality: 200

    });


    Webcam.attach( '#my_camera' );
</script>