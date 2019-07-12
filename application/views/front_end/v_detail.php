
<section class="home_banner_area">
	<div style="padding-top: 100px; padding-bottom: 20px; color: white; text-align: center;">
		<?php foreach ($sekolah->result() as $key ) { ?>
			<h2><?php echo $key->nama_sekolah; ?></h2>
			<label><?php echo $key->alamat_sekolah; ?></label>
		<?php } ?>
		
	</div>
	
	
</section>
<section>
	<h3 style= "text-align: center;">
		<hr style="width: 50px;">JURUSAN<hr style="width: 100px;">
	</h3>
	<style type="text/css">
		/*
 CSS for the main interaction
*/
.tabset > input[type="radio"] {
  position: absolute;
  left: -200vw;
}

.tabset .tab-panel {
  display: none;
}

.tabset > input:first-child:checked ~ .tab-panels > .tab-panel:first-child,
.tabset > input:nth-child(3):checked ~ .tab-panels > .tab-panel:nth-child(2),
.tabset > input:nth-child(5):checked ~ .tab-panels > .tab-panel:nth-child(3),
.tabset > input:nth-child(7):checked ~ .tab-panels > .tab-panel:nth-child(4),
.tabset > input:nth-child(9):checked ~ .tab-panels > .tab-panel:nth-child(5),
.tabset > input:nth-child(11):checked ~ .tab-panels > .tab-panel:nth-child(6) {
  display: block;
}

/*
 Styling
*/


.tabset > label {
  position: relative;
  display: inline-block;
  padding: 15px 15px 25px;
  border: 1px solid transparent;
  border-bottom: 0;
  cursor: pointer;
  font-weight: 600;
}

.tabset > label::after {
  content: "";
  position: absolute;
  left: 15px;
  bottom: 10px;
  width: 22px;
  height: 4px;
  background: #8d8d8d;
}

.tabset > label:hover,
.tabset > input:focus + label {
  color: #06c;
}

.tabset > label:hover::after,
.tabset > input:focus + label::after,
.tabset > input:checked + label::after {
  background: #06c;
}

.tabset > input:checked + label {
  border-color: #ccc;
  border-bottom: 1px solid #fff;
  margin-bottom: -1px;
}

.tab-panel {
  padding: 30px 0;
  border-top: 1px solid #ccc;
}



.tabset {
  /*max-width: 65em;*/
  padding: 10px 50px 10px 50px;
}
	</style>

<div class="tabset">
  <!-- Tab 1 -->
  <?php ;
  	foreach ($jurusan_sekolah as $key ) { ?>

  		<input type="radio" name="tabset" id="<?php echo $key->id_jurusan_sekolah;  ?>" aria-controls="<?php echo $key->id_jurusan_sekolah;  ?>" checked>
  		<label for="<?php echo $key->id_jurusan_sekolah;  ?>"><?php echo $key->nama_jurusan;  ?></label>
  <?php 
  	}
   ?>
  
  
  
  <div class="tab-panels">
  	<?php
		foreach ($jurusan_sekolah as $key ) { ?>
			<section id="<?php echo $key->id_jurusan_sekolah;  ?>" class="tab-panel">
				<form target="_blank" action="<?php echo site_url().'/ExportPdf' ?>" method="post">
					<input type="hidden" name="id_sekolah" value="<?php echo $key->id_sekolah ?>">
					<input type="hidden" name="id_jurusan_sekolah" value="<?php echo $key->id_jurusan_sekolah ?>">
					<button class="banner_btn" style="margin-bottom: 10px; float: right; font-family: times new roman;background-color: lightblue; font-size: 15px;">Laporan PDF</button>
				</form>
		      
		      <table class="datatable">
		      	<thead>
		      		<tr>
		      			<th>NO</th>
			      		<th>Unsur yang di verifikasi</th>
			      		<th>Status</th>
		      		</tr>
		      	</thead>
		      	<tbody>
		      		<tr>
		      			<td>1</td>
		      			<td>II. Standar Persyaratan Peralatan utama</td>
		      			<td>
		      			<?php
		      				$peralatan_utama=$this->m_entry->get_rekapitulasi($key->id_sekolah,$key->id_jurusan_sekolah,'peralatan_utama');
		      			 foreach ($peralatan_utama->result() as $per_utama ) {
		      			  	echo $per_utama->status_rekapitulasi;
		      			  } ?>
		      			</td>
		      			
		      		</tr>
		      		<tr>
		      			<td>2</td>
		      			<td>III. Standar Persyaratan Peralatan Pendukung</td>
		      			<td>
		      			<?php
		      				$peralatan_pendukung=$this->m_entry->get_rekapitulasi($key->id_sekolah,$key->id_jurusan_sekolah,'peralatan_pendukung');
		      			 foreach ($peralatan_pendukung->result() as $per_pendukung ) {
		      			  	echo $per_pendukung->status_rekapitulasi;
		      			  } ?>
		      			</td>
		      		</tr>
		      		<tr>
		      			<td>3</td>
		      			<td>IV. Standar Persyaratan Tempat Ruang</td>
		      			<td>
		      			<?php
		      				$ruangan=$this->m_entry->get_rekapitulasi($key->id_sekolah,$key->id_jurusan_sekolah,'ruangan');
		      			 foreach ($ruangan->result() as $ruang ) {
		      			  	echo $ruang->status_rekapitulasi;
		      			  } ?>
		      			</td>
		      		</tr>
		      		<tr>
		      			<td>4</td>
		      			<td>V. A. Standar Persyaratan Penguji internal</td>
		      			<td>
		      			<?php
		      				$penguji_internal=$this->m_entry->get_rekapitulasi($key->id_sekolah,$key->id_jurusan_sekolah,'penguji_internal');
		      			 foreach ($penguji_internal->result() as $pen_internal ) {
		      			  	echo $pen_internal->status_rekapitulasi;
		      			  } ?>
		      			</td>
		      		</tr>
		      		<tr>
		      			<td>5</td>
		      			<td>V. B. Standar Persyaratan Penguji Eksternal</td>
		      			<td>
		      			<?php
		      				$penguji_eksternal=$this->m_entry->get_rekapitulasi($key->id_sekolah,$key->id_jurusan_sekolah,'penguji_eksternal');
		      			 foreach ($penguji_eksternal->result() as $penguji_eksternal ) {
		      			  	echo $penguji_eksternal->status_rekapitulasi;
		      			  } ?>
		      			</td>
		      		</tr>
		      	</tbody>
		      </table>
		      
		  	</section>
	<?php 
	  	}
	?>
    
    
  </div>
  
</div>

</section>