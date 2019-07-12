<?php 
 
class entry extends CI_Controller{
 
	function __construct(){
		parent::__construct();	
		 $this->load->model('m_entry');	
		$this->load->model('m_login');	
                $this->load->helper('url');
                if($this->m_login->logged_id())
		{

				
		}else{
		
				redirect('login');		
			}
	}

	function index(){
		if($this->m_login->logged_id())
		{
				// $this->load->view('v_contoh');
				 redirect('entry/entry_data');		

		}else{
		
				redirect('login');		
			}
	}

	function entry_data(){
		$data['jurusan']=$this->m_entry->get_data_tabel('jurusan');
		$data['sekolah']=$this->m_entry->get_data_tabel('sekolah');
		$data['content']  ='entry_data/depan';
		$this->load->view('v_header',$data);
	}


	function jurusan(){
		$id= $this->input->post('id');
		
		$data =$this->db->query("SELECT * FROM jurusan_sekolah join jurusan using(id_jurusan) where id_sekolah='$id' ")->result();
	
		echo json_encode($data);
	}

	

	// function paket(){
	// 	$id= $this->input->post('id');
	// 	$id_sekolah= $this->input->post('id_sekolah');
	// 	$data = $this->m_entry->get_paket($id,42);
	
	// 	echo json_encode($data);
	
		
		
	//}

	function pilih(){
		$sekolah = $this->input->post('sekolah');
		$id_paket = $this->input->post('jurusan');
		
		// echo $sekolah." ";
		// echo $jurusan." ";
		// echo $paket;
		$data['id_sekolah']=$sekolah;
		$data['id_paket']=$id_paket;
		// $data['jurusan']=$this->m_entry->get_data_tabel('jurusan');
		$data['sekolah']=$this->m_entry->get_data_tabel('sekolah');
		$data['jurusan']=$this->m_entry->paket_sekolah($sekolah);

		$data['content']  ='entry_data/belakang';
		$this->load->view('v_header',$data);

		
	}

	function peralatan_utama_sekolah(){
		$id_sekolah = $this->input->post('id_sekolah');
		echo $id_sekolah;
		if(!empty($_POST['id_persyaratan_peralatan'])){
		// Loop to store and display values of individual checked checkbox.
		 $no=0;$no_2=0;$no_3=0;$no_4=0;
		foreach($_POST['id_persyaratan_peralatan'] as $selected){
		 $id_persyaratan_peralatan_utama[$no++]= $selected;
		  
			 // echo $selected;
			 // echo $id_persyaratan_peralatan_utama[$no_2++];
			   // $A1_peralatan_utama[$no_4++];
		}
		}
		$jabs = count($id_persyaratan_peralatan_utama);
		
		for ($i=0; $i < $jabs; $i++) { 
			// echo $id_persyaratan_peralatan_utama[$i].'<br/>';
			$A1_peralatan_utama[$i] = $this->input->post('A1_'.$id_persyaratan_peralatan_utama[$i]);
			// echo $A1_peralatan_utama[$i].'<br/>';
			$A2_peralatan_utama[$i] = $this->input->post('A2_'.$id_persyaratan_peralatan_utama[$i]);
			// echo $A2_peralatan_utama[$i].'<br/>';
			$A3_peralatan_utama[$i] = $this->input->post('A3_'.$id_persyaratan_peralatan_utama[$i]);
			// echo $A3_peralatan_utama[$i].'<br/>';

			$data = array(
		 	'id_persyaratan_peralatan' => $id_persyaratan_peralatan_utama[$i],
			'id_sekolah' => $id_sekolah,
			'spesifikasi_alat' => $A1_peralatan_utama[$i],
			'jumlah_alat' => $A2_peralatan_utama[$i],
			'kondisi_alat' => $A3_peralatan_utama[$i]
		 	);
		 $this->m_entry->input_data($data,'persyaratan_peralatan_paket_sekolah');
		}
		redirect('entry/entry_data');
		// echo $A1_peralatan_utama;
	}

	function verifikasi_utama(){
		$jumlah= $this->input->post('jumlah');
		$kondisi= $this->input->post('kondisi');
		$A1= $this->input->post('A1');
		$A2= $this->input->post('A2');
		$A3= $this->input->post('A3');
		$id= $this->input->post('id');
		$id_persyaratan_peralatan= $this->input->post('id_persyaratan');
		$id_sekolah= $this->input->post('id_sekolah');
		// echo $A1;
		// if($A1=='' | $A2=='' | $A3==''){
		// 	echo "hore";
		// }else{
		// 	echo $A2;
		// }
		
		 $data = array(
		'id_persyaratan_peralatan'=>$id_persyaratan_peralatan,
		'id_sekolah'=>$id_sekolah,
		'jumlah' => $jumlah,
		'kondisi' => $kondisi,
		'spesifikasi_alat'=>$A1,
		'jumlah_alat'=>$A2,
		'kondisi_alat'=>$A3
	);
 
	$where = array('id_persyaratan_peralatan_sekolah'=>$id
							);

 
	$data=$this->m_entry->update_data($where,$data,'persyaratan_peralatan_paket_sekolah');
		//  $cek="sad";
		
		  echo json_encode($where);
		
	

	
	}

	function verifikasi_ruangan(){

	 	$A1= $this->input->post('A1');
	// 	$A2= $this->input->post('A2');
	// 	$A3= $this->input->post('A3');
	 	$id= $this->input->post('id');
	 	$id_persyaratan_ruang= $this->input->post('id_persyaratan');
	 	$id_sekolah= $this->input->post('id_sekolah');
	 	$keterangan=$this->input->post('ket');
	// 	// echo $A1;
	// 	// if($A1=''){
	// 	// 	echo "Insert";
	// 	// }else{
	// 	// 	echo "Update";
	// 	// }
		
		 $data = array(
		'id_persyaratan_ruang'=>$id_persyaratan_ruang,
		'id_sekolah'=>$id_sekolah,
		'tingkat_kesesuaian'=>$A1,
		'keterangan'=>$keterangan
		
	);
 
	$where = array('id_persyaratan_ruang_sekolah'=>$id
							);

 
	$data=$this->m_entry->update_data($where,$data,'persyaratan_ruang_sekolah');
		//  $cek="sad";
		
		  echo json_encode($where);
		
	

	
	}

	function verifikasi_penguji(){

	 	$A1= $this->input->post('A1');
	// 	$A2= $this->input->post('A2');
	// 	$A3= $this->input->post('A3');
	 	$id= $this->input->post('id');
	 	$id_persyaratan_penguji= $this->input->post('id_persyaratan');
	 	$id_sekolah= $this->input->post('id_sekolah');
	 	$keterangan=$this->input->post('ket');
	// 	// echo $A1;
	// 	// if($A1=''){
	// 	// 	echo "Insert";
	// 	// }else{
	// 	// 	echo "Update";
	// 	// }
		
		 $data = array(
		'id_persyaratan_penguji'=>$id_persyaratan_penguji,
		'id_sekolah'=>$id_sekolah,
		'tingkat_kesesuaian'=>$A1,
		'keterangan'=>$keterangan
		
	);
 
	$where = array('id_persyaratan_penguji_sekolah'=>$id
							);

 
	$data=$this->m_entry->update_data($where,$data,'persyaratan_penguji_sekolah');
		//  $cek="sad";
		
		  echo json_encode($where);
		
	

	
	}
	
	


}