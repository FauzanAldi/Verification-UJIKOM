<?php 
 
class ruangan extends CI_Controller{
 
	function __construct(){
		parent::__construct();	
		 $this->load->model('m_entry');	
	
                $this->load->helper('url');
                $this->load->model('m_login');	
                $this->load->helper('url');
                if($this->m_login->logged_id())
		{

				
		}else{
		
				redirect('login');		
			}
	
	}

	function index(){
		
		
		

		
				
	}

	
	function tambah_aksi(){
	 	$id_paket = $this->input->post('id_paket');
		$persyaratan_ruang = $this->input->post('persyaratan_ruang');
		

 
		 $data = array(
		 	 'id_paket' => $id_paket,
		 	'persyaratan_ruang' => $persyaratan_ruang,
			
		 	);
		 $this->m_entry->input_data($data,'persyaratan_ruang');
		 redirect('spesifikasi/ruangan/'.$id_paket);
	}

	function hapus($id){
		$id_paket = $this->input->post('id_weh');
		
		$where = array('id_persyaratan_ruang' => $id);
		$this->m_entry->hapus_data($where,'persyaratan_ruang');
		redirect('spesifikasi/ruangan/'.$id_paket);
	}

	

	function update(){
	$id = $this->input->post('id');
	$id_paket = $this->input->post('id_paket');
	$persyaratan_ruang = $this->input->post('persyaratan_ruang');
	
	
 
	$data = array(
		 'id_paket' => $id_paket,
		 	'persyaratan_ruang' => $persyaratan_ruang,
			
	);
 
	$where = array(
		'id_persyaratan_ruang' => $id
	);
 
	$this->m_entry->update_data($where,$data,'persyaratan_ruang');
	redirect('spesifikasi/ruangan/'.$id_paket);
	}

	
	


}