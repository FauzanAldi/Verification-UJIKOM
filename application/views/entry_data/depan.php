<div class="row">
    <div class="col-sm-4" style="background-color:lavender;"><h3 class="page-title" style=" float: top; width: 800px; ">Entry Data Verifikasi </h3></div>
    
  </div>
<hr>
            <!-- End Page Header -->
            <div class="card">
              <div class="card-header border-bottom">
                <div class="row">
              <form class="form-inline" action="<?php echo base_url().'index.php/entry/pilih' ?>" method="post">
                <div class="form-group mb-2">
                  <select name="sekolah" id="sekolah" class="form-control sekolah">
                        <option value="0">-Pilih-Sekolah-</option>
                        <?php 
                          foreach($sekolah->result() as $row):?>
                          <option value="<?php echo $row->id_sekolah;?>"><?php echo $row->nama_sekolah;?></option>
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
            </div>