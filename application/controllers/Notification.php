<?php 
 /**
 * 
 */

class notification extends CI_Controller
{
	private $token;
	public function __construct()
	{
	  parent::__construct();

	    if($this->session->userdata('id')) {
		  $id=$this->session->userdata('id');
		}
		elseif($this->session->userdata('admin_login')) {
		  $id=$this->session->userdata('admin_login');
		}
		elseif($this->session->userdata('instuctor_login')) {
		  $id=$this->session->userdata('instuctor_login');
		}
		else{
		  $id=0;
		}


	  if($id==0)
      {
      	redirect(base_url().'login');
      }
	  $this->load->library('form_validation');
	  $this->load->library('encrypt');
	  $this->load->model('crud_model'); 
	  $this->load->model('login_model'); 

	  $this->token = "sk_test_51GzgDmLqhFzYb1A3uuqyWgXOqx2Pn5U97fIrCfgQDVdjXEoP088vU8inLAZIsMvGCdFYsu9NBnJXtxbgzMNHppVM00Bu7JZ1Qv";

	}

	function index(){
		$data['title']="mon profile admin";
		$this->load->view('backend/notification/templete', $data);
	}

	function cours_detail($param1=''){
		$data['title']="Détail du livre";
		$data['idl'] = $param1;
		$data['detail_livre'] = $this->crud_model->detail_livre_book($param1);
		$this->load->view('backend/notification/cours_detail', $data);
	}

	function savoir_su_livre($param1=''){

		$data['title']="Détail du livre";
		$data['bookIsbn'] = $param1;
		$this->load->view('backend/notification/book_isbn', $data);
	}

	function publication($param1=''){

		$data['title']="Détail de notification";
		$data['id_pub'] = $param1;
		$this->load->view('backend/notification/publication', $data);
	}

	


}


 ?>