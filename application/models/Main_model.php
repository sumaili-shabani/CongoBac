<?php

/**
* main controller
*/
class main_model extends CI_model
{

/**
* insert data
*/

function commentNumber($post_id){

	$this->db->like('post_id',$post_id);
	$this->db->from('tbl_commentonpost');
	return $this->db->count_all_results();

}

function select_all_message($user_id_chat,$user_id){
	
	return $this->db->query("SELECT * FROM tbl_message WHERE (user_id='".$user_id."' AND from_user_id='".$user_id_chat."') OR (user_id='".$user_id_chat."' AND from_user_id='".$user_id."')  ORDER BY timestamp DESC LIMIT 8");

}

function update_status($user_id,$user_id_chat,$data){
	$where="user_id='".$user_id."' AND from_user_id='".$user_id_chat."' AND status=1";
	$this->db->where($where);
	return $this->db->update('tbl_message',$data);
}

function count_unseen_message($user_id,$user_id_chat){
	$where="user_id='".$user_id."' AND from_user_id='".$user_id_chat."' AND status=1 ";
   $this->db->where($where);
   $this->db->from('tbl_message');
   return $this->db->count_all_results();

}


function countNumberlike($post_id){
	$this->db->like('post_id',$post_id);
	$this->db->from('tbl_like');
	return $this->db->count_all_results();
}
function prevent_two_like($user_id,$post_id){
	//to continue
	$this->db->query('SELECT * FROM tbl_like WHERE user_id="'.$user_id.'" AND post_id="'.$post_id.'"');
}
function insert_comment_liked($data){
	$this->db->insert('tbl_like',$data);
	return $data;
}
   function insert_online($user_id,$data){

   	$this->db->where('user_id',$user_id);
   	$this->db->update('tbl_users',$data);

   }

   function check_if_user_online($user_id){
   	$this->db->where('user_id',$user_id);
   	$query=$this->db->get('tbl_users');

   	foreach ($query->result() as $row) 
   	{ 
   		if ($row->online_status=="1") 
   		{
   			return $stastus='<button class="btn btn-danger btn-sm">online</button>';
   		}
   		else
   		{
   			return $stastus='<button style="background-color:purple;color:#fff;" class="btn btn-default btn-sm">offline</button>';
   		}
   	}
   }
	function tbl_user_insert($data)
	{
		$this->db->insert('tbl_users',$data);
		return $data;

	}

	function inserttbl_commentonpost($data){
		$this->db->insert('tbl_commentonpost',$data);
		return $data;
	}

	function insert_tbl_post($data)
	{
		$this->db->insert('tbl_post',$data);
		return $data;

	}
	function insert_chat_message($data){
		$this->db->insert('tbl_message',$data);
		return $data;
	}

	function Checktext($post_message){
	return preg_replace('#(((https?|ftp)://(w{3}\.)?)(?<!www)(\w+-?)*\.([a-z]{2,4}))#', "<a style='color:#007bff;' href=\"$0\">$0</a>", $post_message);
}
   function fetch_image($user_id){
   $query=$this->db->query('SELECT * FROM tbl_users WHERE user_id="'.$user_id.'" ');
   foreach ($query->result() as $row) 
   {
   	 return '<img class="img-thumbnail" style="width:50px;height:50px;border-radius:100px;" src="'.base_url('upload/'.$row->image).'">';
   }
   }

	function read_more_comment($string_text,$post_id){

		$string=strlen($string_text);
		if ($string > 90) {
			
			return '<p  id="seemore'.$post_id.'">'.substr($this->Checktext($string_text),0, 87).'...<a class="moretext" id="'.$post_id.'" href="#">see more</a></p>';
		}
		else{
			return $this->Checktext($string_text);
		}
	}
	function read_more_commented($string_text,$comt_on_post_id){

		$string=strlen($string_text);
		if ($string > 90) {
			
			return '<p  id="seemor'.$comt_on_post_id.'">'.substr($this->Checktext($string_text),0, 87).'...<a class="more" id="'.$comt_on_post_id.'" href="#">see more</a></p>';
		}
		else{
			return $this->Checktext($string_text);
		}
	}
	function show_all_tex($string_text,$comt_on_post_id){

		return '<p style="display:none;" id="tt'.$comt_on_post_id.'" >'.substr($this->Checktext($string_text),0).'<a class="lesstex" id="'.$comt_on_post_id.'"  href="#">less</a></p>';

	}

	function show_all_text($string_text,$post_id){

		return '<p style="display:none;" id="lesstext'.$post_id.'" >'.substr($this->Checktext($string_text),0).'<a class="lesstext" id="'.$post_id.'"  href="#">less</a></p>';

	}
	
