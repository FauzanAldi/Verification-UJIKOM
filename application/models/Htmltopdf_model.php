<?php
class Htmltopdf_model extends CI_Model
{	

	function __construct(){
		parent::__construct();	
		 $this->load->model('m_entry');	
	
                $this->load->helper('url');

         
	
	}
	// function fetch()
	// {
	// 	$this->db->order_by('CustomerID', 'DESC');
	// 	return $this->db->get('tbl_customer');
	// }
	function fetch_single_details($id_sekolah,$id_jurusan_sekolah)
	{	
		// Peralatan Utama
		$peralatan_utama=$this->m_entry->get_rekapitulasi($id_sekolah,$id_jurusan_sekolah,'peralatan_utama');
		     foreach ($peralatan_utama->result() as $per_utama ) {
		      			  	$status_peralatan_utama=$per_utama->status_rekapitulasi;
		      			  }
		// Peralatan Pendukung
		$peralatan_pendukung=$this->m_entry->get_rekapitulasi($id_sekolah,$id_jurusan_sekolah,'peralatan_pendukung');
		     foreach ($peralatan_pendukung->result() as $per_pendukung ) {
		      			  	$status_peralatan_pendukung=$per_pendukung->status_rekapitulasi;
		      			  }
		//Ruangan
		$ruangan=$this->m_entry->get_rekapitulasi($id_sekolah,$id_jurusan_sekolah,'ruangan');
		      			 foreach ($ruangan->result() as $ruang ) {
		      			  	$status_ruangan=$ruang->status_rekapitulasi;
		      			  }
		//Penguji Internal
		$penguji_internal=$this->m_entry->get_rekapitulasi($id_sekolah,$id_jurusan_sekolah,'penguji_internal');
		      			 foreach ($penguji_internal->result() as $pen_internal ) {
		      			  	$status_penguji_internal= $pen_internal->status_rekapitulasi;
		      			  }
		//Penguji eksternal
		$penguji_eksternal=$this->m_entry->get_rekapitulasi($id_sekolah,$id_jurusan_sekolah,'penguji_eksternal');
		      			 foreach ($penguji_eksternal->result() as $pen_eksternal ) {
		      			  	$status_penguji_eksternal= $pen_eksternal->status_rekapitulasi;
		      			  }
		// html content
		// $output='
		// 			<table class="datatable" border="1" style="margin-top: 20px;">
		//       	<thead>
		//       		<tr>
		//       			<th>NO</th>
		// 	      		<th>Unsur yang di verifikasi</th>
		// 	      		<th>Status</th>
		//       		</tr>
		//       	</thead>
		//       	<tbody>
		//       		<tr>
		//       			<td>1</td>
		//       			<td>II. Standar Persyaratan Peralatan utama</td>
		//       			<td>'.
		//       			$status_peralatan_utama
		//       			.'</td>
		      			
		//       		</tr>
		//       		<tr>
		//       			<td>2</td>
		//       			<td>III. Standar Persyaratan Peralatan Pendukung</td>
		//       			<td>'.
		//       			$status_peralatan_pendukung
		//       			.'</td>
		//       		</tr>
		//       		<tr>
		//       			<td>3</td>
		//       			<td>IV. Standar Persyaratan Tempat Ruang</td>
		//       			<td>'.
		//       			$status_ruangan
		//       			.'</td>
		//       		</tr>
		//       		<tr>
		//       			<td>4</td>
		//       			<td>V. A. Standar Persyaratan Penguji internal</td>
		//       			<td>'.$status_penguji_internal.'</td>
		//       		</tr>
		//       		<tr>
		//       			<td>5</td>
		//       			<td>V. B. Standar Persyaratan Penguji Eksternal</td>
		//       			<td>'.$status_penguji_eksternal.'</td>
		//       		</tr>
		//       	</tbody>
		//       	 </table>
		// 		 ';
		$output='
		<style type="text/css">
		

/*//////////////////////////////////////////////////////////////////
[ FONT ]*/


@font-face {
  font-family: Lato-Regular;
  src: url("../fonts/Lato/Lato-Regular.ttf"); 
}

@font-face {
  font-family: Lato-Bold;
  src: url("../fonts/Lato/Lato-Bold.ttf"); 
}

/*//////////////////////////////////////////////////////////////////
[ RESTYLE TAG ]*/
* {
	margin: 0px; 
	padding: 0px; 
	box-sizing: border-box;
}

body, html {
	height: 100%;
	font-family: sans-serif;
}

/* ------------------------------------ */
a {
	margin: 0px;
	transition: all 0.4s;
	-webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
}

a:focus {
	outline: none !important;
}

a:hover {
	text-decoration: none;
}

/* ------------------------------------ */
h1,h2,h3,h4,h5,h6 {margin: 0px;}

p {margin: 0px;}

ul, li {
	margin: 0px;
	list-style-type: none;
}


/* ------------------------------------ */
input {
  display: block;
	outline: none;
	border: none !important;
}

textarea {
  display: block;
  outline: none;
}

textarea:focus, input:focus {
  border-color: transparent !important;
}

/* ------------------------------------ */
button {
	outline: none !important;
	border: none;
	background: transparent;
}

button:hover {
	cursor: pointer;
}

iframe {
	border: none !important;
}

/*//////////////////////////////////////////////////////////////////
[ Scroll bar ]*/
.js-pscroll {
  position: relative;
  overflow: hidden;
}

.table100 .ps__rail-y {
  width: 9px;
  background-color: transparent;
  opacity: 1 !important;
  right: 5px;
}

.table100 .ps__rail-y::before {
  content: "";
  display: block;
  position: absolute;
  background-color: #ebebeb;
  border-radius: 5px;
  width: 100%;
  height: calc(100% - 30px);
  left: 0;
  top: 15px;
}

.table100 .ps__rail-y .ps__thumb-y {
  width: 100%;
  right: 0;
  background-color: transparent;
  opacity: 1 !important;
}

.table100 .ps__rail-y .ps__thumb-y::before {
  content: "";
  display: block;
  position: absolute;
  background-color: #cccccc;
  border-radius: 5px;
  width: 100%;
  height: calc(100% - 30px);
  left: 0;
  top: 15px;
}


/*//////////////////////////////////////////////////////////////////
[ Table ]*/

.limiter {
  width: 1366px;
  margin: 0 auto;
}

.container-table100 {
  width: 100%;
  min-height: 100vh;
  background: #fff;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  padding: 33px 30px;
}

.wrap-table100 {
  width: 1170px;
}

/*//////////////////////////////////////////////////////////////////
[ Table ]*/
.table100 {
  background-color: #fff;
}

table {
  width: 100%;
}

th, td {
  font-weight: unset;
  padding-right: 10px;
}

.column1 {
  width: 10%;
  padding:10px;
  
}

.column2 {
  width: 50%;
  padding:10px;
}

.column3 {
  width: 25%;
  padding:10px;
}

.column4 {
  width: 19%;
  padding:10px;
}

.column5 {
  width: 13%;
}

.table100-head th {
  padding-top: 18px;
  padding-bottom: 18px;
}

.table100-body td {
  padding-top: 16px;
  padding-bottom: 16px;
}

/*==================================================================
[ Fix header ]*/
.table100 {
  position: relative;
  padding-top: 60px;
}

.table100-head {
  position: absolute;
  width: 100%;
  top: 0;
  left: 0;
}

.table100-body {
  max-height: 585px;
  overflow: auto;
}


/*==================================================================
[ Ver1 ]*/

.table100.ver1 th {
  font-family: Lato-Bold;
  font-size: 18px;
  color: #fff;
  line-height: 1.4;

  background-color: #6c7ae0;
}

.table100.ver1 td {
  font-family: Lato-Regular;
  font-size: 15px;
  color: #808080;
  line-height: 1.4;
}

.table100.ver1 .table100-body tr:nth-child(even) {
  background-color: #f8f6ff;
}

/*---------------------------------------------*/

.table100.ver1 {
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -webkit-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -o-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -ms-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
}

.table100.ver1 .ps__rail-y {
  right: 5px;
}

.table100.ver1 .ps__rail-y::before {
  background-color: #ebebeb;
}

.table100.ver1 .ps__rail-y .ps__thumb-y::before {
  background-color: #cccccc;
}


/*==================================================================
[ Ver2 ]*/

.table100.ver2 .table100-head {
  box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
  -o-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
  -ms-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
}

.table100.ver2 th {
  font-family: Lato-Bold;
  font-size: 18px;
  color: #fa4251;
  line-height: 1.4;

  background-color: transparent;
}
</style>
	<div class="table100 ver1 m-b-110" style="margin: 20px 20px 20px 20px">
					<div class="table100-head">
						<table>
							<thead>
								
								<tr class="row100 head">
					      			<th class="cell100 column1">NO</th>
						      		<th class="cell100 column2">Unsur yang di Verifikasi</th>
						      		<th class="cell100 column3">Status</th>
					      		</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
								
								<tr>
				      			<td class="cell100 column1">1</td>
				      			<td class="cell100 column2">II. Standar Persyaratan Peralatan utama</td>
				      			<td class="cell100 column3">'.
		      			$status_peralatan_utama
		      			.'</td>
		      			
		      		</tr>
		      		<tr class="row100 body">
		      			<td class="cell100 column1">2</td>
		      			<td class="cell100 column2">III. Standar Persyaratan Peralatan Pendukung</td>
		      			<td class="cell100 column3">'.
		      			$status_peralatan_pendukung
		      			.'</td>
		      		</tr>
		      		<tr class="row100 body">
		      			<td class="cell100 column1">3</td>
		      			<td class="cell100 column2">IV. Standar Persyaratan Tempat Ruang</td>
		      			<td class="cell100 column3">'.
		      			$status_ruangan
		      			.'</td>
		      		</tr>
		      		<tr class="row100 body">
		      			<td class="cell100 column1">4</td>
		      			<td class="cell100 column2">V. A. Standar Persyaratan Penguji internal</td>
		      			<td class="cell100 column3">'.$status_penguji_internal.'</td>
		      		</tr>
		      		<tr class="row100 body">
		      			<td class="cell100 column1">5</td>
		      			<td class="cell100 column2">V. B. Standar Persyaratan Penguji Eksternal</td>
		      			<td class="cell100 column3">'.$status_penguji_eksternal.'</td>
		      		</tr>
								

				

								
							</tbody>
						</table>
					</div>
				</div>
		';
		return $output;
	}
}

?>