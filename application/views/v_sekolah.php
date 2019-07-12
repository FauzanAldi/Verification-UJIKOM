      
                   <div class="row">
    <div class="col-sm-4" style="background-color:lavender;"><h3 class="page-title" style=" float: top; width: 800px; ">Data Sekolah</h3></div>
   
  </div>
             
          
        <!-- Main Sidebar -->
        
        <!-- End Main Sidebar -->
        
          
          <!-- / .main-navbar -->
        
            <!-- Page Header -->
            <div class="card" style="margin-top: 20px;">
              <div class="card-header">
              <!-- Button trigger modal -->
              
                <button type="button" class="btn btn-xs btn-primary" onclick="window.location.href='<?php echo base_url().'index.php/sekolah/tambah_data/' ?>'">
                              <i class="material-icons">input</i> Input Data Sekolah Baru
                            </button>
              
                

              
        
            <!-- End Page Header -->
            <div class="card-body">
             <table class="table table-bordered" id="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama Sekolah</th>
                          <th>Alamat Sekolah</th>
                          <th>PIN Sekolah</th>
                          <th>Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php foreach($sekolah->result() as $row):?>
                          
                        <tr>
                          <th scope="row"><input type="checkbox" name="<?php echo $row->id_sekolah;?>">
                          </th>
                          <td><?php echo $row->nama_sekolah;?></td>
                           <td>
                            <?php echo $row->alamat_sekolah;?>
                          </td>
                          <td>
                            <?php echo $row->password_sekolah;?>
                          </td>
                          <td>
                            <form method="post" action="<?php echo base_url().'index.php/sekolah/edit/'.$row->id_sekolah ?>">
                              <div class="form-group">
                        <input type="hidden" name="id_sekolah" value="<?php echo $row->id_sekolah ?>">
                            <button class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                            </div>  
                            </form>  
                            
                            <button type="button" class="btn btn-xs btn-danger" onclick="window.location.href='<?php echo base_url().'index.php/sekolah/hapus/'.$row->id_sekolah ?>'">
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
        
     
   
    
 