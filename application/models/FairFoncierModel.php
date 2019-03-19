<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FairFoncierModel extends CI_Model {

	function __construct()
	{

		parent::__construct();//contructeur de la classe
		date_default_timezone_set("Africa/Porto-Novo");
	}

	//Fonction d'ajout d'enregistrements
	function ivtAjouter($table,$data){

			if ($this->db->insert($table,$data)) {
				return array("success"=>true,"code"=>200,"data"=>$data,"message"=>"Insertion avec succes", "last_insert_id" => $this->db->insert_id());
			}else{
				return array("success"=>false,"code"=>500,"data"=>null,"message"=>"Errerur");
			}
		
	}

	//Fonction de modification d'enregistrements
	function ivtModifier($table,$data,$id=null, $column = null,$value=null ){

		$primary_key_name = null;
		$col_data = $this->db->query("SHOW COLUMNS FROM ".$table);

		if ($col_data->num_rows()>0) {
			foreach ($col_data->result() as $col) {
				if ($col->Key!='') {
					$primary_key_name = $col->Field;
				}
			}
		}

		if ($id != null && $this->db->update($table,$data,array($primary_key_name=>$id))) {
			// récupérer l'enregistrement après mise à jour
			return array("success"=>true,"code"=>200,"data"=>$this->ivtObtenirElement($table,$id)['data']);

		}elseif ($column != null && $value != null && $id == null && 
		 			$this->db->update($table,$data,array($column => $value))){

			return array("success"=>true,"code"=>200,"data"=>"");

		}else{
			return array("success"=>false,"code"=>500,"data"=>null);
		}
		
	}

	//Fonction de suppression d'enregistrements
	function ivtSupprimer($table,$id_array){
		$primary_key_name = null;
		$col_data = $this->db->query("SHOW COLUMNS FROM ".$table);

		if ($col_data->num_rows()>0) {
			foreach ($col_data->result() as $col) {
				if ($col->Key!='') {
					$primary_key_name = $col->Field;
				}
			}
		}

		if (!is_array($id_array)) {
			if ($this->db->delete($table,array($primary_key_name=>$id_array))) {
				return array("success"=>true,"data"=>null);
			}else{
				return array("success"=>false,"data"=>null);
			}
		}else{
			foreach ($id_array as $id) {
				$this->db->delete($table,array($primary_key_name=>$id));
			}
			return array("success"=>true,"data"=>null);
		}
										
	}

	//Fonction de recupération d'un enregistrement 
	function ivtObtenirElement($table,$id,$sql=null){	
		$primary_key_name = null;
		$col_data = $this->db->query("SHOW COLUMNS FROM ".$table);

		if ($col_data->num_rows()>0) {
			foreach ($col_data->result() as $col) {
				if ($col->Key!='') {
					$primary_key_name = $col->Field;
				}
			}
		}
		if ($sql==null) {
			$q = $this->db
			->select('*')
			->from($table)
			->where($primary_key_name,$id)
			->get();
		}else{
			$q = $this->db
			->select('*')
			->from($table)
			->where($sql)
			->where($primary_key_name,$id)
			->get();
		}
		if($q->num_rows()>0){
			return array("success"=>true,"code"=>200,"data"=>$q->row());
		}else{
			return array("success"=>false,"code"=>500,"data"=>null);
		}
	 }


	//Fonction de récupération des enregistrements d'une table
	function ivtLister($table,$ivtFiltre=null,$ivtMode=null){
		if ($ivtMode=="loadmore") {
			//
		}else{
			// Lister sans load more
			if ($ivtFiltre==null) {
				$q = $this->db
				->select('*')
				->from($table)
				->get();
			}else{
				$q = $this->db
				->select('*')
				->from($table)
				->where($ivtFiltre)
				->get();
			}
			
			if ($q->num_rows()>0) {
				foreach ($q->result() as $row) {
					$data[] = $row;
				}
				return array("success"=>true,"code"=>200,"data"=>$data);
			}else{
				return array("success"=>false,"code"=>500,"data"=>null);
			}
		}
		
		
	}

}



	 
