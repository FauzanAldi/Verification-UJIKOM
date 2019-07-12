<?php foreach ($jurusan_paket->result() as $key ) {
  ?>            
                   <div class="row">
    <div class="col-sm-4" style="background-color:lavender;"><h3 class="page-title" style=" float: top; width: 800px; ">Data Spesifikasi<br>NO Paket : <?php echo $key->no_paket.'-'.$key->kurikulum ?></h3></div>
    <div class="col-sm-8" style="background-color:lavenderblush;"><h3 ">Jurusan : <?php echo $key->nama_jurusan ?></h3></div>
  </div>
             
             <?php 

} ?>
<hr>
<div class="card">
	<div class="card-header">
        <a href="<?php echo base_url().'index.php/paket/data_paket/'.$kembali?>" class="btn btn-danger"><i class="material-icons">arrow_back</i>Back</a>
        <hr>
		<form  class="form-inline" method="post" action="<?php echo base_url().'index.php/spesifikasi/pilih' ?>" >
    <div class="form-group mb-2" style="margin-right: 10px;">
            <input type="hidden" name="id_paket" value="<?php echo  $id_paket?>">
            <input type="hidden" name="id_jurusan" value="<?php echo  $kembali ?>">
                  <select name="spesifikasi" id="spesifikasi" class="form-control">
                        <option value="0">-PILIH-</option>
                        <option value="peralatan_utama">Peralatan Utama</option>
                        <option value="peralatan_pendukung">Peralatan Pendukung</option>
                        <option value="ruangan">Ruangan</option>
                        <option value="penguji_internal">Penguji Internal</option>
 						<option value="penguji_eksternal">Penguji Eksternal</option>
                        
                  </select> 
                            
                                </div>
                                <div class="form-group mb-2">
                                	<button class="btn btn-info"><i class="material-icons">done</i>Pilih</button>
                                </div>
                                
                            </form>
	</div>
</div>
                 
                