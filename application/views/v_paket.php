
              
                <?php foreach ($jurusan->result() as $key ) {
  ?>            
                   <div class="row">
    <div class="col-sm-4" style="background-color:lavender;"><h3 class="page-title" style=" float: top; width: 800px; ">Data Paket </h3></div>
    <div class="col-sm-8" style="background-color:lavenderblush;"><h3 ">Jurusan : <?php echo $key->nama_jurusan ?></h3></div>
  </div>
                   
                
               
              
             <?php 

} ?>
        <!-- Main Sidebar -->
        
        <!-- End Main Sidebar -->
        
          
          <!-- / .main-navbar -->
        
            <!-- Page Header -->
            <div class="card" style="margin-top: 20px;">

              <div class="card-header">
                <a href="<?php echo base_url('index.php/jurusan') ?>" class="btn btn-danger"><i class="material-icons">arrow_back</i>Back</a>
               
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Input Paket
                </button>
 
              <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Paket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?php echo base_url().'index.php/paket/tambah_aksi'; ?>" >
                      <div class="modal-body">
                      <div class="form-group">
                        <label>Masukkan Nomor paket</label>
                       
                        <input type="hidden" name="id_jurusan" value="<?php echo $id_jurusan; ?>">
                        
                        <input class="form-control" type="text" name="no_paket" id="no_paket">
                    </div>
                      <div class="form-group">
                        <label>Masukkan Kurikulum</label>
                        <input class="form-control" type="text" name="kurikulum" id="kurikulum">
                    </div>
                    </div>
                    <div class="modal-footer">
                     <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                      <button class="btn btn-info">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
            <!-- End Page Header -->
            <div class="card-body">
             <table class="table table-bordered" id="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                         
                          <th scope="col">Nomor paket</th>
                          <th>Kurikulum</th>
                           <th>Spesifikasi</th>
                          <th>Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php foreach($paket->result() as $row):?>

                          <div class="modal fade" id="modal_<?php echo $row->id_paket;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Data Paket</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?php echo base_url().'index.php/paket/update'; ?>" >
                      <div class="modal-body">
                      <div class="form-group">
                        <label>Masukkan Nomor Paket</label>
                        <input type="hidden" name="id" value="<?php echo $row->id_paket ?>">
                        <input type="hidden" name="id_weh" value="<?php echo $id_jurusan; ?>">
                        <input class="form-control" type="text" name="no_paket" id="no_paket" value="<?php echo $row->no_paket;?>">
                    </div>
                    <div class="form-group">
                        <label>Masukkan Kurikulum</label>
                        <input class="form-control" type="text" name="kurikulum" id="kurikulum" value="<?php echo $row->kurikulum;?>">
                    </div>
                    </div>
                    <div class="modal-footer">
                     <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                      <button class="btn btn-info">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
                        <tr>
                          <th scope="row"><input type="checkbox" name="<?php echo $row->id_paket;?>">
                          </th>
                          <input type="hidden" name="id" value="<?php echo $row->id_paket ?>">
                          
                          <td><?php echo $row->no_paket;?></td>
                           <td>

                            <?php echo $row->kurikulum;?>
                          </td>
                          <td>
                            <form method="post" action="<?php echo base_url().'index.php/spesifikasi/spesifikasi/'.$row->id_paket ?>">
                                <div class="form-group">
                                  <input type="hidden" name="id_paket" value="<?php echo $row->id_paket; ?>">
                                  <input type="hidden" name="id_jurusan" value="<?php echo $kembali; ?>">
                          
                            <button class="btn btn-info"><i class="material-icons">settings</i>Setting Spesifikasi</button>
                                </div>
                            </form>
                          </td>
                          <td>
                            
                            <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal_<?php echo $row->id_paket;?>" >
                              <i class="fa fa-edit"></i> Edit
                            </button>
                              
                            <form method="post" action="<?php echo base_url().'index.php/paket/hapus/'.$row->id_paket ?>">
                                <div class="form-group">
                                  <input type="hidden" name="id_weh" value="<?php echo $id_jurusan; ?>">
                          
                            <button class="btn btn-info"><i class="fa fa-trash"></i>Hapus</button>
                                </div>
                            </form>
                            
                          </td>
                        </tr>
                        
                        <?php endforeach;?>
                        
                      </tbody>
             </table>
           </div>
          </div>
         <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2019
              <a href="http://www.bogor.indo.net.id/" rel="nofollow">PT BONET UTAMA</a>
            </span>
          </footer>
        
     
   
    
 