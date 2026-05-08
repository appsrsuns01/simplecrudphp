<?php
  require './config/koneksi.php';

  $sql = "SELECT a.*, b.title AS nama_unit, b.kode_unit
          FROM mst_user a
          JOIN mst_unit b ON b.id=a.id_unit
          WHERE a.deleted_at IS NULL 
          ORDER BY a.id_user;";

  $query = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi Simple PHP Native">
    <meta name="author" content="Unknown">

    <!-- <meta http-equiv="refresh" content="120;"> -->

    <title>Simple PHP Native</title>

    <!-- ICON -->
    <link rel="icon" type="image/png" href="./public/images/small-logo-2.png">

    <!-- Custom fonts for this template -->
    <link href="./vendors/fontawesome_5.15.3/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- SB-Admin CSS -->
    <link rel="stylesheet" href="./vendors/sb-admin-2_4.1.4/css/sb-admin-2.min.css">

    <!-- Data tables -->
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.2.2/b-3.2.2/b-html5-3.2.2/b-print-3.2.2/fh-4.0.1/r-3.0.4/datatables.min.css" rel="stylesheet" integrity="sha384-CndcuZnHili71sd5NFGupBFR4qspL6vCrVMw2gjOubNvfX1sYwAEb2kuCxwOzIL/" crossorigin="anonymous">

    <!-- ANIMASI LOADING STYLES -->
    <link rel="stylesheet" href="./public/assets/css/loading-animation.css">
    
    <!-- Custom styles for this page -->
    <!-- BIMON UTILITIES utk kustomisasi bbrp komponen -->
    <link rel="stylesheet" href="./public/assets/css/components-custom.css">
    <link rel="stylesheet" href="./public/assets/css/custom.css">

    <!-- KHUSUS JS SB-ADMIN DITARUH DI HEADER, KRN KALO DITARUH DI BAWAH, menimbulkan ERROR :
    `sb admin collapse is not function` -->

    <!-- JQUERY 3.7.1 -->
    <!-- <script src="./public/assets/js/jquery.min.js"></script> -->
    <!-- <script src="./vendors/jquery_3.7.1/jquery-3.7.1.slim.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- SB-Admin JS -->
    <script src="./vendors/sb-admin-2_4.1.4/js/sb-admin-2.min.js"></script>

  </head>

  <body id="page-top">

    <?php include "./components/loading-animation.php"; ?>

    <!-- Page Wrapper -->
    <div id="wrapper">


      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <div class="container-title">
              <div class="title-text">
                <center><h2 class="text-uppercase">Daftar Unit RS UNS</h2></center>
              </div>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <!-- <div class="card-header py-3">
                <center><h6 class="m-0 font-weight-bold text-primary">Daftar Pasien IGD</h6></center>
              </div> -->

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0" id="user-data-tables">
                    <thead class="bg-dark text-white">
                      <tr id="rowHeader">
                        <th class="text-center">No</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Nama Unit</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Level User</th>

                      </tr>
                    </thead>
                    
                    <tbody>
                      <?php 
                        $no =1 ;
                        if (mysqli_num_rows($query)) {
                          while($row=mysqli_fetch_assoc($query)):
                      ?>
                            <tr>
                              <td> <?= $no; ?> </td>
                              <td> <?= $row['username']; ?> </td>
                              <td> <?= $row['nama_unit']; ?> </td>
                              <td> <?= $row['deskripsi']; ?> </td>
                              <td> <?= $row['level']; ?> </td>
                              
                            </tr>
                      <?php 
                            $no++; 
                          endwhile; 
                        } 
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>


          </div>
          <!-- /.container-fluid -->

            

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; RS UNS 2016 - <?php echo date("Y"); ?></span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>



    <!-- Pesan SUKSES -->
    <div class='modal fade' id='successModalMsg' tabindex='-1' role='dialog' aria-labelledby='successModalLabel' aria-hidden='true'>
      <div class='modal-dialog modal-lg'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class="modal-title" id="successModalLabel" style="color:green;">Sukses !</h5>
            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          </div>
          <div class='modal-body' id='successModalBody'>
            <h3>Penghentian Waktu layanan berhasil dilakukan</h3>
          </div>
          <div class='modal-footer' id='successModalFoot'>
            <button type="button" class="btn btn-success" data-dismiss="modal" style="float:right">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end of Pesan SUKSES -->

    <!-- Pesan GAGAL -->
    <div class='modal fade' id='failModalMsg' tabindex='-1' role='dialog' aria-labelledby='failModalLabel' aria-hidden='true'>
      <div class='modal-dialog modal-lg'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id="failModalLabel" style='color:red;'><b>Gagal !</b></h5>
            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          </div>
          <!-- <div class='modal-body' id='body'> -->
          <div class='modal-body' id='failModalBody'>
            <!-- <h3>Data Gagal Disimpan</h3> -->
          </div>
          <div class='modal-footer' id='failModalFoot'>
            <button type="button" class="btn btn-danger" data-dismiss="modal" style="float:right">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end of Pesan GAGAL -->

    
    <!-- JavaScript -->


    <!-- RequireJS 2.3.7 -->
    <!-- <script src="./vendors/requirejs_2.3.7/r.js"></script> -->
    <!-- <script src="https://requirejs.org/docs/release/2.3.7/minified/require.js"></script> -->
    

    <!-- JQUERY Easing -->
    <!-- <script src="./vendors/jquery-easing_1.4.1/jquery.easing.min.js"></script> -->

    
    <!-- Bootstrap 4.6.0 -->
    <!-- <script src="./vendors/bootstrap_4.6.0/js/bootstrap.bundle.min.js"></script> -->


    <!-- Data Tables using Builder include some extensions -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha384-VFQrHzqBh5qiJIU0uGU5CIW3+OWpdGGJM9LBnGbuIH2mkICcFZ7lPd/AAtI7SNf7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" integrity="sha384-/RlQG9uf0M2vcTw3CX7fbqgbj/h8wKxw7C3zu9/GxcBPRKOEcESxaxufwRXqzq6n" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.2.2/b-3.2.2/b-html5-3.2.2/b-print-3.2.2/fh-4.0.1/r-3.0.4/datatables.min.js" integrity="sha384-IxKpPZbwyiR71Qm3p0gqSlpJYKPCpH3lDkYbwW7fFdx1haOOGmhlEtbDuGXy2m0y" crossorigin="anonymous"></script>


    <!-- Data Tables JS -->
    <!-- <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script> -->
    
    <!-- luxon -->
    <script src="https://cdn.jsdelivr.net/npm/luxon@3.5.0/build/global/luxon.min.js"></script>
    <!-- <script src="./vendors/luxon_3.4.4/luxon.min.js"></script> -->



    <!-- Custom Javascript -->
    <script>
      let devicesList = [];
      let dpjpList = [];
      let attLogs = [];

      let dataTable = null;

      const DateTime = luxon.DateTime;
      const dateStart = DateTime.now().toFormat("yyyy-MM-dd");
      const dateEnd = DateTime.now().toFormat("yyyy-MM-dd");

      

      const customData = [];

      
      $(document).ready(function() {
        
        getAllDevices();

        // dataTable = $('#data-tables').dataTable({
        dataTable = new DataTable('#data-tables', {
          "language": {
            // "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
            // "sEmptyTable": "Data tidak ditemukan"
            "url": "https://cdn.datatables.net/plug-ins/2.0.8/i18n/id.json",
            // "url": "../assets/id.json",
          },
          "fixedHeader": true,
          dom: '<"dt-top-container"<l><"dt-center-in-div"<"#tb-top-caption">>',
          dom: '<"dt-top-container"<l><"dt-center-in-div"<"#tb-top-caption">><f>r>t<"dt-filter-spacer"><ip>',


          'paging':   true,
          'ordering': true,
          'info':     true,      
          'autoWidth': true, 
          "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
          // "lengthMenu": [[-1, 10, 50, 100], ["All", 10, 50, 100]],
          'order': [[ 2, 'desc' ]],

          "columnDefs": [
            // { select: 2, type: "date", format: "MMM-DD-YYYY" },    // NOT WORKING
            // {"type": "num-fmt", "targets": [0]},
            // {"type": "date-fmt", "targets": [1]},    // tidak perlu, krn yg disort = value yg dihidden
            {"className": "dt-body-center", "targets": [1,2,3]},
          ],

          // 'data' : ['Dokter Abdul', 'IN', '2025-02-10 07:30:00', 'NS Poli Lantai 1'],

          "rowCallback": function( row, data, index ) {
            // const $node = this.api().row(row).nodes().to$();
            // if ( index % 2==0 ) {
            //   $node.addClass('pink')
            // } 

            if ( index % 2==0 ) {
              // $(row).find('td:eq(2)').css('color', 'red');
              //Highlight the row
              // $(row).addClass("evenColor");
              $(row).addClass("even");

              // $('td', row).css('background-color', '#ddebf6')
            }else{
              $(row).removeClass("even");
            }
          },

          "initComplete": function(settings, json) {
            // console.log('initComplete');
            // console.log('settings : ', settings);
            // console.log('json : ', json);

            // console.log('customData : ', customData);

            // redrawTable();

            // const htmlContent = '<div>Hello, World!</div>';
            // const elParent = document.getElementById('tb-top-caption');
            // elParent.insertAdjacentHTML('beforeend', htmlContent);

            document.getElementById('tb-top-caption').innerHTML = `<h4 class="m-0 font-weight-bold text-secondary">${DateTime.now().toFormat("dd MMM yyyy")}</h4>`;
          },


        });

        

        


        // setTimeout should only run once
        // setTimeout(greeting, 5000); // Executes the greeting function after 5 second
        
        setInterval(()=>{
          // console.log('Hello world now is ', DateTime.now().toFormat("yyyy-MM-dd"));
          // const date_start = DateTime.now().toFormat("yyyy-MM-dd HH:mm:ss");
          // const date_end = DateTime.now().toFormat("yyyy-MM-dd HH:mm:ss");
          // console.log('date_start : ', date_start);
          // console.log('date_end : ', date_end);

          const date_start = DateTime.now().toFormat("yyyy-MM-dd");
          const date_end = DateTime.now().toFormat("yyyy-MM-dd");

          getAttLogs({date_start, date_end});


        }, 5 * 60 * 1000);    // reload page setiap 5 menit
        
        
        

        
      });

      // function testDate({date_start=dateStart, date_end=dateEnd}={}){ 
      //   console.log('date_start : ', date_start);
      //   console.log('date_end : ', date_end);
      // }

      function reAuth(){

        // console.log('reAuth is RUNNING !!!');


        
        return $.ajax({
          type: "POST",
          url : `<?= APP_URL ?>/api/auth-login.php`,
          dataType: "json",
          // success: function(response, status) {

          //   const { status_code, data, error_msg } = response;

          //   if(parseInt(status_code)===1){
          //     console.log('data : ', data);
          //   }else{
          //     console.log('error : ', error_msg);
          //   }

            
          // },
          // error: function(response){
          //   console.log('response reAuth : ', response);

          //   if(response.responseJSON){
          //     const { error_msg } = response.responseJSON;
          //     console.log('Error : ', error_msg);
          //     alert(`Error : ${error_msg}`);
          //   }else{
          //     console.log('Undefined System Error !!! reAuth\'s call')
          //     alert('Undefined System Error !!! reAuth\'s call')
          //   }

            
          // }

        });



      }

      // ================================== get all devices ==================================
      function requestToGetAllDevices(){
        // $('#loading-animation').removeClass("invisible");


        return $.ajax({
          type: "GET",
          url : `<?php echo APP_URL ?>/api/devices/get-all-devices.php`,
          dataType: "json",
          // success: function(response, status) {
          //   $('#loading-animation').addClass("invisible");

          //   // console.log('response : ', response);
            
          //   const { status_code, data, error_msg } = response;

          //   if(parseInt(status_code)===1){
          //     console.log('data : ', data);
          //   }else{
          //     console.log('error : ', error_msg);
          //   }

            
          // },
          // error: function(response){
          //   $('#loading-animation').addClass("invisible");

          //   // console.log('response : ', response);

          //   if(response.responseJSON){
          //     const { status_code, error_msg } = response.responseJSON;
          //     // alert(error);
          //     // console.log("Error : ", error_msg);
          //     alert("Error : "+error_msg);
          //   }else{
          //     alert('Undefined System Error !!!')
          //   }
          // }
        });


      }

      function getAllDevices() {
        // ===============================
        $('#loading-animation').removeClass("invisible");

        // requestToGetAllDpjp's call
        requestToGetAllDevices()
          .done(function(response) {
            $('#loading-animation').addClass("invisible");

            const { status_code, data, error_msg } = response;

            if(parseInt(status_code)===1){
              // console.log('data from requestToGetAllDevices : ', data);
              devicesList = data;

              getAllDpjp();

            }else{
              console.log('error from requestToGetAllDevices (request done successfully) : ', error_msg);
              alert('error from requestToGetAllDevices (request done successfully) : '+error_msg);
            }
          })
          .fail(function(jqXHR) {

            // console.log('errorMsg getAllDevices : ', jqXHR);

            const errorMsg = jqXHR.responseJSON.error_msg;
            // console.log('errorMsg : ', errorMsg);

            // Status 401: Unauthorized, need to re-authenticate 
            // status 403 : Unauthorized, already auth but probably doesn't have authorization to access the resource

            if ((jqXHR.status === 403) && (errorMsg == 'Session is not valid' || errorMsg == 'Invalid credentials.' || errorMsg == 'Not Authorized to access this resource')) { 

              // reAuth's Call
              reAuth()
                .done(function(response) {
                  
                  requestToGetAllDevices()
                    .done(function(response) {
                      $('#loading-animation').addClass("invisible");

                      const { status_code, data, error_msg } = response;

                      if(parseInt(status_code)===1){
                        devicesList = data;
                        getAllDpjp();

                      }else{
                        console.log('error from requestToGetAllDevices (request done successfully) : ', error_msg);
                        alert('error from requestToGetAllDevices (request done successfully) : '+error_msg);
                      }

                    })
                    .fail(function(error) {
                      $('#loading-animation').addClass("invisible");

                      console.error('error from requestToGetAllDevices : ', error);
                      alert('error from requestToGetAllDevices after of re-authentication : '+error);
                    });

                })
                .fail(function(error) {
                  $('#loading-animation').addClass("invisible");

                  console.error('Failed to re-authenticate from requestToGetAllDevices: ', error);
                  alert('Failed to re-authenticate from requestToGetAllDevices: '+error);
                });
              // end of reAuth's Call


            } else {
              $('#loading-animation').addClass("invisible");
              console.error('Failed to Call requestToGetAllDevices with unspecified error : ', jqXHR);
              alert('Failed to Call requestToGetAllDevices with unspecified error : '+error);

            }

          });
        // end of requestToGetAllDevices's call
        // ===============================


        // // LOAD JSON FILE
        // fetch('./unused/mstdpjp.json')
        //   .then(response => response.json()) // Parse JSON
        //   .then(resonseData => {
        //     dpjpList = resonseData.data
        //     console.log('dpjpList: ', dpjpList);
        //   }) // Work with JSON data
        //   .catch(error => console.error('Error fetching JSON:', error));

      }
      // ================================== end of get all devices ==================================

      

      // ================================== get all dpjp ==================================
      function requestToGetAllDpjp(){

        return $.ajax({
          type: "GET",
          url : `<?php echo APP_URL ?>/api/users/get-all-dpjp.php`,
          dataType: "json",
        });


      }

      function getAllDpjp() {
        // ===============================
        $('#loading-animation').removeClass("invisible");

        // requestToGetAllDpjp's call
        requestToGetAllDpjp()
          .done(function(response) {
            $('#loading-animation').addClass("invisible");

            const { status_code, data, error_msg } = response;

            if(parseInt(status_code)===1){
              dpjpList = data;
              // console.log('dpjpList : ', dpjpList);
              getAttLogs();

            }else{
              console.log('error from requestToGetAllDpjp (request done successfully) : ', error_msg);
              alert('error from requestToGetAllDpjp (request done successfully) : '+error_msg);
            }
          })
          .fail(function(jqXHR) {

            // console.log('Error Request Status jqXHR : ', jqXHR);

            const errorMsg = jqXHR.responseJSON.error_msg;

            // Status 401: Unauthorized, need to re-authenticate 
            // status 403 : Unauthorized, already auth but probably doesn't have authorization to access the resource

            if ((jqXHR.status === 403) && (errorMsg == 'Session is not valid' || errorMsg == 'Invalid credentials.' || errorMsg == 'Not Authorized to access this resource')) { 

              // reAuth's Call
              reAuth()
                .done(function(response) {
                  
                  requestToGetAllDpjp()
                    .done(function(response) {
                      $('#loading-animation').addClass("invisible");

                      const { status_code, data, error_msg } = response;

                      if(parseInt(status_code)===1){
                        dpjpList = data;
                        getAttLogs();

                      }else{
                        console.log('error from requestToGetAllDpjp (request done successfully) : ', error_msg);
                        alert('error from requestToGetAllDpjp (request done successfully) : '+error_msg);
                      }

                    })
                    .fail(function(error) {
                      $('#loading-animation').addClass("invisible");

                      console.error('error from requestToGetAllDpjp : ', error);
                      // alert('error from requestToGetAllDpjp : '+error);
                    });

                })
                .fail(function(error) {
                  console.error('Failed to re-authenticate from requestToGetAllDpjp: ', error);
                  alert('Failed to re-authenticate from requestToGetAllDpjp: '+error);
                });
              // end of reAuth's Call


            } else {
              $('#loading-animation').addClass("invisible");

              console.error('Failed to Call requestToGetAllDpjp with unspecified error : ', jqXHR);
              alert('Failed to Call requestToGetAllDpjp with unspecified error : '+error);

            }


          });
        // end of requestToGetAllDpjp's call
        // ===============================


        // // LOAD JSON FILE
        // fetch('./unused/mstdpjp.json')
        //   .then(response => response.json()) // Parse JSON
        //   .then(resonseData => {
        //     dpjpList = resonseData.data
        //     console.log('dpjpList: ', dpjpList);
        //   }) // Work with JSON data
        //   .catch(error => console.error('Error fetching JSON:', error));

      }
      // ================================== end of get all dpjp ==================================


      // ================================== get all attLogs from all Devices ==================================
      function requestToGetAttLogs(dateFilter){
        // console.log(`dateStart ${dateFilter.date_start}`);
        // console.log(`dateEnd ${dateFilter.date_end}`);
        
        return $.ajax({
          type: "GET",
          url : `<?php echo APP_URL ?>/api/attlogs/get-attlogs-filter-date.php`,
          dataType: "json",
          data: { 
            // "date_start": dateStart, 
            // "date_end": dateEnd, 
            "date_start": dateFilter.date_start, 
            "date_end": dateFilter.date_end, 
          },
          // success: function(response, status) {

          //   // console.log('response : ', response);
            
          //   const { status_code, data, error_msg } = response;

          //   if(parseInt(status_code)===1){
          //     console.log('data : ', data);
          //   }else{
          //     console.log('error : ', error_msg);
          //   }

            
          // },
          // error: function(response){

          //   console.log('response : ', response);

          //   if(response.responseJSON){
          //     const { status_code, error_msg } = response.responseJSON;
          //     // alert(error);
          //     // console.log("Error : ", error_msg);
          //     alert("Error : "+error_msg);
          //   }else{
          //     alert('Undefined System Error !!!')
          //   }
          // }
        });
      }

      // function getAttLogs(dateFilter={date_start:dateStart, date_end:dateEnd}){   // ES6 default parameter value
      //   console.log(`date start : ${dateFilter.date_start}, date end : ${dateFilter.date_end}`);
      function getAttLogs({date_start=dateStart, date_end=dateEnd}={}){  // ES6 default parameter value - lbh elegan
        // console.log(`date start : ${date_start}, date end : ${date_end}`);
        const dateFilter = {date_start, date_end};


        $('#loading-animation').removeClass("invisible");

        // requestToGetAttLogs's call
        requestToGetAttLogs(dateFilter)
          .done(function(response) {
            $('#loading-animation').addClass("invisible");

            const { status_code, data, error_msg } = response;

            if(parseInt(status_code)===1){
              // console.log('data from requestToGetAttLogs : ', data);
              attLogs = data.att_logs;
              syncData();

            }else{
              console.log('error from requestToGetAttLogs (request done successfully) : ', error_msg);
              alert('error from requestToGetAttLogs (request done successfully) : '+error_msg);
            }
          })
          .fail(function(jqXHR) {

            // console.log('fail get Attlogs, jqXHR : ', jqXHR);

            const errorMsg = jqXHR.responseJSON.error_msg;

            // Status 401: Unauthorized, need to re-authenticate 
            // status 403 : Unauthorized, already auth but probably doesn't have authorization to access the resource

            if ((jqXHR.status === 403) && (errorMsg == 'Session is not valid' || errorMsg == 'Invalid credentials.' || errorMsg == 'Not Authorized to access this resource')) { 

              // reAuth's Call
              reAuth()
                .done(function(response) {
                  
                  requestToGetAttLogs(dateFilter)
                    .done(function(response) {
                      $('#loading-animation').addClass("invisible");

                      const { status_code, data, error_msg } = response;

                      if(parseInt(status_code)===1){
                        // console.log('data from requestToGetAttLogs : ', data);
                        attLogs = data.att_logs;
                        syncData();

                      }else{
                        console.log('error from requestToGetAttLogs (request done successfully) : ', error_msg);
                        alert('error from requestToGetAttLogs (request done successfully) : '+error_msg);
                      }

                    })
                    .fail(function(error) {
                      $('#loading-animation').addClass("invisible");

                      console.error('error from requestToGetAttLogs : ', error);
                      // alert('error from requestToGetAttLogs : '+error);
                    });

                })
                .fail(function(error) {
                  $('#loading-animation').addClass("invisible");

                  console.error('Failed to re-authenticate from requestToGetAttLogs: ', error);
                  alert('Failed to re-authenticate from requestToGetAttLogs: '+error);
                });
              // end of reAuth's Call


            } else {
              $('#loading-animation').addClass("invisible");

              console.error('Failed to Call requestToGetAttLogs with unspecified error : ', jqXHR);
              alert('Failed to Call requestToGetAttLogs with unspecified error : '+error);

            }

          });
        // end of requestToGetAttLogs's call
          
        // // LOAD JSON FILE
        // fetch('./unused/datattlogs.json')
        //   .then(response => response.json()) // Parse JSON
        //   .then(resonseData => {
        //     attLogs = resonseData.data.att_logs;
        //     console.log('attLogs: ', attLogs);
            
        //   }) // Work with JSON data
        //   .catch(error => console.error('Error fetching JSON:', error));

        
      }
      // ================================== end of get all attLogs from all Devices ==================================
      

      function logout(){


        return $.ajax({
          type: "POST",
          url : `<?= APP_URL ?>/api/auth-logout.php`,
          dataType: "json",
          success: function(response, status) {

            const { status_code, data, error_msg } = response;

            if(parseInt(status_code)===1){
              console.log('data : ', data);
            }else{
              console.log('error : ', error_msg);
            }

            
          },
          error: function(response){
            console.log('response logout : ', response);

            if(response.responseJSON){
              const { error } = response.responseJSON;
              alert(error);
            }else{
              alert('Undefined System Error !!! logout\'s call')
            }

            return null;
            
          }
        });



      }

      function syncData(){

        if(devicesList.length === 0){
          alert('Data Devices is empty !!!');
          return null;
        }
        if(dpjpList.length === 0){
          alert('Data DPJP is empty !!!');
          return null;
        }
        if(attLogs.length === 0){
          alert('Data Att Logs is empty !!!');
          return null;
        }


        // Do Empty the customData array
        customData.splice(0, customData.length);

        const attLogsDevices = attLogs.map( (item, index) => {
          const { device_id } = item;

          const device_location = devicesList.filter( (item, index) => {
            return parseInt(item.id) === parseInt(device_id);
          })[0].location;

          
          return {device_location, ...item};
          
        });



        const attLogsDevicesDpjp = attLogsDevices.map( (item, index) => {
          const { presensi_pegawai_id } = item;

          const dpjp_name = dpjpList.filter( (item, index) => {
            return parseInt(item.presensi_pegawai_id) === parseInt(presensi_pegawai_id);
          })[0].name;
          
          return {dpjp_name, ...item};
          
        });


        attLogsDevicesDpjp.forEach( (item, index) => {
          customData.push([item.dpjp_name, item.check_type, item.check_time, item.device_location]);
        });


        redrawTable();


      }

      function redrawTable() {
        // console.log('redrawTable is RUNNING !!!');
        dataTable.clear().draw();
        customData.forEach( (item, index) => {
          dataTable.row.add(item).draw();
        });
      }

    </script>

    <script>
      // const waktuStopnya = moment('2022-03-07 14:24:03').format('YYYY-MM-DD HH:mm:ss');

      // const diffTime = hitungSelisihIgdStopTime('000953090002', waktuStopnya);

      // console.log('Jumlah menit : ', diffTime);
    </script>
    <!-- End of Custom Javascript -->


    

  </body>

</html>