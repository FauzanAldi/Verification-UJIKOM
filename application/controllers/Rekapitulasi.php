<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Rekapitulasi extends CI_Controller
{
 
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
 
    public function index()
    {   
        $data['sekolah']=$this->m_entry->get_data_tabel('sekolah');
        $data['jurusan']=$this->m_entry->get_data_tabel('jurusan');
        $data['content']  ='rekapitulasi/depan';
        $this->load->view('v_header',$data);
    }

    public function pilih()
    { 

        // mengambil id sekolah dan id paket
        $sekolah = $this->input->post('sekolah');
        $id_paket = $this->input->post('jurusan');
        // echo $sekolah;
        // echo $id_paket;

    
          //-------------------------------------------//
          // Update data Rekapitulasi Peralatan Utama 
          //-------------------------------------------//

            $spesifikasi_alat_utama=0;
            $jumlah_alat_utama=0;
            $kondisi_alat_utama=0;
            $rekap_peral_utama="";

            $per_utama=$this->m_entry->get_peralatan_sekolah($sekolah,$id_paket,'utama');

                foreach ($per_utama->result() as $key ) {
                   
                   if ($key->spesifikasi_alat==0 | $key->jumlah_alat==0 | $key->kondisi_alat==0 ) {
                        $rekap_peral_utama="Penilaialan Belum Selesai";
                        break;
                    }else {
                         $spesifikasi_alat_utama=$spesifikasi_alat_utama + $key->spesifikasi_alat;
                         $jumlah_alat_utama=$jumlah_alat_utama + $key->jumlah_alat;
                         $kondisi_alat_utama=$kondisi_alat_utama + $key->kondisi_alat;
                    // echo $spesifikasi_alat.' '.$jumlah_alat.' '.$kondisi_alat.'</br>';
                   
                    } 
                   
                }
                // echo $spesifikasi_alat.' '.$jumlah_alat.' '.$kondisi_alat.'</br>';
                
                //rumus per_utama
                if ($per_utama->num_rows()!=0) {
                       $total_per_utama=($spesifikasi_alat_utama+$jumlah_alat_utama+$kondisi_alat_utama)/($per_utama->num_rows()*3);
                }else{
                    $rekap_peral_utama="Penilaialan Belum Selesai";
                }
                
               
                // echo $total_per_utama.'</br>';

                // logika per_utama
                if ($rekap_peral_utama=="") {
                    if ($total_per_utama=='kosong') {
                        # code...
                    }else if ($total_per_utama>3) {
                        $rekap_peral_utama="Sangat Layak";
                    }else if($total_per_utama==3){
                        $rekap_peral_utama="Layak";
                    }else {
                        $rekap_peral_utama="Belum Layak";
                    }
                }

            //-------------------------------------------
            // Update data Rekapitulasi Peralatan Pendukung
            //-------------------------------------------

            $spesifikasi_alat_pendukung=0;
            $jumlah_alat_pendukung=0;
            $kondisi_alat_pendukung=0;
            $rekap_peral_pendukung="";

                $per_pendukung=$this->m_entry->get_peralatan_sekolah($sekolah,$id_paket,'pendukung');
               
                foreach ($per_pendukung->result() as $key ) {
                   
                   if ($key->spesifikasi_alat==0 | $key->jumlah_alat==0 | $key->kondisi_alat==0 ) {
                        $rekap_peral_pendukung="Penilaialan Belum Selesai";
                        break;
                    }else {
                         $spesifikasi_alat_pendukung=$spesifikasi_alat_pendukung + $key->spesifikasi_alat;
                         $jumlah_alat_pendukung=$jumlah_alat_pendukung + $key->jumlah_alat;
                         $kondisi_alat_pendukung=$kondisi_alat_pendukung + $key->kondisi_alat;
                    // echo $spesifikasi_alat.' '.$jumlah_alat.' '.$kondisi_alat.'</br>';
                   
                } 
                   
                }
                // echo $spesifikasi_alat.' '.$jumlah_alat.' '.$kondisi_alat.'</br>';

                //rumus per_pendukung
                if ($per_pendukung->num_rows()!=0) {
                       $total_per_pendukung=($spesifikasi_alat_pendukung+$jumlah_alat_pendukung+$kondisi_alat_pendukung)/($per_pendukung->num_rows()*3);
                }else{
                    $rekap_peral_pendukung="Penilaialan Belum Selesai";
                }
                
                // echo $total_per_pendukung.'</br>';

                // logika per_pendukung
                if ($rekap_peral_pendukung=="") {
                    if ($total_per_pendukung>2) {
                        $rekap_peral_pendukung="Sangat Layak";
                    }else if($total_per_pendukung==2){
                        $rekap_peral_pendukung="Layak";
                    }else {
                        $rekap_peral_pendukung="Belum Layak";
                    }
                }
                  // echo $rekap_peral_pendukung.'</br>';

            //-------------------------------------------
            // Update data Rekapitulasi ruangan
            //-------------------------------------------

            $kualitas_ruangan=0;
            $rekap_ruangan="";

                $ruangan=$this->m_entry->get_ruangan_sekolah($sekolah,$id_paket);
               
                foreach ($ruangan->result() as $key ) {
                   
                   if ($key->tingkat_kesesuaian==0) {
                        $rekap_ruangan="Penilaialan Belum Selesai";
                        break;
                    }else {
                         $kualitas_ruangan=$kualitas_ruangan + $key->tingkat_kesesuaian;
                     // echo $kualitas_ruangan.'</br>';
                   
                } 
                   
                }
                // echo $spesifikasi_alat.' '.$jumlah_alat.' '.$kondisi_alat.'</br>';

                //rumus Ruangan
                if ($ruangan->num_rows()!=0) {
                       $total_ruangan=($kualitas_ruangan)/($ruangan->num_rows());
                }else{
                    $rekap_ruangan="Penilaialan Belum Selesai";
                }
                
                // echo $total_ruangan.'</br>';

                // logika Ruangan
                if ($rekap_ruangan=="") {
                    if ($total_ruangan>2) {
                        $rekap_ruangan="Sangat Layak";
                    }else if($total_ruangan==2){
                        $rekap_ruangan="Layak";
                    }else {
                        $rekap_ruangan="Belum Layak";
                    }
                }
                  // echo $rekap_ruangan.'</br>';

          
            //-------------------------------------------
            // Update data Rekapitulasi Penguji  Internal
            //-------------------------------------------


            $kualitas_penguji_internal=0;
            $rekap_penguji_internal="";

                $penguji_internal=$this->m_entry->get_penguji_sekolah($sekolah,$id_paket,'Internal');
               
                foreach ($penguji_internal->result() as $key ) {
                   
                   if ($key->tingkat_kesesuaian==0) {
                        $rekap_penguji_internal="Penilaialan Belum Selesai";
                        break;
                    }else {
                         $kualitas_penguji_internal=$kualitas_penguji_internal + $key->tingkat_kesesuaian;
                      // echo $kualitas_penguji_internal.'</br>';
                   
                } 
                   
                }
              

                //rumus penguji_internal
                if ($penguji_internal->num_rows()!=0) {
                       $total_penguji_internal=($kualitas_penguji_internal)/$penguji_internal->num_rows();
                }else{
                    $rekap_penguji_internal="Penilaialan Belum Selesai";
                }
                
                // echo $total_penguji_internal.'</br>';

                // logika penguji_internal
                if ($rekap_penguji_internal=="") {
                    if ($total_penguji_internal>2) {
                        $rekap_penguji_internal="Sangat Layak";
                    }else if($total_penguji_internal==2){
                        $rekap_penguji_internal="Layak";
                    }else {
                        $rekap_penguji_internal="Belum Layak";
                    }
                }
                  // echo $rekap_penguji_internal.'</br>';

            //-------------------------------------------
            // Update data Rekapitulasi Penguji  Eksternal
            //-------------------------------------------

            $kualitas_penguji_eksternal=0;
            $rekap_penguji_eksternal="";

                $penguji_eksternal=$this->m_entry->get_penguji_sekolah($sekolah,$id_paket,'Eksternal');
               
                foreach ($penguji_eksternal->result() as $key ) {
                   
                   if ($key->tingkat_kesesuaian==0) {
                        $rekap_penguji_eksternal="Penilaialan Belum Selesai";
                        break;
                    }else {
                         $kualitas_penguji_eksternal=$kualitas_penguji_eksternal + $key->tingkat_kesesuaian;
                      // echo $kualitas_penguji_eksternal.'</br>';
                   
                } 
                   
                }
              

                //rumus pengujieksternall
                if ($penguji_eksternal->num_rows()!=0) {
                       $total_penguji_eksternal=($kualitas_penguji_eksternal)/$penguji_eksternal->num_rows();
                }else{
                    $rekap_penguji_eksternal="Penilaialan Belum Selesai";
                }
                
                // echo $total_penguji_eksternal.'</br>';

                // logika penguji_eksternal
                if ($rekap_penguji_eksternal=="") {
                    if ($total_penguji_eksternal>2) {
                        $rekap_penguji_eksternal="Sangat Layak";
                    }else if($total_penguji_eksternal==2){
                        $rekap_penguji_eksternal="Layak";
                    }else {
                        $rekap_penguji_eksternal="Belum Layak";
                    }
                }
                  // echo $rekap_penguji_eksternal.'</br>';


    //
    // Get data id jurusan
    //

    $where = array('id_paket'=>$id_paket
                
                            );
    $jurusan=$this->m_entry->edit_data($where,'paket')->result();
    foreach ($jurusan as $key ) {
        $id_jurusan=$key->id_jurusan;
    }
     // echo $id_jurusan;

    //-------------------------------------------
    // Update data Rekapitulasi Sekolah
    //-------------------------------------------
    

        // status data peralatan utama
                $data = array(
        'status_rekapitulasi'=>$rekap_peral_utama
    );
 
    $where = array('id_sekolah'=>$sekolah,
                'id_jurusan' => $id_jurusan,
                'status_data' => 'peralatan_utama'
                            );

 
    $this->m_entry->update_data($where,$data,'rekapitulasi_sekolah');


        // status data peralatan Pendukung
                $data = array(
        'status_rekapitulasi'=>$rekap_peral_pendukung
    );
 
    $where = array('id_sekolah'=>$sekolah,
                'id_jurusan' => $id_jurusan,
                'status_data' => 'peralatan_pendukung'
                            );

 
    $this->m_entry->update_data($where,$data,'rekapitulasi_sekolah');
    $data['status_peralatan_pendukung']=$this->m_entry->edit_data($where,'rekapitulasi_sekolah');

        // status data ruanagan
                $data = array(
        'status_rekapitulasi'=>$rekap_ruangan
    );
 
    $where = array('id_sekolah'=>$sekolah,
                'id_jurusan' => $id_jurusan,
                'status_data' => 'ruangan'
                            );

 
    $this->m_entry->update_data($where,$data,'rekapitulasi_sekolah');
    $data['status_ruangan']=$this->m_entry->edit_data($where,'rekapitulasi_sekolah');

    // status data penguji internal
                $data = array(
        'status_rekapitulasi'=>$rekap_penguji_internal
    );
 
    $where = array('id_sekolah'=>$sekolah,
                'id_jurusan' => $id_jurusan,
                'status_data' => 'penguji_internal'
                            );

 
    $this->m_entry->update_data($where,$data,'rekapitulasi_sekolah');
    $data['status_penguji_internal']=$this->m_entry->edit_data($where,'rekapitulasi_sekolah');

    // status data penguji eksternal
                $data = array(
        'status_rekapitulasi'=>$rekap_penguji_eksternal
    );
 
    $where = array('id_sekolah'=>$sekolah,
                'id_jurusan' => $id_jurusan,
                'status_data' => 'penguji_eksternal'
                            );

    
    $this->m_entry->update_data($where,$data,'rekapitulasi_sekolah');
    $data['status_penguji_eksternal']=$this->m_entry->edit_data($where,'rekapitulasi_sekolah');

        $where = array('id_sekolah'=>$sekolah,
                'id_jurusan' => $id_jurusan,
                'status_data' => 'peralatan_pendukung'
                            );
        $data['status_peralatan_pendukung']=$this->m_entry->edit_data($where,'rekapitulasi_sekolah');
        $where = array('id_sekolah'=>$sekolah,
                'id_jurusan' => $id_jurusan,
                'status_data' => 'ruangan'
                            );
$data['status_ruangan']=$this->m_entry->edit_data($where,'rekapitulasi_sekolah');

$where = array('id_sekolah'=>$sekolah,
                'id_jurusan' => $id_jurusan,
                'status_data' => 'penguji_internal'
                            );
$data['status_penguji_internal']=$this->m_entry->edit_data($where,'rekapitulasi_sekolah');

        $where = array('id_sekolah'=>$sekolah,
                'id_jurusan' => $id_jurusan,
                'status_data' => 'peralatan_utama'
                            );
        $data['status_peralatan_utama']=$this->m_entry->edit_data($where,'rekapitulasi_sekolah');
        $data['id_sekolah']=$sekolah;
        $data['id_paket']=$id_paket;
        $data['sekolah']=$this->m_entry->get_data_tabel('sekolah');
        // $data['jurusan']=$this->m_entry->get_data_tabel('jurusan');
         $data['jurusan']=$this->m_entry->paket_sekolah($sekolah);
        $data['content']  ='rekapitulasi/belakang';
        $this->load->view('v_header',$data);
    }
 
    
 
}	