	function selectUserCommentOnPost($post_id){

		$query=$this->db->query("SELECT * FROM tbl_users,tbl_commentonpost WHERE  tbl_users.user_id=tbl_commentonpost.com_user_id AND post_id='".$post_id."' LIMIT 5 ");
		$ouput='';
		 foreach ($query->result() as $row) 
		 {
		 	$ouput.='<div style="position:relative;left:40px;">';
		 	$ouput.='<img class="img-thumbnail" style="border-radius:100px; height:60px;width:60px;"  src="'.base_url().'upload/'.$row->image.'">';
		 	$ouput.='<span  class="">'.$row->user_name.' '.'</span>';
		 	$ouput.='<span><a href="#">'.$row->email.'</a></span><br>';
		 	$ouput.=$this->show_all_tex($row->message,$row->comt_on_post_id);
		 	$ouput.='<span  class="short_text">'.$this->read_more_commented($row->message,$row->comt_on_post_id).'</span><br>
		 	<i class="fa fa-clock-o"></i><span class="timeago" title="'.$row->times_stamp.'">'.$row->times_stamp.'</span><br>';
		 	$ouput.='</div>';
		 	
		 	
		 }
		 return $ouput;

	}

/**
* for login validation
*/	

	function can_login($email,$password)
	{
		$this->db->where('email',$email);
		$query=$this->db->get('tbl_users');

		if ($query->num_rows()) 
		{
			foreach ($query->result() as $row) 
			{
				$store_password=$this->encrypt->decode($row->password);

				if ($store_password==$password) 
				{
					$this->session->set_userdata('user_id',$row->user_id);
				}
				else
				{
					return 'wrong password';
				}
			}
		}
		else
		{
			return 'wrong E-mail address';
		}
		

	}
/**
* for fetch user data
*/

	function fetch_session_data($user_id)
	{
		$this->db->where('user_id',$user_id);
		$query=$this->db->get('tbl_users');
		return $query;	
		
		
	}

	function fetch_all_post(){


		$query=$this->db->query("SELECT * FROM tbl_post,tbl_users WHERE tbl_users.user_id=tbl_post.user_id ORDER BY post_id desc LIMIT 5");

		return $query;	

	}

	function fetch_tbl_users($user_id)
	{
		$this->db->where('user_id',$user_id);
		$query=$this->db->get('tbl_users');
		return $query;

	}

/**
* update_profile
*/
	function update_profile($user_id,$data)
	{
		$this->db->where('user_id',$user_id);
		$this->db->update('tbl_users',$data);

	}
/**
* insert image
*/	
	function insert_image($user_id,$data)
	{
        $this->db->where('user_id',$user_id);
		$this->db->update('tbl_users',$data);
	}

/**
* for inserting post information
*/	

	function insert_post_data($data)
	{
		$this->db->insert('tbl_post',$data);
		return $data;

	}

/**
* fetch_all_user_post
*/		

	function fetch_all_user_post()
	{
		//to modify
		$query=$this->db->query('SELECT * FROM tbl_user,tbl_post WHERE tbl_user.id=tbl_post.user_id ORDER BY tbl_post.id_post  desc');
		return $query;
	

	}

/**
* fetch data
*/	

	function load_user_data()
	{
		$query=$this->db->query('SELECT * FROM tbl_user');
		return $query;
	}
/**
* insert post comment 
*/	
	function insert_post($data)
	{
		$this->db->insert('tbl_comment_post',$data);
		return $data;
	}

	function f_comment_post($post_id)
	{
         $this->db->where('post_id',$post_id);
         $query=$this->db->get('tbl_comment_post');
         return $query;
	}

	function load_json_data($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get('tbl_user');
		return $query;
	}

	//insert like

	function insert_like($data)
	{
		$this->db->insert("tbl_like",$data);
		return $data;

	}

	//count like

	function count_like($id_post)
	{
		$this->db->query('SELECT * FROM tbl_like WHERE id_post="'.$id_post.'" ');
		$query=$this->db->count_all();
		return $query;
		
	}

	//-------------crud_operation-----------------------
	var $table="tbl_users";
	var $select_column=array("user_id","user_name","password","email","image");
	var $order_column=array(null,"user_name",null,null,null);
	function make_query(){
		$this->db->select($this->select_column);
		$this->db->from($this->table);
		if (isset($_POST['search']['value'])) {
			$this->db->like('user_name',$_POST['search']['value']);
			}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
		}else{

			$this->db->order_by('user_id','Desc');
		}
	}

	function make_datatables(){
       //we execute the query
		$this->make_query();
		if ($_POST['length']!=-1) {
			# code...
			$this->db->limit($_POST['length'],$_POST['start']);
		}
			$query=$this->db->get();
		return $query->result();
	}

	function get_filtered_data(){
	   $this->make_query();
		$query=$this->db->get();
		return $query->num_rows();
	}
	function get_all_data(){
		$this->db->select('*');
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
}

?>