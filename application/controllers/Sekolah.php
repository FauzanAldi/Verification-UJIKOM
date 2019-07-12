<?php 
 
class sekolah extends CI_Controller{
 
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


	function tambah_data(){

		$data['jurusan']=$this->m_entry->get_data_tabel('jurusan');
		$data['content']  ='v_jurusan_sekolah';
		$this->load->view('v_header',$data);


	}

	


	function tambah_aksi(){
		//insert table sekolah
		$nama = $this->input->post('nama_sekolah');
		$alamat = $this->input->post('alamat_sekolah');
 		
		 $data = array(
		 	'nama_sekolah' => $nama,
			'alamat_sekolah' => $alamat,
			'password_sekolah' => $this->m_entry->acakangkahuruf(5)
		 	);
		 $this->m_entry->input_data($data,'sekolah');
		 //get id sekolah
 		$where = array('nama_sekolah' => $nama,
 						'alamat_sekolah' => $alamat

 		);
		$sekolah= $this->m_entry->edit_data($where,'sekolah')->result(); 
		 foreach($sekolah as $row):		
		$id_sekolah= $row->id_sekolah;
		endforeach;
		// get data untuk table jurusan sekolah
		 if(!empty($_POST['check_list'])){
		// Loop to store and display values of individual checked checkbox.
		 $no=0;
		foreach($_POST['check_list'] as $selected){
		$id_jurusan[$no++]= $selected;
		}
		}
		
		

		$jabs = count($id_jurusan);
		
		// insert data jurusan sekolah
		for ($i=0; $i <$jabs ; $i++) { 
			$paket[$i]=$this->input->post('paket_'.$id_jurusan[$i]);
			$data = array(
		 	'id_jurusan' => $id_jurusan[$i],
			'id_sekolah' => $id_sekolah,
			'id_paket' => $this->input->post('paket_'.$id_jurusan[$i]),
			'jumlah_peserta' => $this->input->post('jumlah_peserta_'.$id_jurusan[$i])
		 	);
		 $this->m_entry->input_data($data,'jurusan_sekolah');

		 $where = array('id_paket' => $paket[$i],
		 				 // 'jenis' => 'utama'
						);
		$id_persyaratan_peralatan[$i]= $this->m_entry->edit_data($where,'persyaratan_peralatan_paket')->result(); 
		$no=0;
		foreach($id_persyaratan_peralatan[$i] as $row):		
		$id_peralatan[$i][$no++] = $row->id_persyaratan_peralatan;
		endforeach;

		$id_persyaratan_ruangan[$i]= $this->m_entry->edit_data($where,'persyaratan_ruang')->result(); 
		$no=0;
		foreach($id_persyaratan_ruangan[$i] as $row):		
		$id_ruangan[$i][$no++] = $row->id_persyaratan_ruang;
		endforeach;

		$id_persyaratan_penguji[$i]= $this->m_entry->edit_data($where,'persyaratan_penguji')->result(); 
		$no=0;
		foreach($id_persyaratan_penguji[$i] as $row):		
		$id_penguji[$i][$no++] = $row->id_persyaratan_penguji;
		endforeach;

		// Insert data Rekapitulasi Sekolah
		$data = array(
		 	'id_sekolah' => $id_sekolah,
		 	'id_jurusan' => $id_jurusan[$i],
			'status_data' => 'peralatan_utama',
			'status_rekapitulasi' => ''
		 	);
		 $this->m_entry->input_data($data,'rekapitulasi_sekolah');

		 $data = array(
		 	'id_sekolah' => $id_sekolah,
		 	'id_jurusan' => $id_jurusan[$i],
			'status_data' => 'peralatan_pendukung',
			'status_rekapitulasi' => ''
		 	);
		 $this->m_entry->input_data($data,'rekapitulasi_sekolah');

		 $data = array(
		 	'id_sekolah' => $id_sekolah,
		 	'id_jurusan' => $id_jurusan[$i],
			'status_data' => 'ruangan',
			'status_rekapitulasi' => ''
		 	);
		 $this->m_entry->input_data($data,'rekapitulasi_sekolah');

		 $data = array(
		 	'id_sekolah' => $id_sekolah,
		 	'id_jurusan' => $id_jurusan[$i],
			'status_data' => 'penguji_internal',
			'status_rekapitulasi' => ''
		 	);
		 $this->m_entry->input_data($data,'rekapitulasi_sekolah');

		 $data = array(
		 	'id_sekolah' => $id_sekolah,
		 	'id_jurusan' => $id_jurusan[$i],
			'status_data' => 'penguji_eksternal',
			'status_rekapitulasi' => ''
		 	);
		 $this->m_entry->input_data($data,'rekapitulasi_sekolah');

		}
		
		

		 for ($row = 0; $row < count($id_peralatan); $row++) {
  			echo "<p><b>Row number $row</b></p>";
  			echo "<ul>";
  			for ($col = 0; $col < count($id_peralatan[$row]); $col++) {
  				$data =array(
				'id_persyaratan_peralatan'=>$id_peralatan[$row][$col],
				'id_sekolah'=>$id_sekolah,
				'spesifikasi_alat'=>0,
				'jumlah_alat'=>0,
				'kondisi_alat'=>0,
				);
  				$this->m_entry->input_data($data,'persyaratan_peralatan_paket_sekolah');
    			echo "<li>".$id_peralatan[$row][$col]."</li>";
  				}
  			echo "</ul>";
  			
			}

		for ($row = 0; $row < count($id_ruangan); $row++) {
  			echo "<p><b>Row number $row</b></p>";
  			echo "<ul>";
  			for ($col = 0; $col < count($id_ruangan[$row]); $col++) {
  				$data =array(
				'id_persyaratan_ruang'=>$id_ruangan[$row][$col],
				'id_sekolah'=>$id_sekolah,
				'tingkat_kesesuaian'=>0,
				'keterangan'=>''
				);
  				$this->m_entry->input_data($data,'persyaratan_ruang_sekolah');
    			echo "<li>".$id_ruangan[$row][$col]."</li>";
  				}
  			echo "</ul>";
  			
			}

		for ($row = 0; $row < count($id_penguji); $row++) {
  			echo "<p><b>Row number $row</b></p>";
  			echo "<ul>";
  			for ($col = 0; $col < count($id_penguji[$row]); $col++) {
  				$data =array(
				'id_persyaratan_penguji'=>$id_penguji[$row][$col],
				'id_sekolah'=>$id_sekolah,
				'tingkat_kesesuaian'=>0,
				'keterangan'=>''
				);
  				$this->m_entry->input_data($data,'persyaratan_penguji_sekolah');
    			echo "<li>".$id_penguji[$row][$col]."</li>";
  				}
  			echo "</ul>";
  			
			}

		

		   redirect('sekolah');

	}

