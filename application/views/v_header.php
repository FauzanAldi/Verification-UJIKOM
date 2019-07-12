<!Doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="<?php echo base_url('front/img/favicon.png') ?>" type="image/png">
    <title>Administrator</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="<?php echo base_url('styles/shards-dashboards.1.1.0.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('styles/extras.1.1.0.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('datatable/css/jquery.dataTables.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('datatable/css/dataTables.bootstrap4.css');?>">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    
  </head>
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar" pos>
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <i class="material-icons">
accessibility
</i>
                  <span class="d-none d-md-inline ml-1">Administrator</span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
            <div class="input-group input-group-seamless ml-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-search"></i>
                </div>
              </div>
              <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
          </form>
         <!--  <div class="">sad</div> -->
          <div class="nav-wrapper">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " href="<?php echo site_url('entry/entry_data') ?>">
                  <i class="material-icons">edit</i>
                  <span>Entry Data</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="<?php echo site_url('jurusan') ?>">
                  <i class="material-icons">vertical_split</i>
                  <span>Jurusan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="<?php echo site_url('sekolah') ?>">
                  <i class="material-icons">edit</i>
                  <span>Sekolah</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="<?php echo site_url('Rekapitulasi') ?>">
                  <i class="material-icons">show_chart</i>
                  <span>Rekapitulasi</span>
                </a>
              </li>
            </ul>
          </div>

        </aside>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white" style="position: fixed; width: 84%;">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                <div class="input-group input-group-seamless ml-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                  <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
              </form>
              <!-- <div class="navbar" style="border-left: 1px solid lightgrey">
                <a class="" href="<?php echo site_url('sekolah') ?>">
                  <i class="material-icons">language</i>
                  <span>Front End</span>
                </a>
              </div> -->
              <ul class="navbar-nav border-left flex-row ">
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    
                    <span class="d-none d-md-inline-block" style="padding-top: 10px; padding-left: 20px; padding-right: 20px;">Admin</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="<?php echo site_url() ?>" target="_blank">
                      <i class="material-icons text-danger">language</i> Ke Front End </a>
                      <a class="dropdown-item text-danger" href="<?php echo base_url('index.php/login/logout') ?>">
                      <i class="material-icons text-danger">&#xE879;</i> Logout </a>
                  </div>

                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4" style="margin-top: 100px;">
            <!-- Page Header -->
            <?php $this->load->view($content);  ?>
            <!-- End Page Header -->
          </div>
        </main>
            
                  

      </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script> -->
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="<?php echo base_url('scripts/extras.1.1.0.min.js') ?>"></script>
     <script type="text/javascript" charset="utf8" src="<?php echo base_url('datatable/js/jquery.dataTables.min.js') ?>"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <!--  <script>
            $(document).ready(function () {
                $("#sekolah").select2({
                    placeholder: "Please Select"
                });
 
                $("#kota2").select2({
                    placeholder: "Please Select"
                });
            });
        </script> -->
    <script src="<?php echo base_url('scripts/app/app-blog-overview.1.1.0.js') ?>"></script>

    <script type="text/javascript">
      $('.table').dataTable(); 
    </script>
    <script type="text/javascript">
  $(document).ready(function(){

  
    $(document.getElementsByClassName("peralatan_")).change(function()  {
      // var no=0;
     var id_sekolah=$(this).attr("title");
      var id=$(this).attr("id"); 
      var id_persyaratan=$(this).attr("alt");
      var A1=$("input[name='myRadios_"+id+"']:checked").val();
      var A2=$("input[name='myRadios_2_"+id+"']:checked").val();
      var A3=$("input[name='myRadios_3_"+id+"']:checked").val();
      var jumlah=document.getElementsByClassName("jum_"+id)[0].value;
       var kondisi =document.getElementsByClassName("kondisi_peralatan_"+id)[0].value;
      // alert(id); 
      // alert(jumlah);
      //  alert(A1);
      //  alert(A2); 
      //  alert(A3); 
      // // var =$(this).name;
     
      //  alert(kondisi);
      $.ajax({
        url : "<?= base_url();?>index.php/entry/verifikasi_utama",
        method : "POST",
        data : {A1: A1,A2: A2,A3: A3,id:id,id_persyaratan:id_persyaratan,id_sekolah:id_sekolah,jumlah:jumlah,kondisi:kondisi},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                // var i;
                // for(i=0; i<data.length; i++){
                //     html += '<option value="'+data[i].id_paket+'">'+data[i].no_paket+'-'+data[i].kurikulum+'</option>';
                // }
                // $('.coba').html(html);
                var i;

                // for(i=0; i<data.length; i++){
                      // html += '<input type="text" placeholder="'+A1+' , '+A2+' dan '+A3+' ">';
                      html += '<input type="text" placeholder="hehe">';
                     // html += '<input type="text" placeholder="'+coba+' ">';
                // }
                $('.coba').html(html);
          // alert('hehe')
          
        }
      });
    });
  });

   
