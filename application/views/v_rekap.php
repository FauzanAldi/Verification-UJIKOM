<div class="row">
    <div class="col-sm-5" style="background-color:lavender;"><h3 class="page-title" style=" float: top; width: 900px; ">REKAPITULASI HASIL VERIFIKASI </h3></div>
    
  </div>
<hr>
<div class="card">
	<div class="card-header border-bottom">
                <div class="row">
             <form class="form-inline" action="<?php echo base_url().'index.php/entry/pilih' ?>" method="post">
                <div class="form-group mb-2">
                  <select name="sekolah" id="sekolah" class="form-control sekolah">
                        <option value="0">-PILIH-</option>
                        <?php 
                          foreach($sekolah->result() as $row):?>
                          <option value="<?php echo $row->id_sekolah;?>" <?php if (isset($id_sekolah)): if($id_sekolah ==  $row->id_sekolah) { echo "selected";}  endif ?>><?php echo $row->nama_sekolah;?></option>
                        <?php endforeach;?>
                  </select> 
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <select name="jurusan" id="jurusan" class="jurusan form-control" style="width: 200px;">
                        <option value="0">-PILIH-Jurusan-</option>
                        
                  </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                   <button type="submit" class="btn btn-primary mb-2" onclick="editForm()"><i class="material-icons">done</i>Pilih</button>
                </div>
               
              </form>
                    
              
                  
              
                </div>
              </div>
         <div class="card-body">
             <table class="table table-bordered" id="table">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Unsur yang di Verifikasi</th>
                          <th>Status</th>
                          <!-- <th>Tindakan</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        	<td>1</td>
                        	<td>II. Standar Persyaratan Peralatan utama</td>
                        	<td>Sangat Layak</td>
                        </tr>
                       	<tr>
                        	<td>2</td>
                        	<td>III. Standar Persyaratan Peralatan Pendukung</td>
                        	<td>Belum Layak</td>
                        </tr>
                        <tr>
                        	<td>3</td>
                        	<td>IV. Standar Persyaratan Tempat Ruang</td>
                        	<td>Penilaialan Belum Selesai</td>
                        </tr>
                        <tr>
                        	<td>4</td>
                        	<td>V. A.  Standar Persyaratan Penguji internal</td>
                        	<td>Belum Layak</td>
                        </tr>
                        <tr>
                        	<td>5</td>
                        	<td>V. B.  Standar Persyaratan Penguji Eksternal</td>
                        	<td>Layak</td>
                        </tr>
                        
                      </tbody>
             </table>
           </div>
</div>