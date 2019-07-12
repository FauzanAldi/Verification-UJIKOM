<?php
class M_entry extends CI_Model{

	function get_data_tabel($table){
		$hasil=$this->db->query("SELECT * FROM $table");
		return $hasil;
		
	}

	function get_paket($id,$id_sekolah){
		$hasil=$this->db->query("SELECT * FROM jurusan_sekolah join paket using(id_paket) WHERE jurusan_sekolah.id_jurusan='$id' and id_sekolah='$id_sekolah'");
		return $hasil->result();
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_data($where,$table){
	$this->db->where($where);
	$this->db->delete($table);
	}

	function edit_data($where,$table){		
	return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}


	function get_jurusan_sekolah($id_sekolah){
		$hasil=$this->db->query("SELECT * FROM jurusan LEFT JOIN jurusan_sekolah USING (id_jurusan) WHERE  id_sekolah='$id_sekolah' OR id_sekolah IS NULL");
		return $hasil->result();
	}

	function paket_sekolah($id_sekolah){
		
		$hasil=$this->db->query("SELECT * FROM jurusan JOIN jurusan_sekolah USING (id_jurusan) WHERE  id_sekolah='$id_sekolah' ");
		return $hasil->result();
	}

	function get_tabel_verifikasi($where,$table){
		$hasil=$this->db->query("SELECT * FROM $table JOIN paket USING(id_paket) where $where ");
		return $hasil;
	}

	function show_paket_verifikasi($id_paket){
		$hasil=$this->db->query("SELECT * FROM paket JOIN jurusan USING(id_jurusan) where id_paket=$id_paket ");
		return $hasil;
	}

	function get_peralatan_sekolah($id_sekolah,$id_paket,$jenis){
		$hasil=$this->db->query("SELECT * FROM persyaratan_peralatan_paket JOIN persyaratan_peralatan_paket_sekolah USING(id_persyaratan_peralatan) where id_paket=$id_paket and jenis='$jenis' and id_sekolah=$id_sekolah");
		return $hasil;
	}

	function get_ruangan_sekolah($id_sekolah,$id_paket){
		$hasil=$this->db->query("SELECT * FROM persyaratan_ruang JOIN persyaratan_ruang_sekolah USING(id_persyaratan_ruang) where id_paket=$id_paket and id_sekolah=$id_sekolah");
		return $hasil;
	}

	function get_penguji_sekolah($id_sekolah,$id_paket,$jenis){
		$hasil=$this->db->query("SELECT * FROM persyaratan_penguji JOIN persyaratan_penguji_sekolah USING(id_persyaratan_penguji) where id_paket=$id_paket and jenis='$jenis' and id_sekolah=$id_sekolah");
		return $hasil;
	}

	function acakangkahuruf($panjang)
	{
	    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
	    $string = '';
	    for ($i = 0; $i < $panjang; $i++) {
	  $pos = rand(0, strlen($karakter)-1);
	  $string .= $karakter{$pos};
	    }
	    return $string;
	}


	function get_rekapitulasi($id_sekolah,$id_jurusan_sekolah,$status_data){
		$hasil=$this->db->query("SELECT * FROM rekapitulasi_sekolah JOIN jurusan_sekolah USING(id_sekolah) WHERE rekapitulasi_sekolah.id_jurusan=jurusan_sekolah.id_jurusan AND id_sekolah=$id_sekolah AND id_jurusan_sekolah=$id_jurusan_sekolah AND status_data='$status_data'");
		return $hasil;
	}


}