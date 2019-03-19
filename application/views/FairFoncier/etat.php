
<div class="container">
	<div class="contenue row">
		<div class="col-lg-4 col-sm-4 col-md-4">
			Operation :
			<select name="" class="form-control" id="type_operation">
				<option value="enrollement">Enrollement</option>
				<option value="referentiel">Referentiel</option>
			</select>
		</div>
		<div class="col-lg-4 col-sm-4 col-md-4">
			Du : <input type="date" class="form-control" placeholder="Du" id="date_du">
		</div>
		<div class="col-lg-4 col-sm-4 col-md-4">
			Au : <input type="date" class="form-control" placeholder="Au" id="date_au">
		</div>
	</div><br>


<div class="" id="tableau_enrolement">
	<div class="row">
	<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead style="width:100%">
            <tr>
                <th>Photo</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Profession</th>
                <th>Date de Création</th>
            </tr>
        </thead>
        <tbody id="tbody_enrollement">	

        </tbody>
    </table>
	</div>
</div>


<div class="" id="tableau_referentiel" style="display: none;">
	<div class="row">
	<table id="example1" class="table table-striped table-bordered" style="width:100%">
        <thead style="width:100%">
            <tr>
                <th>Code Parcelle</th>
                <th>Proprietaire</th>
                <th>Arrondissement</th>
                <th>Quartier</th>
                <th>Parcelle</th>
                <th>Superficie</th>
            </tr>
        </thead>
        <tbody id="tbody_referentiel">	

        </tbody>
    </table>
	</div>
</div>	
</div>
