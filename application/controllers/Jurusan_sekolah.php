<?php 
 
class jurusan_sekolah extends CI_Controller{
 
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
		$data['sekolah']=$this->m_entry->get_data_tabel('sekolah');
		$data['content']  ='v_sekolah';
		$this->load->view('v_header',$data);
		
				
	}


	function tambah_aksi(){
		$id_sekolah = $this->input->post('id_sekolah');
		$nama_jurusan = $this->input->post('nama_jurusan');
		$jumlah_peserta = $this->input->post('jumlah_peserta');

 
		  $data = array(
		  	'id_sekolah' => $id_sekolah,
			'id_jurusan' => $nama_jurusan,
			'jumlah_peserta' => $jumlah_peserta
		  	);
		  $this->m_entry->input_data($data,'jurusan_sekolah');
		  redirect('sekolah/edit/'.$id_sekolah);

	}

	function hapus($id){
		$id_sekolah = $this->input->post('id_sekolah');
		$where = array('id_jurusan_sekolah' => $id);
		$this->m_entry->hapus_data($where,'jurusan_sekolah');
		 redirect('sekolah/edit/'.$id_sekolah);
	}

	


	

	
	


}