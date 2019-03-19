<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acceuil extends CI_Controller {


	public function index()
	{
		$this->load->view('FairFoncier/content/header');
		$this->load->view('FairFoncier/login');
		$this->load->view('FairFoncier/content/footer');
	}

	public function login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		if($username == "" || $password == "")
		{
			$this->session->set_flashdata('danger', 'Tous les champs sont réquis pour se connecter');
			redirect('acceuil');
		}else
		{
			$data = 
			([
				'username' => $username,
				'password' => $password
			]);
			$data1 = $this->ffm->ivtLister("user", $data);

			if(!$data1['success'])
			{
				$this->session->set_flashdata('danger', 'Nom d\'utilisateur ou mot de passe incorect');
				redirect('acceuil');
			}else
			{
				
				$this->session->set_flashdata('success', 'connexion avec succes');

				$datasession = 
				([
					'id_user'    => $data1['data'][0]->id_user,
					'nom_prenom' => $data1['data'][0]->nom. ' ' .$data1['data'][0]->prenom,
					'username'   => $data1['data'][0]->username,
					'logged'     => true
				]);
				
				$this->session->set_userdata( $datasession );
				redirect('create_user');
			}
		}
	}

	public function create_user()
	{

		if( $this->session->userdata('logged'))
		{
			$this->load->view('FairFoncier/content/header');
			$this->load->view('FairFoncier/content/nav');
			$this->load->view('FairFoncier/create_user');
			$this->load->view('FairFoncier/content/footer');

		}else
		{
			redirect(base_url());
		}
		
	}

	public function save_user()
	{
		if( $this->session->userdata('logged'))
		{
		    $img = $_POST['image'];
		    $nom = $_POST['nom'];
		    $prenom = $_POST['prenom'];
		    $date_naissance = $_POST['date_naissance'];
		    $telephone = $_POST['telephone'];
		    $adresse = $_POST['adresse'];
		    $numero_carte = $_POST['numero_carte'];
		    $observation = $_POST['observation'];



		    if ($nom == "" || $prenom == "" ||$date_naissance == "" || $telephone == "" || $adresse == "" || $numero_carte == "" || $img == "")
		    {

		    	$dataflash = 
		    	([
		    		($nom == "") ? "<li>Vous n'avez pas renseigner le nom</li>" : "",
		    		($prenom == "") ? "<li>Vous n'avez pas renseigner le prenom</li>" : "",
		    		($date_naissance == "") ? "<li>Vous n'avez pas renseigner la date de naissance</li>" : "",
		    		($telephone == "") ? "<li>Vous n'avez pas renseigner le téléphone</li>" : "",
		    		($adresse == "") ? "<li>Vous n'avez pas renseigner l'adresse</li>" : "",
		    		($numero_carte == "") ? "<li>Vous n'avez pas renseigner le numero de la carte</li>" : "",
		    		($img == "") ? "<li>Vous n'avez pas capturer l'image.</li>" : ""
		    	]);

		    	$dataflashvalue = 
		    	([
		    		'nom' => $nom,
		    		'prenom' => $prenom,
		    		'date_naissance' => $date_naissance ,
		    		'telephone' => $telephone,
		    		'adresse' => $adresse,
		    		'numero_carte' => $numero_carte,
		    		'img' => $img,
		    		'observation' => $observation
		    	]);

		    	$this->session->set_flashdata('danger', $dataflash);

		    	$this->session->set_flashdata('value', $dataflashvalue);

		    	redirect('create_user');

		    }else
		    {

		    	$folderPath = "./assets/upload/";

			    $image_parts = explode(";base64,", $img);

			    $image_type_aux = explode("image/", $image_parts[0]);

			    $image_type = $image_type_aux[1];

			  

			    $image_base64 = base64_decode($image_parts[1]);

			    $fileName = uniqid() . '.jpeg';

			  

			    $file = $folderPath . $fileName;

			    file_put_contents($file, $image_base64);

			    $filecontent = file_get_contents($file, 'rb');
				
				$id_user =  $this->session->userdata('id_user');

			    $datainsert = 
			    ([
			    	'image_user_blob' => $filecontent,
			    	'nom' => $nom,
		    		'prenom' => $prenom,
		    		'date_naissance' => $date_naissance ,
		    		'telephone' => $telephone,
		    		'addresse' => $adresse,
		    		'num_carte' => $numero_carte,
		    		'observation' => $observation,
		    		'dateCreation' => date('Y-m-d H:i:s'),
		    		'dateModification' => date('Y-m-d H:i:s'),
		    		'id_user'  => $this->session->userdata('id_user')
			    ]);

			    $datainsert1 = $this->ffm->ivtAjouter("client", $datainsert);

			    if(!$datainsert1['success'])
				{
					$this->session->set_flashdata('danger', $datainsert1['message']);
					redirect('create_user');
					
					
				}else
				{
					$this->session->set_flashdata('success', "utilisateur Crée avec succès");
					redirect('create_user');
				}

		    }
		}else
		{
			redirect(base_url());
		}
		    

	}


	public function deconnexion()
	{
		$cookie = array(
            'name'   => 'user',
            'value'  => '',
            'expire' => time()-3600,
            'path'   => '/',
        );
        $this->input->set_cookie($cookie);
        $this->session->sess_destroy();

        redirect(base_url());
	}


	public function referentiel()
	{
		if( $this->session->userdata('logged'))
		{
			$this->load->view('FairFoncier/content/header');
			$this->load->view('FairFoncier/content/nav');
			$this->load->view('FairFoncier/referentiel');
			$this->load->view('FairFoncier/content/footer');

		}else
		{
			redirect(base_url());
		}
	}

	public function save_referentiel($value='')
	{
		$num_carte = $_POST['num_carte'];
	    $arron = $_POST['arron'];
	    $etat_lieu = $_POST['etat_lieu'];
	    $quartier = $_POST['quartier'];
	    $ilot = $_POST['ilot'];
	    $sous_ilot = $_POST['sous_ilot'];
	    $parcelle = $_POST['parcelle'];
	    $superficie = $_POST['superficie'];
	    $prix_achat = $_POST['prix_achat'];

	    $findClient = $this->ffm->ivtLister("client", array("num_carte"=>$num_carte));


	    if ($num_carte == "" || $arron == "" ||$quartier == "" || $superficie == "" || $prix_achat == "" ||
			!$findClient['success'] )
		    {

		    	$dataflash = 
		    	([
		    		($num_carte == "") ? "<li>Vous n'avez pas renseigner le numero de la carte</li>" : "",
		    		($arron == "") ? "<li>Vous n'avez pas renseigner l'arrondissement</li>" : "",
		    		($quartier == "") ? "<li>Vous n'avez pas renseigner le quartier</li>" : "",
		    		($superficie == "") ? "<li>Vous n'avez pas renseigner la superficie</li>" : "",
		    		($prix_achat == "") ? "<li>Vous n'avez pas renseigner le prix d'achat</li>" : "",
		    		(!$findClient['success']) ? "<li>Client inexistant</li>" : ""
		    	]);

		    	$dataflashvalue = 
		    	([
		    		'num_carte' => $num_carte,
		    		'arron' => $arron,
		    		'etat_lieu' => $etat_lieu ,
		    		'quartier' => $quartier,
		    		'ilot' => $ilot,
		    		'sous_ilot' => $sous_ilot,
		    		'parcelle' => $parcelle,
		    		'superficie' => $superficie,
		    		'prix_achat' => $prix_achat
		    	]);

		    	$this->session->set_flashdata('danger', $dataflash);

		    	$this->session->set_flashdata('value', $dataflashvalue);

		    	redirect('referentiel');

		    }else
		    {
		    	$exist_arron = $this->ffm->ivtLister("arrondissement", array("libelle"=>$arron));

				if($exist_arron["success"])
				{
					$id_arron = $exist_arron["data"][0]->id_arrondissement;

				}else
				{
					$data = ([
						'libelle' => $arron,
						'dateCreation' => date('Y-m-d H:i:s'),
		    			'dateModification' => date('Y-m-d H:i:s')
					]);
					$result = $this->ffm->ivtAjouter("arrondissement",$data);
					$id_arron = $result['last_insert_id'];
				}


				$exist_quar = $this->ffm->ivtLister("quartiers", array("libelle"=>$quartier));

				if($exist_quar["success"])
				{
					$id_quartier = $exist_quar["data"][0]->id;
				}else
				{
					$data = ([
						'libelle' => $quartier,
						'arrondissement' =>id_arron
					]);
					$result = $this->ffm->ivtAjouter("quartiers",$data);
					$id_quartier = $result['last_insert_id'];
				}


				$code = rand(111111,999999);
				$existcode = $this->ffm->ivtLister("référentiel", array("codeparc"=>rand(111111,999999)));

				while ($existcode["success"]) {
					$code = rand(111111,999999);
					$existcode = $this->ffm->ivtLister("référentiel", array("codeparc"=>rand(111111,999999)));
				}

				$codeparc = $code;

		    	$dataInsertRef = 
		    	([
		    		'arrondissement' => $id_arron,
		    		'etat_lieu' => $etat_lieu ,
		    		'quartier' => $id_quartier,
		    		'ilot' => $ilot,
		    		'sousilot' => $sous_ilot,
		    		'parcelle' => $parcelle,
		    		'superficie' => $superficie. ' m²',
		    		'pa' => $prix_achat,
		    		'identite' => $findClient['data'][0]->id_client,
		    		'codeparc' => $code,
		    		'id_user' => $this->session->userdata('id_user')
		    	]);

		    	$insert = $this->ffm->ivtAjouter("référentiel",$dataInsertRef);

		    	if($insert["success"])
		    	{
		    		$this->session->set_flashdata('success', "Enregistrement effectué avec succes. <br> Le code de la parcelle est : <b>".$code."</b>");

		    		redirect('referentiel');
		    	}else
		    	{
		    		$this->session->set_flashdata('danger', "Erreur d'insertion");

		    		redirect('referentiel');
		    	}

		    	
		    }
		
	}

	public function coordonnee()
	{
		if( $this->session->userdata('logged'))
		{
			$this->load->view('FairFoncier/content/header');
			$this->load->view('FairFoncier/content/nav');
			$this->load->view('FairFoncier/coordonnee');
			$this->load->view('FairFoncier/content/footer');

		}else
		{
			redirect(base_url());
		}
	}


	public function getInfoCoordonne()
	{
		$codeparc = $_POST['codeparc'];

		$result = $this->ffm->ivtLister("info_parcelle", array("codeparc" => $codeparc));

		echo json_encode($result);
	}

	public function addcoordonne()
	{
		$data = ([
			'x' => $_POST['x'],
			'y' => $_POST['y']
		]);

		$detailcor = $_POST['detailcor'];

		if($detailcor == "")
		{
			$this->db->query("TRUNCATE TABLE inter_refe");
			$result = $this->ffm->ivtAjouter('inter_refe', $data);
		}else
		{
			$result = $this->ffm->ivtAjouter('inter_refe', $data);
		}

		

		echo json_encode($result);
	}

	public function ReprendreCoordonne()
	{
		if($this->db->query("TRUNCATE TABLE inter_refe"))
		{
			echo json_encode(array('success'=> true));
		}
	}


	public function ajoutCoordonnee()
	{
		$codeparc = $_POST['codeparc'];

		$result = $this->ffm->ivtLister("info_parcelle", array("codeparc" => $codeparc));

		$resultcood = $this->ffm->ivtLister("inter_refe");

		if(!$result['success'])
		{
			$response = ([
				'success' => false,
				'message' => 'Veuillez entrer un code parcelle valide'
			]);

		}elseif (!$resultcood['success']) {

			$response = ([
				'success' => false,
				'message' => 'Veuillez entrer les coordonnees de la parcelle'
			]);

		}elseif (sizeOf($resultcood['data']) < 4) {
			
			$response = ([
				'success' => false,
				'message' => 'Une parcelle doit avoir au moin quatre coordonnees'
			]);

		}else
		{
			$coor = "";

			for ($i=0; $i < sizeOf($resultcood['data']) ; $i++) 
			{ 
				
				if ($i == 0) 
				{
					$coor = $resultcood['data'][$i]->x. ',' .$resultcood['data'][$i]->y;
					
				}else{
					$coor = $coor. ';' . $resultcood['data'][$i]->x. ',' .$resultcood['data'][$i]->y;

				}
				
			}

			$data = ([
				'coordonnés' => $coor
			]);

			$resultUpdate = $this->ffm->ivtModifier("référentiel",$data,"","codeparc",$codeparc);

			if($resultUpdate['success'])
			{
				$response = ([
					'success' => true,
					'message' => "Insertion avec succès"
				]);
			}else
			{
				$response = ([
					'success' => false,
					'message' => "Erreur de Modification"
				]);
			}

		}

		echo json_encode($response);
	}


	public function identification()
	{
		if( $this->session->userdata('logged'))
		{
			$this->load->view('FairFoncier/content/header');
			$this->load->view('FairFoncier/content/nav');
			$this->load->view('FairFoncier/identification');
			$this->load->view('FairFoncier/content/footer');

		}else
		{
			redirect(base_url());
		}
	}


	public function add_identification()
	{
		
	    $img = $_POST['image'];
	    $id_client = $_POST['id_client'];
	    $filename = $_POST['filename'];
	    $codeparc = $_POST['codeparc'];

	    $datainsert = array();

	    if ($img == "")
	    {

	    	$response = ([
				'success' => false,
				'message' => "L'image n'a pas encore été capturée"
			]);

	    }else
	    {

	    	$folderPath = "./assets/upload/";

		    $image_parts = explode(";base64,", $img);

		    $image_type_aux = explode("image/", $image_parts[0]);

		    $image_type = $image_type_aux[1];

		  

		    $image_base64 = base64_decode($image_parts[1]);

		    if ($filename == "autre") {
		    	$fileName = $_POST['nom_fichier_autre'] . '.jpeg';
		    }else
		    {
		    	$fileName = $filename . '.jpeg';
		    }

		    $file = $folderPath . $fileName;

		    file_put_contents($file, $image_base64);

		    $filecontent = file_get_contents($file, 'rb');
			
			$id_user =  $this->session->userdata('id_user');

			$filenameBlob = $filename.'Blod';

			$content = $this->ffm->ivtLister('numerisation_doc', array('codeparc' => $codeparc));

			if($filename != "autre")
			{
				$datainsert = 
			    ([
			    	$filenameBlob => $filecontent,
			    	$filename => $fileName,
		    		'dateReferencer ' => date('Y-m-d H:i:s'),
		    		'id_user'  => $this->session->userdata('id_user')
			    ]);
			}else
			{
				$dataautre = 
			    ([
			    	"link" => $fileName,
			    	"image_user_blob" => $filecontent
			    ]);

			    $ajoutautre = $this->ffm->ivtAjouter('image', $dataautre);

			    if($ajoutautre['success'])
			    {
			    	
			    	if($content['success'])
			    	{
			    		$autre = $content['data'][0]->autres;
			    		$autre = ($autre == "") ? ($ajoutautre['last_insert_id']) : ($autre. ',' . $ajoutautre['last_insert_id']);

			    		$datainsert = 
					    ([
					    	'autres'=> $autre,
				    		'dateReferencer ' => date('Y-m-d H:i:s'),
				    		'id_user'  => $this->session->userdata('id_user')
					    ]);
			    	}else
			    	{
			    		$datainsert = 
					    ([
					    	'autres'=> $ajoutautre['last_insert_id'],
				    		'dateReferencer ' => date('Y-m-d H:i:s'),
				    		'id_user'  => $this->session->userdata('id_user')
					    ]);
			    	}
			    }
			}

		    
		    if(!$content['success'])
			{
				$datainsert['codeparc'] = $codeparc;
				$datainsert['id_client'] = $id_client;
			    $datainsert1 = $this->ffm->ivtAjouter('numerisation_doc', $datainsert);
			}else
			{
				$datainsert1 = $this->ffm->ivtModifier("numerisation_doc", $datainsert, "", "codeparc", $codeparc);
			}

		    if($datainsert1['success'])
			{
				
				$response = ([
					'success' => true,
					'filename' => $filename,
					'fileName' => $fileName,
					'message' => "Document ". $fileName ." numerisé avec succès"
				]);

			}else
			{
				$response = ([
					'success' => false,
					'message' => "Erreur d'insertion"
				]);
			}

	    }

	    echo json_encode($response);
	}


	public function etat($value='')
	{
		if( $this->session->userdata('logged'))
		{
			$this->load->view('FairFoncier/content/header');
			$this->load->view('FairFoncier/content/nav');
			$this->load->view('FairFoncier/etat');
			$this->load->view('FairFoncier/content/footer');

		}else
		{
			redirect(base_url());
		}
	}


	public function etat_operation($typeOperation)
	{
		$datedebut = $_POST['datedebut'];
		$datefin = $_POST['datefin'];

		if ($typeOperation == "enrollement") {
			
			if ($datedebut != "" && $datefin != "") 
			{
				$result = $this->ffm->ivtLister('client', 
					array(
						'id_user' => $this->session->userdata('id_user'), 
						'date(dateCreation) >=' => $datedebut,
						'date(dateCreation) <=' => $datefin
					));

			}else
			{
				$result = $this->ffm->ivtLister('client', array('id_user' => $this->session->userdata('id_user')));
			}
			

			if($result['success'])
			{
				
				for ($i=0; $i < sizeOf($result['data']) ; $i++) { 
					$data[$i]['photo'] = base64_encode($result['data'][$i]->image_user_blob );
					$data[$i]['nom'] = $result['data'][$i]->nom;
					$data[$i]['prenom'] = $result['data'][$i]->prenom;
					$data[$i]['profession'] = $result['data'][$i]->profession;
					$data[$i]['dateCreation'] = $result['data'][$i]->dateCreation;
				}
				$response = ([
					'success' => true,
					'data' => $data,
					'message' => "Ajouter"
				]);
			}else
			{

				$response = ([
					'success' => false,
					'message' => "Aucune donnee dans le tableau"
				]);
			}
		

		}elseif ($typeOperation == "referentiel") {
			
			$result = $this->ffm->ivtLister('info_parcelle', array('id_user' => $this->session->userdata('id_user')));

			if($result['success'])
			{
				$response = ([
					'success' => true,
					'data' => $result['data'],
					'message' => "Ajouter"
				]);
			}else
			{

				$response = ([
					'success' => false,
					'message' => "Aucune donnee dans le tableau"
				]);
			}
		}


		echo json_encode($response);
	}


	
}
