<?php 
 
class spesifikasi extends CI_Controller{
 
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

	function spesifikasi($id_paket){
		// $id_paket = $this->input->post('id_paket');
		// $back=$this->uri->segment(3);
        $where = array('id_paket' => $id_paket);
        $cek = $this->m_login->cek_login("paket",$where);
         if ($cek->num_rows() > 0) {
            $back=$this->input->post('id_jurusan');
        $data['kembali'] = $back;
        $data['id_paket'] =$id_paket;
        $data['jurusan_paket']=$this->m_entry->show_paket_verifikasi($id_paket);
        $data['content']  ='v_spesifikasi';
        $this->load->view('v_header',$data);
         }else{
            redirect ('C_404');
         }
        
	}


	function pilih(){
		$id_paket = $this->input->post('id_paket');
		$spesifikasi = $this->input->post('spesifikasi');
		echo $id_paket;
		
		
		// $data['jurusan']=$this->m_entry->get_data_tabel('jurusan');
		// $data['sekolah']=$this->m_entry->get_data_tabel('sekolah');
		
		 redirect('spesifikasi/'.$spesifikasi.'/'.$id_paket);

		
	}

	function peralatan_utama($id_paket){
                $where = array('id_paket' => $id_paket);
        $cek = $this->m_login->cek_login("paket",$where);
         if ($cek->num_rows() > 0) {
 
        $data['jurusan_paket']=$this->m_entry->show_paket_verifikasi($id_paket);
        $where = array('id_paket' => $id_paket
                        );
        $data['paket'] = $this->m_entry->edit_data($where,'paket');
        $data['id_paket']=$id_paket;
        $where = array('id_paket' => $id_paket,
                        'jenis'  => 'utama'
                        );
        $data['peralatan_utama'] = $this->m_entry->edit_data($where,'persyaratan_peralatan_paket');
        $data['content']  ='v_peralatan_utama';
        $this->load->view('v_header',$data);
        }else{
            redirect ('C_404');
         }
    }

    function peralatan_pendukung($id_paket){
         $where = array('id_paket' => $id_paket);
        $cek = $this->m_login->cek_login("paket",$where);
         if ($cek->num_rows() > 0) {
        $data['jurusan_paket']=$this->m_entry->show_paket_verifikasi($id_paket);
        $where = array('id_paket' => $id_paket
                        );
        $data['paket'] = $this->m_entry->edit_data($where,'paket');
        $data['id_paket']=$id_paket;
        $where = array('id_paket' => $id_paket,
                        'jenis'  => 'pendukung'
                        );
        $data['peralatan_pendukung'] = $this->m_entry->edit_data($where,'persyaratan_peralatan_paket');
        $data['content']  ='v_peralatan_pendukung';
        $this->load->view('v_header',$data);
         }else{
            redirect ('C_404');
         }
    }

    function ruangan($id_paket){
         $where = array('id_paket' => $id_paket);
        $cek = $this->m_login->cek_login("paket",$where);
         if ($cek->num_rows() > 0) {
        $data['jurusan_paket']=$this->m_entry->show_paket_verifikasi($id_paket);
    	$where = array('id_paket' => $id_paket
                        );
        $data['paket'] = $this->m_entry->edit_data($where,'paket');
        $data['id_paket']=$id_paket;
        $data['ruangan'] = $this->m_entry->edit_data($where,'persyaratan_ruang');
        $data['content']  ='v_ruang';
        $this->load->view('v_header',$data);
         }else{
            redirect ('C_404');
         }
    }	

    function penguji_internal($id_paket){
         $where = array('id_paket' => $id_paket);
        $cek = $this->m_login->cek_login("paket",$where);
         if ($cek->num_rows() > 0) {
        $data['jurusan_paket']=$this->m_entry->show_paket_verifikasi($id_paket);
    	$where = array('id_paket' => $id_paket
                        );
        $data['paket'] = $this->m_entry->edit_data($where,'paket');
        $data['id_paket']=$id_paket;
        $where = array('id_paket' => $id_paket,
                        'jenis'  => 'Internal'
                        );
        $data['penguji_internal'] = $this->m_entry->edit_data($where,'persyaratan_penguji');
        $data['content']  ='v_penguji_internal';
        $this->load->view('v_header',$data);
         }else{
            redirect ('C_404');
         }

    }

    function penguji_eksternal($id_paket){
         $where = array('id_paket' => $id_paket);
        $cek = $this->m_login->cek_login("paket",$where);
         if ($cek->num_rows() > 0) {
        $data['jurusan_paket']=$this->m_entry->show_paket_verifikasi($id_paket);
    	$where = array('id_paket' => $id_paket
                        );
        $data['paket'] = $this->m_entry->edit_data($where,'paket');
        $data['id_paket']=$id_paket;
         $where = array('id_paket' => $id_paket,
                        'jenis'  => 'Eksternal'
                        );
        $data['penguji_eksternal'] = $this->m_entry->edit_data($where,'persyaratan_penguji');
        $data['content']  ='v_penguji_eksternal';
        $this->load->view('v_header',$data);
         }else{
            redirect ('C_404');
         }
    }

	

	
	


}