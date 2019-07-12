<?php 
 
class jurusan extends CI_Controller{
 
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
		$data['jurusan']=$this->m_entry->get_data_tabel('jurusan');
		$data['content']  ='v_jurusan';
		$this->load->view('v_header',$data);
		
				
	}

	


	function tambah_aksi(){
		$nama = $this->input->post('jurusan');
		echo $nama;
 
		 $data = array(
		 	'nama_jurusan' => $nama,
			
		 	);
		 $this->m_entry->input_data($data,'jurusan');
		 redirect('jurusan');

	}

	function hapus($id){

		$where = array('id_jurusan' => $id);
		$this->m_entry->hapus_data($where,'jurusan');
		redirect('jurusan');
	}

	function edit($id){
		$where = array('id_jurusan' => $id);
		$data['edit'] = $this->m_entry->edit_data($where,'jurusan')->result();
		
	}

	function update(){
	$id = $this->input->post('id');
	$nama_jurusan = $this->input->post('nama');
	
 
	$data = array(
		'nama_jurusan' => $nama_jurusan,
		
	);
 
	$where = array(
		'id_jurusan' => $id
	);
 
	$this->m_entry->update_data($where,$data,'jurusan');
	redirect('jurusan');
	}

	
	


}