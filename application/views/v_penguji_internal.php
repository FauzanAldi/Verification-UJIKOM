<?php foreach ($jurusan_paket->result() as $key ) {
  ?>            
                   <div class="row">
    <div class="col-sm-4" style="background-color:lavender;"><h3 class="page-title" style=" float: top; width: 800px; ">Data Spesifikasi<br>NO Paket : <?php echo $key->no_paket.'-'.$key->kurikulum ?></h3></div>
    <div class="col-sm-8" style="background-color:lavenderblush;"><h3 ">Jurusan : <?php echo $key->nama_jurusan ?></h3></div>
  </div>
             
             <?php 

} ?>
<hr>
<div class="card" style="padding: 20px 50px 50px 50px; ">
	<div class="card-header">
    <?php $row=$paket->row(); ?>
    <a href="<?php echo base_url().'index.php/paket/data_paket/'.$row->id_jurusan ?>" class="btn btn-danger"><i class="material-icons">arrow_back</i>Back</a>
        <hr>
		<form  class="form-inline" method="post" action="<?php echo base_url().'index.php/spesifikasi/pilih' ?>" >
    <div class="form-group mb-2" style="margin-right: 10px;">
            <input type="hidden" name="id_paket" value="<?php echo $id_paket ?>">
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
                            <hr>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Input Data Persyaratan Penguji Internal
                </button>
                <hr>

              <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Persyaratan Penguji Internal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?php echo base_url().'index.php/penguji_internal/tambah_aksi'; ?>" >
                      <div class="modal-body">
                      <div class="form-group">
                        <label>Indikator Persyaratan Penguji Internal</label>
                        <input type="hidden" name="id_paket" value="<?php echo $id_paket ?>">
                        <input class="form-control" type="text" name="persyaratan_penguji_internal" >
                    </div>
                     
                    <div class="modal-footer">
                     <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                      <button class="btn btn-info">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
    <div card-body>
        <table style="padding: 10px; " class="table table-bordered" id="table">
                      <thead>
                        <tr>
                          <th scope="col" >#</th>
                          <th scope="col" >Nama Alat</th>
                         
                          <th scope="col" >Action</th>
                          
                        </tr>
                        
                        
                      </thead>
                      <tbody>
                        <?php
                        
                        foreach ( $penguji_internal -> result () as $row )
 {

         ?>
         <div class="modal fade" id="modal_<?php echo $row->id_persyaratan_penguji;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Persyaratan Penguji Internal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   <form method="post" action="<?php echo base_url().'index.php/penguji_internal/update'; ?>" >
                      <div class="modal-body">
                      <div class="form-group">
                        <label>Indikator Persyaratan Penguji Internal</label>
                        <input type="hidden" name="id" value="<?php echo $row->id_persyaratan_penguji ?>">
                        <input type="hidden" name="id_paket" value="<?php echo $id_paket ?>">
                        <input class="form-control" type="text" name="persyaratan_penguji_internal" value=" <?php echo  $row->persyaratan_penguji; ?>">
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
                          <th scope="row"><input type="checkbox" name="<?php echo $row->id_persyaratan_penguji;?>">
                          <td><?php echo $row -> persyaratan_penguji ;?></td>
                          <td>
                            <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal_<?php echo $row->id_persyaratan_penguji;?>" >
                              <i class="fa fa-edit"></i> Edit
                            </button>
                            <form method="post" action="<?php echo base_url().'index.php/penguji_internal/hapus/'.$row->id_persyaratan_penguji ?>">
                                <div class="form-group">
                                  <input type="hidden" name="id_weh" value="<?php echo $id_paket; ?>">
                          
                            <button class="btn btn-info"><i class="fa fa-trash"></i>Hapus</button>
                                </div>
                            </form>
                          </td>

                        </tr>
                           <?php } ?>
                        
                          
                      </tbody>
                    </table>
    </div>
</div>

<footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2019
              <a href="http://www.bogor.indo.net.id/" rel="nofollow">PT BONET UTAMA</a>
            </span>
          </footer>
                 
                