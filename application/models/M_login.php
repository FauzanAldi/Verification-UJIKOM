<?php 
 
class M_login extends CI_Model{	

	function logged_id()
    {
        return $this->session->userdata('user_id');
    }

    
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

	function tampil_data(){
		return $this->db->get('users');
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	

	function get_id($username){
	// $this->db->query("SELECT id FROM login where username='".$username."'AND password=md5('".$password."')");
	return	$this->db->query("SELECT id FROM login where username='".$username."'");
		
	
	}
}