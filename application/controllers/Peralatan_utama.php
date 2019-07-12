<?php 
 
class peralatan_utama extends CI_Controller{
 
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
		$nama_alat = $this->input->post('nama_alat');
		 $spesifikasi = nl2br($this->input->post('spesifikasi'));
		// // $jumlah = $this->input->post('jumlah');
		// $kondisi = $this->input->post('kondisi');

 
		 $data = array(
		 	 'id_paket' => $id_paket,
		 	'nama_alat' => $nama_alat,
			'spesifikasi' => $spesifikasi,
			// 'jumlah' => $jumlah,
			// 'kondisi' => $kondisi,
			'jenis' => 'utama'
		 	);
		 $this->m_entry->input_data($data,'persyaratan_peralatan_paket');
		 redirect('spesifikasi/peralatan_utama/'.$id_paket);
	}

	function hapus($id){
		$id_paket = $this->input->post('id_weh');
		
		$where = array('id_persyaratan_peralatan' => $id);
		$this->m_entry->hapus_data($where,'persyaratan_peralatan_paket');
		redirect('spesifikasi/peralatan_utama/'.$id_paket);
	}

	

	function update(){
	$id = $this->input->post('id');
	$id_paket = $this->input->post('id_paket');
	$nama_alat = $this->input->post('nama_alat');
	$spesifikasi = nl2br($this->input->post('spesifikasi'));
	// $jumlah = $this->input->post('jumlah');
	// $kondisi = $this->input->post('kondisi');
	
 
	$data = array(
		 'id_paket' => $id_paket,
		 	'nama_alat' => $nama_alat,
			'spesifikasi' => $spesifikasi,
			// 'jumlah' => $jumlah,
			// 'kondisi' => $kondisi,
			'jenis' => 'utama'
	);
 
	$where = array(
		'id_persyaratan_peralatan' => $id
	);
 
	$this->m_entry->update_data($where,$data,'persyaratan_peralatan_paket');
	redirect('spesifikasi/peralatan_utama/'.$id_paket);
	}

	
	


}