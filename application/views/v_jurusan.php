
  <div class="row">
    <div class="col-sm-4" style="background-color:lavender;"><h3 class="page-title" style=" float: top; width: 800px; ">Data Jurusan </h3></div>
    
  </div>
        <!-- Main Sidebar -->
        
        <!-- End Main Sidebar -->
        
          
          <!-- / .main-navbar -->
        
            <!-- Page Header -->
            <div class="card" style="margin-top: 20px;">
               
              <div class="card-header">
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Input Jurusan
                </button>

              <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Jurusan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?php echo base_url().'index.php/jurusan/tambah_aksi'; ?>" >
                      <div class="modal-body">
                      <div class="form-group">
                        <label>Masukkan Nama Jurusan</label>
                        <input class="form-control" type="text" name="jurusan" id="jurusan">
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
                          <th scope="col">Nama Jurusan</th>
                          <th>Paket</th>
                          <th>Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php foreach($jurusan->result() as $row):?>
                          <div class="modal fade" id="modal_<?php echo $row->id_jurusan;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Data Jurusan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?php echo base_url().'index.php/jurusan/update'; ?>" >
                      <div class="modal-body">
                      <div class="form-group">
                        <label>Masukkan Nama Jurusan</label>
                        <input type="hidden" name="id" value="<?php echo $row->id_jurusan ?>">
                        <input class="form-control" type="text" name="nama" id="nama" value="<?php echo $row->nama_jurusan;?>">
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
                          <th scope="row"><input type="checkbox" name="<?php echo $row->id_jurusan;?>">
                          </th>
                          <td><?php echo $row->nama_jurusan;?></td>
                           <td>

                            <a href="<?php echo base_url().'index.php/paket/data_paket/'.$row->id_jurusan ?>" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true"><i class="material-icons">settings</i>Setting Paket</a>
                          </td>
                          <td>
                            <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal_<?php echo $row->id_jurusan;?>" >
                              <i class="fa fa-edit"></i> Edit
                            </button>
                            <button type="button" class="btn btn-xs btn-danger" onclick="window.location.href='<?php echo base_url().'index.php/jurusan/hapus/'.$row->id_jurusan ?>'">
                              <i class="fa fa-trash"></i> Hapus
                            </button>
                            
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
        
     
   
    
 