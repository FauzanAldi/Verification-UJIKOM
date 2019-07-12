
<div class="card" style="padding: 20px 50px 50px 50px; ">
  <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Entry data Sekolah</h3>
              </div>
              <?php
               foreach ( $sekolah->result() as $row )
 {

          }
         ?>
              <form   class="" method="post" action="<?php echo base_url().'index.php/sekolah/update' ?>" >
  <div class="card-header">
    <hr>
    
      <div class="form-group" style="margin-right: 20px; padding: 10px;">
                        <label>Nama Sekolah :</label>
                        <input type="hidden" name="id_sekolah" value="<?php echo $row->id_sekolah ?>">
                        <input class="form-control" type="text" name="nama_sekolah" style="margin-left: 20px;" value="<?php echo $row->nama_sekolah;?>">
                    </div>
                     <div class="form-group">
                        <label>Alamat Sekolah :</label><br>
                        <textarea cols="40" rows="4" name="alamat_sekolah" style="margin-left: 20px;"><?php echo $row->alamat_sekolah;?></textarea>
                        
                    </div>
                    <div class="form-group" style="margin-right: 20px; padding: 10px;">
                        <label>Pin Sekolah :</label>
                        <input class="form-control" type="text" name="password_sekolah" style="margin-left: 20px;" value="<?php echo $row->password_sekolah;?>">
                    </div>
                                
    
                            <hr>
                            <label><h5>Pilih Jurusan yang tersedia :</h5></label><br>
                            <label>Ceklis Jurusan yang tersedia</label>
       
                

                
  </div>
    <div card-body>
        <table style="padding: 10px; " class="table table-bordered" id="table">
                       <thead>
                        <tr>
                          <th scope="col" >#</th>
                          <th scope="col" >Nama Jurusan</th>
                         
                          <th scope="col" >Jumlah Peserta</th>
                          <th scope="col">Pilih Paket</th>
                        </tr>
                        
                        
                      </thead>
                      <tbody>
                        <?php
                        
                        foreach ( $jurusan_sekolah  as $row )
 {

         ?>
         
                        <tr>
                          <th scope="row"><input type="checkbox" value="<?php echo $row->id_jurusan;?>" name="check_list[]">
                          <td><?php echo $row -> nama_jurusan ;?></td>
                          <td><input value="<?php echo $row->jumlah_peserta ?>" type="text" name="jumlah_peserta_<?php echo $row->id_jurusan;?>" placeholder="Masukkan Jumlah Peserta" style="border: 0"></td>
                          <td>
                            <?php 
                      
                      $id_jur = $row->id_jurusan;
                    $query=$this->db->query("SELECT * FROM paket  where id_jurusan='$id_jur' ");

                            ?>
                            <select name="paket_<?php echo $row->id_jurusan;?>">
                              
                              <option value="0">Pilih Paket</option>
                              <?php foreach ( $query->result () as $pak )
                                    {
                                      ?>
                              <option value="<?php echo $pak->id_paket;  ?>" <?php if($row->id_paket ==  $pak->id_paket) { echo "selected";} ?>>
                                <?php echo $pak->no_paket.' '.$pak->kurikulum;  ?></option>
                                      <?php }?>
                            </select>
                          </td>
                        </tr>
                           <?php } ?>
                        
                          
                      </tbody>
                    </table>
                    <p align="right" style="margin-top: 20px;">
                      <button class="btn btn-primary btn-lg">Simpan</button>
                    </p>
    </div>
    </form>
</div>

<footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2019
              <a href="http://www.bogor.indo.net.id/" rel="nofollow">PT BONET UTAMA</a>
            </span>
          </footer>
                 
                