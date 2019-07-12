<?php 
 
class penguji_eksternal extends CI_Controller{
 
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
		$persyaratan_penguji_eksternal = $this->input->post('persyaratan_penguji_eksternal');
		

 
		 $data = array(
		 	 'id_paket' => $id_paket,
		 	'persyaratan_penguji' => $persyaratan_penguji_eksternal,
		 	'jenis' => 'Eksternal'
			
		 	);
		 $this->m_entry->input_data($data,'persyaratan_penguji');
		 redirect('spesifikasi/penguji_eksternal/'.$id_paket);
	}

	function hapus($id){
		$id_paket = $this->input->post('id_weh');
		
		$where = array('id_persyaratan_penguji' => $id);
		$this->m_entry->hapus_data($where,'persyaratan_penguji');
		redirect('spesifikasi/penguji_eksternal/'.$id_paket);
	}

	

	function update(){
	$id = $this->input->post('id');
	$id_paket = $this->input->post('id_paket');
	$persyaratan_penguji_eksternal = $this->input->post('persyaratan_penguji_eksternal');
	
	

	$data = array(
		 'id_paket' => $id_paket,
		 	'persyaratan_penguji' => $persyaratan_penguji_eksternal,
			'jenis' => 'Eksternal'
	);
 
	$where = array(
		'id_persyaratan_penguji' => $id
	);
 
	$this->m_entry->update_data($where,$data,'persyaratan_penguji');
	redirect('spesifikasi/penguji_eksternal/'.$id_paket);
	}

	
	


}