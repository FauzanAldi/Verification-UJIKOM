<?php 
 
class paket extends CI_Controller{
 
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

	function data_paket($id){
		$back=$this->uri->segment(3);
		$where = array('id_jurusan' => $id);
		$cek = $this->m_login->cek_login("jurusan",$where);
		 if ($cek->num_rows() > 0) {
		 	$where = array('id_jurusan' => $id);
		$data['jurusan']=$this->m_entry->edit_data($where,'jurusan');
		$data['paket'] = $this->m_entry->edit_data($where,'paket');
		$data['id_jurusan'] = $id;
		$data['kembali'] = $back;
		$data['content']  ='v_paket';
		$this->load->view('v_header',$data);
		 }else{
		 	redirect ('C_404');
		 }
		
		// $id;
	}

	


	function tambah_aksi(){
	 	$id_jurusan = $this->input->post('id_jurusan');
		$no_paket = $this->input->post('no_paket');
		$kurikulum = $this->input->post('kurikulum');
 
		 $data = array(
		 	 'id_jurusan' => $id_jurusan,
		 	'no_paket' => $no_paket,
			'kurikulum' => $kurikulum
		 	);
		 $this->m_entry->input_data($data,'paket');
		 redirect('paket/data_paket/'.$id_jurusan);

	}

	function hapus($id){
		$id_jurusan = $this->input->post('id_weh');
		
		$where = array('id_paket' => $id);
		$this->m_entry->hapus_data($where,'paket');
		redirect('paket/data_paket/'.$id_jurusan);
	}

	function edit($id){
		$where = array('id_sekolah' => $id);
		$data['edit'] = $this->m_entry->edit_data($where,'sekolah')->result();
		
	}

	function update(){
	$id = $this->input->post('id');
	$id_jurusan = $this->input->post('id_weh');
	$no_paket = $this->input->post('no_paket');
	$kurikulum = $this->input->post('kurikulum');
	
 
	$data = array(
		'id_jurusan' => $id_jurusan,
		'no_paket' => $no_paket,
		'kurikulum' => $kurikulum
	);
 
	$where = array(
		'id_paket' => $id
	);
 
	$this->m_entry->update_data($where,$data,'paket');
	redirect('paket/data_paket/'.$id_jurusan);
	}

	
	


}