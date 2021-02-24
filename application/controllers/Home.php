<?php

/**
* 
*/
class home  extends CI_controller
{

	public function __construct()
	{	
		parent::__construct();
		$this->load->model('main_model');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->library('session');
		$this->load->helper('security');

		if($this->session->userdata('id')) {
		  redirect("student");
		}
		elseif($this->session->userdata('admin_login')) {
		  redirect("admin");
		}
		elseif($this->session->userdata('instuctor_login')) {
		  
		}
		else{
		  
		}

	}
	
	
	function index(){
		$this->load->helper('url');
		$data['title']="Bienvenue chez nous white fondation";
		// $this->load->view('backend/apprenant/index', $data);
		$this->load->view('backend/cours/home', $data);
	}

	function dash(){
		$data['title']="Bienvenue chez nous white fondation";
		$this->load->view('backend/apprenant/index', $data);
	}
	function blob(){
		$data['title']="savoir plus sur nous white fondation";
		$this->load->view('backend/apprenant/blob', $data);
	}
	function sms_sender_conact(){
		$data['title']="prenez contacte et recevoir plus de chance de nos meilleurs";
		$this->load->view('backend/apprenant/contact', $data);
	}


}


?>