	function hapus($id){

		$where = array('id_sekolah' => $id);
		$this->m_entry->hapus_data($where,'sekolah');
		redirect('sekolah');
	}

	function edit($id_sekolah){
		// $id_sekolah = $this->input->post('id_sekolah');
		$where = array(
		'id_sekolah' => $id_sekolah
		);
		 $data['id_sekolah']=$id_sekolah;
		 $data['jurusan']=$this->m_entry->get_data_tabel('jurusan');
		 $data['sekolah']=$this->m_entry->edit_data($where,'sekolah');
		 $data['jurusan_sekolah']=$this->m_entry->get_jurusan_sekolah($id_sekolah);
		// $data['jurusan']=$this->m_entry->get_data_tabel('jurusan');
		// $data['sekolah']= $this->m_entry->edit_data($where,'sekolah')->result();
		$data['content']  ='v_edit_sekolah';
		$this->load->view('v_header',$data);
		
	}

	function update(){
	$id_sekolah = $this->input->post('id_sekolah');
	$nama_sekolah = $this->input->post('nama_sekolah');
	$alamat_sekolah = $this->input->post('alamat_sekolah');
	$password_sekolah = $this->input->post('password_sekolah');
	// echo $id;
	// echo $nama_sekolah;
	// echo $alamat_sekolah;
 
	 $data = array(
	 	'nama_sekolah' => $nama_sekolah,
	 	'alamat_sekolah' => $alamat_sekolah,
	 	'password_sekolah' => $password_sekolah
	 );
 
	$where = array(
		'id_sekolah' => $id_sekolah
	);
 
	 $this->m_entry->update_data($where,$data,'sekolah');


	$where = array('id_sekolah' => $id_sekolah);
		$this->m_entry->hapus_data($where,'jurusan_sekolah');

	$where = array('id_sekolah' => $id_sekolah);
		$this->m_entry->hapus_data($where,'persyaratan_peralatan_paket_sekolah');

	$where = array('id_sekolah' => $id_sekolah);
		$this->m_entry->hapus_data($where,'persyaratan_ruang_sekolah');

	$where = array('id_sekolah' => $id_sekolah);
		$this->m_entry->hapus_data($where,'persyaratan_penguji_sekolah');


		if(!empty($_POST['check_list'])){
		// Loop to store and display values of individual checked checkbox.
		 $no=0;
		foreach($_POST['check_list'] as $selected){
		$id_jurusan[$no++]= $selected;
		}
		}

		//delete Rekapitulasi lama

		$where = array('id_sekolah' => $id_sekolah);
		$this->m_entry->hapus_data($where,'rekapitulasi_sekolah');

		$jabs = count($id_jurusan);
		
		// insert data jurusan sekolah
		for ($i=0; $i <$jabs ; $i++) { 
			$paket[$i]=$this->input->post('paket_'.$id_jurusan[$i]);
			$data = array(
		 	'id_jurusan' => $id_jurusan[$i],
			'id_sekolah' => $id_sekolah,
			'id_paket' => $this->input->post('paket_'.$id_jurusan[$i]),
			'jumlah_peserta' => $this->input->post('jumlah_peserta_'.$id_jurusan[$i])
		 	);
		 $this->m_entry->input_data($data,'jurusan_sekolah');

		 $where = array('id_paket' => $paket[$i],
		 				 // 'jenis' => 'utama'
						);
		$id_persyaratan_peralatan[$i]= $this->m_entry->edit_data($where,'persyaratan_peralatan_paket')->result(); 
		$no=0;
		foreach($id_persyaratan_peralatan[$i] as $row):		
		$id_peralatan[$i][$no++] = $row->id_persyaratan_peralatan;
		endforeach;

		$id_persyaratan_ruangan[$i]= $this->m_entry->edit_data($where,'persyaratan_ruang')->result(); 
		$no=0;
		foreach($id_persyaratan_ruangan[$i] as $row):		
		$id_ruangan[$i][$no++] = $row->id_persyaratan_ruang;
		endforeach;

		$id_persyaratan_penguji[$i]= $this->m_entry->edit_data($where,'persyaratan_penguji')->result(); 
		$no=0;
		foreach($id_persyaratan_penguji[$i] as $row):		
		$id_penguji[$i][$no++] = $row->id_persyaratan_penguji;
		endforeach;



		// Insert data Rekapitulasi Sekolah
		$data = array(
		 	'id_sekolah' => $id_sekolah,
		 	'id_jurusan' => $id_jurusan[$i],
			'status_data' => 'peralatan_utama',
			'status_rekapitulasi' => ''
		 	);
		 $this->m_entry->input_data($data,'rekapitulasi_sekolah');

		 $data = array(
		 	'id_sekolah' => $id_sekolah,
		 	'id_jurusan' => $id_jurusan[$i],
			'status_data' => 'peralatan_pendukung',
			'status_rekapitulasi' => ''
		 	);
		 $this->m_entry->input_data($data,'rekapitulasi_sekolah');

		 $data = array(
		 	'id_sekolah' => $id_sekolah,
		 	'id_jurusan' => $id_jurusan[$i],
			'status_data' => 'ruangan',
			'status_rekapitulasi' => ''
		 	);
		 $this->m_entry->input_data($data,'rekapitulasi_sekolah');

		 $data = array(
		 	'id_sekolah' => $id_sekolah,
		 	'id_jurusan' => $id_jurusan[$i],
			'status_data' => 'penguji_internal',
			'status_rekapitulasi' => ''
		 	);
		 $this->m_entry->input_data($data,'rekapitulasi_sekolah');

		 $data = array(
		 	'id_sekolah' => $id_sekolah,
		 	'id_jurusan' => $id_jurusan[$i],
			'status_data' => 'penguji_eksternal',
			'status_rekapitulasi' => ''
		 	);
		 $this->m_entry->input_data($data,'rekapitulasi_sekolah');

		}
		
		

		 for ($row = 0; $row < count($id_peralatan); $row++) {
  			echo "<p><b>Row number $row</b></p>";
  			echo "<ul>";
  			for ($col = 0; $col < count($id_peralatan[$row]); $col++) {
  				$data =array(
				'id_persyaratan_peralatan'=>$id_peralatan[$row][$col],
				'id_sekolah'=>$id_sekolah,
				'spesifikasi_alat'=>0,
				'jumlah_alat'=>0,
				'kondisi_alat'=>0,
				);
  				$this->m_entry->input_data($data,'persyaratan_peralatan_paket_sekolah');
    			echo "<li>".$id_peralatan[$row][$col]."</li>";
  				}
  			echo "</ul>";
  			
			}

		for ($row = 0; $row < count($id_ruangan); $row++) {
  			echo "<p><b>Row number $row</b></p>";
  			echo "<ul>";
  			for ($col = 0; $col < count($id_ruangan[$row]); $col++) {
  				$data =array(
				'id_persyaratan_ruang'=>$id_ruangan[$row][$col],
				'id_sekolah'=>$id_sekolah,
				'tingkat_kesesuaian'=>0,
				'keterangan'=>''
				);
  				$this->m_entry->input_data($data,'persyaratan_ruang_sekolah');
    			echo "<li>".$id_ruangan[$row][$col]."</li>";
  				}
  			echo "</ul>";
  			
			}

		for ($row = 0; $row < count($id_penguji); $row++) {
  			echo "<p><b>Row number $row</b></p>";
  			echo "<ul>";
  			for ($col = 0; $col < count($id_penguji[$row]); $col++) {
  				$data =array(
				'id_persyaratan_penguji'=>$id_penguji[$row][$col],
				'id_sekolah'=>$id_sekolah,
				'tingkat_kesesuaian'=>0,
				'keterangan'=>''
				);
  				$this->m_entry->input_data($data,'persyaratan_penguji_sekolah');
    			echo "<li>".$id_penguji[$row][$col]."</li>";
  				}
  			echo "</ul>";
  			
			}

		

		    redirect('sekolah');
	 }

	
	


}