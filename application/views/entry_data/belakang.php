<div class="row">
    <div class="col-sm-4" style="background-color:lavender;"><h3 class="page-title" style=" float: top; width: 800px; ">Entry Data Verifikasi </h3></div>
    
  </div>
<hr>
            <!-- End Page Header -->
            <div class="card" style="width: 1600px; padding: 50px; margin-right: 50px;">
              <div class="card-header border-bottom">
                <div class="row">
             <form class="form-inline" action="<?php echo base_url().'index.php/entry/pilih' ?>" method="post">
                <div class="form-group mb-2">
                  <select name="sekolah" id="sekolah" class="form-control sekolah">
                        <option value="0">-PILIH-</option>
                        <?php 
                          foreach($sekolah->result() as $row):?>
                          <option value="<?php echo $row->id_sekolah;?>" <?php if($id_sekolah ==  $row->id_sekolah) { echo "selected";} ?>><?php echo $row->nama_sekolah;?></option>
                        <?php endforeach;?>
                  </select> 
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <select name="jurusan" id="jurusan" class="form-control jurusan" >
                        <option value="0">-PILIH-JURUSAN-</option>
                        <?php 
                          foreach($jurusan as $row):?>
                          <option value="<?php echo $row->id_paket;?>" <?php if($id_paket ==  $row->id_paket) { echo "selected";} ?>><?php echo $row->nama_jurusan;?></option>
                        <?php endforeach;?>
                        
                  </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                   <button type="submit" class="btn btn-primary mb-2" onclick="editForm()"><i class="material-icons">done</i>Pilih</button>
                </div>
               
              </form>
                    
              
                  
              
                </div>
              </div>
              <div  id="card-body">
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-peralatan-utama" role="tab" aria-controls="nav-home" aria-selected="true">Peralatan Utama</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-peralatan-pendukung" role="tab" aria-controls="nav-profile" aria-selected="false">Peralatan Pendukung</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-persyaratan-ruang" role="tab" aria-controls="nav-contact" aria-selected="false">Persyaratan Tempat</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-penguji-internal" role="tab" aria-controls="nav-contact" aria-selected="false">Penguji Internal</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-penguji-eksternal" role="tab" aria-controls="nav-contact" aria-selected="false">Penguji Eksternal </a>
                  </div>
                </nav>
                <form method="post" action="<?php echo base_url().'index.php/entry/peralatan_utama_sekolah/' ?>">
               <div><br></div>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-peralatan-utama" role="tabpanel" aria-labelledby="nav-home-tab">
                    
                      <table class="table table-bordered" id="table" style="width: 50px; font-size: 12px;">
                      <thead>
                        <tr>
                          <th scope="col" rowspan="3">No.</th>
                          <th scope="col" rowspan="3">Nama Alat</th>
                          <th scope="col" rowspan="3">Spesifikasi</th>
                          <th scope="col" rowspan="3">Jumlah</th>
                          <th scope="col" rowspan="3">Kondisi</th>
                          <th colspan="9">Tingkat Kualitas/Kesesuaian Peralatan</th>
                        </tr>
                        <tr>
                          <th colspan="3">A1. Spesifikasi Alat</th>
                          <th colspan="3">A2. Jumlah Alat</th>
                          <th colspan="3">A3. kondisi Alat</th>
                        </tr>
                        <tr>
                          <th>1</th>
                          <th>2</th>
                          <th>3</th>
                          <th>1</th>
                          <th>2</th>
                          <th>3</th>
                          <th>1</th>
                          <th>2</th>
                          <th>3</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                          
                           $sekolah = $id_sekolah;
                           $paket = $id_paket;
                  $query=$this->db->query("SELECT * FROM persyaratan_peralatan_paket join persyaratan_peralatan_paket_sekolah using(id_persyaratan_peralatan) where jenis='utama' AND id_paket='$paket' and id_sekolah='$sekolah'");
                  $no=1;
 foreach ( $query -> result () as $row )
 {
         ?>
                        <tr>
                          <th ><?php echo $no++; ?></th>
                          <td><?php echo $row -> nama_alat ;?></td>
                          <td>
                            <?php echo $row -> spesifikasi ;?>
                          </td>
                          <td><input 
                            value="<?php echo $row->jumlah ?>"
                            type="text"
                             title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_ jum_<?php echo $row->id_persyaratan_peralatan_sekolah ?>"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>">
                          </td>
                          <td> <textarea 
                            rows="4" cols="50"
                            title="<?php echo $row->id_sekolah ?>"
                            class="peralatan_ kondisi_peralatan_<?php echo $row->id_persyaratan_peralatan_sekolah ?>"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            
                             name="ket_ruangan_<?php echo $row->id_persyaratan_peralatan_sekolah ?>"><?php echo $row->kondisi ?></textarea></td>
                          <input type="hidden" name="id_persyaratan_peralatan[]" id="id_persyaratan_peralatan" value="<?php echo $row -> id_persyaratan_peralatan ;?>">
                           <input type="hidden" name="id_sekolah" value="<?php echo $id_sekolah ;?>">
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            type="radio" 
                             
                            name="myRadios_<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            value="1"<?php if (isset($row)) {
                                  if($row->spesifikasi_alat=='1'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            type="radio" 
                            name="myRadios_<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            value="2"<?php if (isset($row)) {
                                  if($row->spesifikasi_alat=='2'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            type="radio" 
                            name="myRadios_<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            value="3"<?php if (isset($row)) {
                                  if($row->spesifikasi_alat=='3'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            type="radio" 
                            name="myRadios_2_<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            value="1"<?php if (isset($row)) {
                                  if($row->jumlah_alat=='1'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            type="radio" 
                            name="myRadios_2_<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            value="2"<?php if (isset($row)) {
                                  if($row->jumlah_alat=='2'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            type="radio" 
                            name="myRadios_2_<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            value="3"<?php if (isset($row)) {
                                  if($row->jumlah_alat=='3'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            type="radio" 
                            name="myRadios_3_<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            value="1"<?php if (isset($row)) {
                                  if($row->kondisi_alat=='1'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            type="radio" 
                            name="myRadios_3_<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            value="2"<?php if (isset($row)) {
                                  if($row->kondisi_alat=='2'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            type="radio" 
                            name="myRadios_3_<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            value="3"<?php if (isset($row)) {
                                  if($row->kondisi_alat=='3'){echo 'checked';}
                                    }?>  /><br></td>
                        </tr>
                           <?php } ?>
                      </tbody>
                    </table>

                
                  </div>
             
                  <div class="tab-pane fade" id="nav-peralatan-pendukung" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <table class="table table-bordered" style="width: 50px; font-size: 12px;">
                      <thead>
                        <tr>
                          <th scope="col" rowspan="3">No.</th>
                          <th scope="col" rowspan="3">Nama Alat</th>
                          <th scope="col" rowspan="3">Spesifikasi</th>
                          <th scope="col" rowspan="3">Jumlah</th>
                          <th scope="col" rowspan="3">Kondisi</th>
                          <th colspan="9">Tingkat Kualitas/Kesesuaian Peralatan</th>
                        </tr>
                        <tr>
                          <th colspan="3">A1. Spesifikasi Alat</th>
                          <th colspan="3">A2. Jumlah Alat</th>
                          <th colspan="3">A3. kondisi Alat</th>
                        </tr>
                        <tr>
                          <th>1</th>
                          <th>2</th>
                          <th>3</th>
                          <th>1</th>
                          <th>2</th>
                          <th>3</th>
                          <th>1</th>
                          <th>2</th>
                          <th>3</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                         $query=$this->db->query("SELECT * FROM persyaratan_peralatan_paket join persyaratan_peralatan_paket_sekolah using(id_persyaratan_peralatan) where jenis='pendukung' AND id_paket='$paket' and id_sekolah='$sekolah'");
                  $no=1;
 foreach ( $query -> result () as $row )
 {
         ?>
                         <tr>
                          <th ><?php echo $no++; ?></th>
                          <td><?php echo $row -> nama_alat ;?></td>
                          <td>
                            <?php echo $row -> spesifikasi ;?>
                          </td>
                          <td><input 
                            value="<?php echo $row->jumlah ?>"
                            type="text"
                             title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_ jum_<?php echo $row->id_persyaratan_peralatan_sekolah ?>"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>">
                          </td>
                          <td> <textarea 
                            rows="4" cols="50"
                            title="<?php echo $row->id_sekolah ?>"
                            class="peralatan_ kondisi_peralatan_<?php echo $row->id_persyaratan_peralatan_sekolah ?>"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            
                             name="ket_ruangan_<?php echo $row->id_persyaratan_peralatan_sekolah ?>"><?php echo $row->kondisi ?></textarea></td>
                          <input type="hidden" name="id_persyaratan_peralatan[]" id="id_persyaratan_peralatan" value="<?php echo $row -> id_persyaratan_peralatan ;?>">
                           <input type="hidden" name="id_sekolah" value="<?php echo $id_sekolah ;?>">
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            type="radio" 
                             
                            name="myRadios_<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            value="1"<?php if (isset($row)) {
                                  if($row->spesifikasi_alat=='1'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            type="radio" 
                            name="myRadios_<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            value="2"<?php if (isset($row)) {
                                  if($row->spesifikasi_alat=='2'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            type="radio" 
                            name="myRadios_<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            value="3"<?php if (isset($row)) {
                                  if($row->spesifikasi_alat=='3'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            type="radio" 
                            name="myRadios_2_<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            value="1"<?php if (isset($row)) {
                                  if($row->jumlah_alat=='1'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            type="radio" 
                            name="myRadios_2_<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            value="2"<?php if (isset($row)) {
                                  if($row->jumlah_alat=='2'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            type="radio" 
                            name="myRadios_2_<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            value="3"<?php if (isset($row)) {
                                  if($row->jumlah_alat=='3'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            type="radio" 
                            name="myRadios_3_<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            value="1"<?php if (isset($row)) {
                                  if($row->kondisi_alat=='1'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            type="radio" 
                            name="myRadios_3_<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            value="2"<?php if (isset($row)) {
                                  if($row->kondisi_alat=='2'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="peralatan_"
                            alt="<?php echo $row->id_persyaratan_peralatan ?>"
                            id="<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            type="radio" 
                            name="myRadios_3_<?php echo $row->id_persyaratan_peralatan_sekolah ?>" 
                            value="3"<?php if (isset($row)) {
                                  if($row->kondisi_alat=='3'){echo 'checked';}
                                    }?>  /><br></td>
                        </tr>
                           <?php } ?>
                      </tbody>  
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="nav-persyaratan-ruang" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <table class="table table-bordered" style="float: left;">
                      <thead>
                        <tr>
                          <th scope="col" rowspan="2">No.</th>
                          <th scope="col" rowspan="2">Persyaratan Tempat</th>
                          <th colspan="3">Tingkat Kualitas/Kesesuaian Peralatan</th>
                          <th rowspan="2">Keterangan</th>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                        </tr>
                      </thead>
                      <tbody>
                         <?php 
                          
                           $sekolah = $id_sekolah;
                           $paket = $id_paket;
                  $query=$this->db->query("SELECT * FROM persyaratan_ruang join persyaratan_ruang_sekolah using(id_persyaratan_ruang) where  id_paket='$paket' and id_sekolah='$sekolah'");
                  $no=1;
 foreach ( $query -> result () as $row )
 {
         ?>
                        <tr>
                          <th ><?php echo $no++; ?></th>
                          <td><?php echo $row -> persyaratan_ruang ;?></td>
                           <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="ruangan_"
                            alt="<?php echo $row->id_persyaratan_ruang ?>"
                            id="<?php echo $row->id_persyaratan_ruang_sekolah ?>" 
                            type="radio" 
                             name="ruangan_<?php echo $row->id_persyaratan_ruang_sekolah ?>"
                            value="1"<?php if (isset($row)) {
                                  if($row->tingkat_kesesuaian=='1'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"
                            class="ruangan_"
                            alt="<?php echo $row->id_persyaratan_ruang ?>"
                            id="<?php echo $row->id_persyaratan_ruang_sekolah ?>" 
                            type="radio" 
                             name="ruangan_<?php echo $row->id_persyaratan_ruang_sekolah ?>"
                            value="2"<?php if (isset($row)) {
                                  if($row->tingkat_kesesuaian=='2'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"
                            class="ruangan_"
                            alt="<?php echo $row->id_persyaratan_ruang ?>"
                            id="<?php echo $row->id_persyaratan_ruang_sekolah ?>" 
                            type="radio" 
                             name="ruangan_<?php echo $row->id_persyaratan_ruang_sekolah ?>"
                            value="3"<?php if (isset($row)) {
                                  if($row->tingkat_kesesuaian=='3'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <textarea 
                            rows="4" cols="50"
                            title="<?php echo $row->id_sekolah ?>"
                            class="ruangan_ ket_ruangan_<?php echo $row->id_persyaratan_ruang_sekolah ?>"
                            alt="<?php echo $row->id_persyaratan_ruang ?>"
                            id="<?php echo $row->id_persyaratan_ruang_sekolah ?>" 
                            
                             name="ket_ruangan_<?php echo $row->id_persyaratan_ruang_sekolah ?>"><?php echo $row->keterangan ?></textarea>
                          </td>
                        </tr>
                           <?php } ?>
                        
                      </tbody>
                    </table >
                  </div>
                  <div class="tab-pane fade" id="nav-penguji-internal" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <table class="table table-bordered" style="float: left;">
                      <thead>
                        <tr>
                          <th scope="col" rowspan="2">No.</th>
                          <th scope="col" rowspan="2">Persyaratan Tim Penguji</th>
                          <th colspan="3">Tingkat Kualitas</th>
                          <th rowspan="2">Keterangan</th>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                         $query=$this->db->query("SELECT * FROM persyaratan_penguji join persyaratan_penguji_sekolah using(id_persyaratan_penguji) where jenis='Internal' AND id_paket='$paket' and id_sekolah='$sekolah'");
                  $no=1;
 foreach ( $query -> result () as $row )
 {
         ?>
                        <tr>
                          <th ><?php echo $no++; ?></th>
                          <td><?php echo $row -> persyaratan_penguji ;?></td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="penguji_"
                            alt="<?php echo $row->id_persyaratan_penguji ?>"
                            id="<?php echo $row->id_persyaratan_penguji_sekolah ?>" 
                            type="radio" 
                             name="penguji_<?php echo $row->id_persyaratan_penguji_sekolah ?>"
                            value="1"<?php if (isset($row)) {
                                  if($row->tingkat_kesesuaian=='1'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="penguji_"
                            alt="<?php echo $row->id_persyaratan_penguji ?>"
                            id="<?php echo $row->id_persyaratan_penguji_sekolah ?>" 
                            type="radio" 
                             name="penguji_<?php echo $row->id_persyaratan_penguji_sekolah ?>"
                            value="2"<?php if (isset($row)) {
                                  if($row->tingkat_kesesuaian=='2'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="penguji_"
                            alt="<?php echo $row->id_persyaratan_penguji ?>"
                            id="<?php echo $row->id_persyaratan_penguji_sekolah ?>" 
                            type="radio" 
                             name="penguji_<?php echo $row->id_persyaratan_penguji_sekolah ?>"
                            value="3"<?php if (isset($row)) {
                                  if($row->tingkat_kesesuaian=='3'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <textarea 
                            rows="4" cols="50"
                            title="<?php echo $row->id_sekolah ?>"
                            class="penguji_ ket_penguji_<?php echo $row->id_persyaratan_penguji_sekolah ?>"
                            alt="<?php echo $row->id_persyaratan_penguji ?>"
                            id="<?php echo $row->id_persyaratan_penguji_sekolah ?>" 
                            
                             name="ket_penguji_<?php echo $row->id_persyaratan_penguji_sekolah ?>"><?php echo $row->keterangan ?></textarea>
                          </td>
                        </tr>
                           <?php } ?>
                        
                      </tbody>
                    </table>
                  </div>
                                    <div class="tab-pane fade" id="nav-penguji-eksternal" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <table class="table table-bordered" style="float: left;">
                      <thead>
                        <tr>
                          <th scope="col" rowspan="2">No.</th>
                          <th scope="col" rowspan="2">Persyaratan Tim Penguji</th>
                          <th colspan="3">Tingkat Kualitas</th>
                          <th rowspan="2">Keterangan</th>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                        </tr>
                      </thead>
                      <tbody>
                         <?php 
                         $query=$this->db->query("SELECT * FROM persyaratan_penguji join persyaratan_penguji_sekolah using(id_persyaratan_penguji) where jenis='Eksternal' AND id_paket='$paket' and id_sekolah='$sekolah'");
                  $no=1;
 foreach ( $query -> result () as $row )
 {
         ?>
                        <tr>
                          <th ><?php echo $no++; ?></th>
                          <td><?php echo $row -> persyaratan_penguji ;?></td>
                        <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="penguji_"
                            alt="<?php echo $row->id_persyaratan_penguji ?>"
                            id="<?php echo $row->id_persyaratan_penguji_sekolah ?>" 
                            type="radio" 
                             name="penguji_<?php echo $row->id_persyaratan_penguji_sekolah ?>"
                            value="1"<?php if (isset($row)) {
                                  if($row->tingkat_kesesuaian=='1'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="penguji_"
                            alt="<?php echo $row->id_persyaratan_penguji ?>"
                            id="<?php echo $row->id_persyaratan_penguji_sekolah ?>" 
                            type="radio" 
                             name="penguji_<?php echo $row->id_persyaratan_penguji_sekolah ?>"
                            value="2"<?php if (isset($row)) {
                                  if($row->tingkat_kesesuaian=='2'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <input 
                            title="<?php echo $row->id_sekolah ?>"                  
                            class="penguji_"
                            alt="<?php echo $row->id_persyaratan_penguji ?>"
                            id="<?php echo $row->id_persyaratan_penguji_sekolah ?>" 
                            type="radio" 
                             name="penguji_<?php echo $row->id_persyaratan_penguji_sekolah ?>"
                            value="3"<?php if (isset($row)) {
                                  if($row->tingkat_kesesuaian=='3'){echo 'checked';}
                                    }?>  />
                          </td>
                          <td>
                            <textarea 
                            rows="4" cols="50"
                            title="<?php echo $row->id_sekolah ?>"
                            class="penguji_ ket_penguji_<?php echo $row->id_persyaratan_penguji_sekolah ?>"
                            alt="<?php echo $row->id_persyaratan_penguji ?>"
                            id="<?php echo $row->id_persyaratan_penguji_sekolah ?>" 
                            
                             name="ket_penguji_<?php echo $row->id_persyaratan_penguji_sekolah ?>"><?php echo $row->keterangan ?></textarea>
                          </td>
                        </tr>
                           <?php } ?>
                        
                      </tbody>
                    </table>
                  </div>
                 
                </div>
                    </form>
              </div>
            </div>