</script>
<script type="text/javascript">
  

  
 $(document).ready(function(){

  
    $(document.getElementsByClassName("ruangan_")).change(function()  {
      // var no=0;
      var id_sekolah=$(this).attr("title");
      var id=$(this).attr("id");
      var id_persyaratan=$(this).attr("alt");
      var A1=$("input[name='ruangan_"+id+"']:checked").val();
      var ket =document.getElementsByClassName("ket_ruangan_"+id)[0].value;
       // alert(A1); 
       // alert(id);
       // alert(id_persyaratan); 
       // alert(id_sekolah); 
       // alert(ket);
      // var =$(this).name;
      $.ajax({
        url : "<?= base_url();?>index.php/entry/verifikasi_ruangan",
        method : "POST",
        data : {A1: A1,id:id,id_persyaratan:id_persyaratan,id_sekolah:id_sekolah,ket:ket},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                // var i;
                // for(i=0; i<data.length; i++){
                //     html += '<option value="'+data[i].id_paket+'">'+data[i].no_paket+'-'+data[i].kurikulum+'</option>';
                // }
                // $('.coba').html(html);
                var i;

                // for(i=0; i<data.length; i++){
                      // html += '<input type="text" placeholder="'+A1+' , '+A2+' dan '+A3+' ">';
                      html += '<input type="text" placeholder="hehe">';
                     // html += '<input type="text" placeholder="'+coba+' ">';
                // }
                $('.coba').html(html);
          // alert('hehe')
          
        }
      });
   });
  });

   
</script>
<script type="text/javascript">
  

  
 $(document).ready(function(){

  
    $(document.getElementsByClassName("penguji_")).change(function()  {
      // var no=0;
      var id_sekolah=$(this).attr("title");
      var id=$(this).attr("id");
      var id_persyaratan=$(this).attr("alt");
      var A1=$("input[name='penguji_"+id+"']:checked").val();
      var ket =document.getElementsByClassName("ket_penguji_"+id)[0].value;
       // alert(A1); 
       // alert(id);
       // alert(id_persyaratan); 
       // alert(id_sekolah); 
       // alert(ket);
      // var =$(this).name;
      $.ajax({
        url : "<?= base_url();?>index.php/entry/verifikasi_penguji",
        method : "POST",
        data : {A1: A1,id:id,id_persyaratan:id_persyaratan,id_sekolah:id_sekolah,ket:ket},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                // var i;
                // for(i=0; i<data.length; i++){
                //     html += '<option value="'+data[i].id_paket+'">'+data[i].no_paket+'-'+data[i].kurikulum+'</option>';
                // }
                // $('.coba').html(html);
                var i;

                // for(i=0; i<data.length; i++){
                      // html += '<input type="text" placeholder="'+A1+' , '+A2+' dan '+A3+' ">';
                      html += '<input type="text" placeholder="hehe">';
                     // html += '<input type="text" placeholder="'+coba+' ">';
                // }
                $('.coba').html(html);
          // alert('hehe')
          
        }
      });
   });
  });

   
</script>
<script type="text/javascript">
  $(document).ready(function(){

     $(".sekolah").select2({
                  
                     placeholder: "-Pilih-Sekolah-"
                });

     // $("#jurusan").select2({
                  
     //                  // placeholder: "-PILIH-JURUSAN-"
     //            });           

    $('.sekolah').on("change", function(e) {
      
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url();?>index.php/entry/jurusan",
        method : "POST",
        data : {id: id},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                html += '<option value="0" id="">--Pilih Jurusan--</option>'
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].id_paket+'" id="'+data[i].id_sekolah+'">'+data[i].nama_jurusan+'</option>';
                }
                $('.jurusan').html(html);
          
        }
      });
    });


                

  });
</script>
    
  </body>
</html>