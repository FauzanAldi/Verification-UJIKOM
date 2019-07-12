<?php 
 
class beranda extends CI_Controller{
 
	function __construct(){
		parent::__construct();	
		 $this->load->model('m_entry');	
	
                $this->load->helper('url');

        $this->load->model('m_login');	
                $this->load->helper('url');
                
	
	}

	function index(){
		// if ($this->input->post('id_sekolah')==!NULL) {
		// 	$id_sekolah = $this->input->post('id_sekolah');
		// 	$password = $this->input->post('password');
		// 	$where=array(
		// 		'id_sekolah'=> $id_sekolah,
		// 		'password_sekolah' => $password);
		//  // echo $id_sekolah;
		// $data['id_sekolah']=$id_sekolah;
		// $data['jurusan_sekolah']=$this->m_entry->paket_sekolah($id_sekolah);
		// $data['nama_sekolah']=$this->m_entry->edit_data($where,'sekolah');
		// }

		$data['sekolah']=$this->m_entry->get_data_tabel('sekolah');
		$data['content']='front_end/v_beranda';
		$this->load->view('front_end/v_head',$data);
				
	}

	function main(){
		$id_sekolah = $this->input->post('id_sekolah');
		$password = $this->input->post('password');
		$where=array(
				'id_sekolah'=> $id_sekolah,
				'password_sekolah' => $password);
		$cek_sekolah=$this->m_entry->edit_data($where,'sekolah');
		if ($cek_sekolah->num_rows()>0) {
			foreach ($cek_sekolah->result() as $key ) {
				$data['id_sekolah']=$key->id_sekolah;
				$where=array(
				'id_sekolah'=> $id_sekolah);
				$data['sekolah']=$this->m_entry->edit_data($where,'sekolah');
				$data['jurusan_sekolah']=$this->m_entry->paket_sekolah($id_sekolah);
				$data['content']='front_end/v_detail';
				$this->load->view('front_end/v_head',$data);
			}
		}else{
				$data['sekolah']=$this->m_entry->get_data_tabel('sekolah');
				$data['content']='front_end/v_beranda';
				$data['salah_pin']='" Pin yang Anda Masukkan Salah "';
				$this->load->view('front_end/v_head',$data);
			}
		
		
		
	}


	

	


	

	
	


}