<!DOCTYPE html>
<html lang="en">
<!-- base start -->
<?php $this->load->view('templates/base'); ?>
<!-- base end -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
  <!-- header start -->
  <?php $this->load->view('templates/header'); ?>
  <!-- header end -->
  <div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
      <!-- aside start -->
      <?php $this->load->view('templates/assidek'); ?>
      <!-- aside end -->
      <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
        <!-- begin:: Header -->
        <?php $this->load->view('templates/header2'); ?>
        <!-- end:: Header -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
          <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
              <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                  Dashboard </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                  <a href="{{url('/dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                  <span class="kt-subheader__breadcrumbs-separator"></span>
                  <a href="javascript:;" class="kt-subheader__breadcrumbs-link">
                    Presensi </a>
                </div>
              </div>
            </div>
          </div>

         <div class="kt-container kt-grid__item kt-grid__item--fluid">
          <div class="alert alert-success outline" role="alert">
          Data Presensi Hari ini, Inputkan Tanggal Untuk Melihat Absen Perbulan / Keseluruhan</div>
            <form action="<?= base_url('karyawan/rekap'); ?>" method="POST" autocomplete="off">
              <div class="row">
                <div class="col-md-3">
                  <input type="date" name="awal" class="form-control col-sm ml-1" value="<?=$tawal?>">
                </div>
                <label style="padding-top: 0.6rem"><b>s/d</b></label>
                <div class="col-md-3">
                  <input type="date" name="akhir" class="form-control  col-sm" value="<?=$takhir?>">
                </div>

                <div class="col-md-4">
                 <input type="text" name="karyawan" hidden="" value="<?=ucwords($user['id']);?>">
                </div>
                <div class="col-md- mb-4">
                  <input type="submit" name="submit" value="Cari" class="btn btn-primary btn-sm" style="padding-right: 2rem; padding-left: 2rem;">
                 <!--  <a onclick="myFunction()" class="btn btn-outline-brand btn-sm">
                        <i class="la la-print"></i>
                        Print
                      </a> -->
                </div>
              </div>
            </form>
          </div>
          <div class="kt-container kt-grid__item kt-grid__item--fluid">
            <div class="kt-portlet kt-portlet--mobile">
              <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                  <i class="kt-font-brand flaticon2-paper"></i>
                  <h3 class="kt-portlet__head-title ml-3">
                    Rekap Presensi
                  </h3>
                </div>
              <!-- <input type="text" name="latitude" id="latitude" >
                      <input type="text" name="longitude" id="longitude" > -->
              </div>
              <div class="kt-portlet__body">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="TableKegiatan">
                  <thead>
                    <tr> 
                      <th>Nama Pegawai</th>
                      <th>Tanggal Absen</th>
                      <th>Absen Masuk</th>
                      <th>Absen Keluar</th>
                      <th>Foto</th>
                      <th>Status</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $jumlah=0;
                     foreach ($absen as $d) :; 
                      $status = $d->jam_masuk;
                      $jumlah = $jumlah + $d->status_absen;
                      ?>
                      <tr>
                        <td><?= $d->nama_pegawai; ?></td>
                        <td><?= $d->tgl_absen; ?></td>
                        <td><?= $d->jam_masuk; ?></td>
                        <td><?= $d->jam_keluar; ?></td>
                        <td style="vertical-align: middle;"><img style="width: 90px;"id="myImg" src="<?= base_url().'assets/img/'.$d->image;?>" onclick="modal_image('<?= base_url().'assets/img/'.$d->image;?>');" alt="No Image" width="50px" height="70px">
                          <br>Lokasi: <?= $d->lokasi; ?><br>
                              Jam: <?= $d->jam_masuk; ?>
                        </td>
                        <?php if ($status >= $batas_jam_masuk ){ ?>
                        <td><span class='badge badge-danger'>Terlambat</span> 
                          <?php }else{?>
                        <td><span class='badge badge-success'>hadir</span> 
                        <?php

                         } ?>
                      </tr>
                    <?php endforeach; ?>
                    <tr>
                      <th colspan="2">Total Kehadiran: <?= $jumlah; ?></th>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>


        <!-- <?php $this->load->view('templates/script'); ?> -->
        <!-- end:: script -->
        <script>
          $(document).ready(function() {
            $('#TableKegiatan').DataTable();
          });

          function myFunction() {
            window.open("<?= base_url('karyawan/cetakk') ?>?tawal=<?= $tgl_awal; ?>&takhir=<?= $tgl_akhir; ?>&pegawai=<?= $user['id']; ?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=1070,left=1070,width=1070,height=1070");
          }
        </script>

        <div id="myModal" class="modal modal-img " role="dialog"  style="width: 500px; margin-left: 300px;">
         <!-- The Close Button -->
         <span class="close cursor" onclick="closeModal()">&times;</span>
         <!-- Modal Content (The Image) -->
         <img class="modal-content modal-content-img" id="img-artikel">
     </div>
     <script>
         // Get the modal
         var modal = document.getElementById("myModal");
         var img = document.getElementById("myImg");
         var modalImg = document.getElementById("img-artikel");
         var captionText = document.getElementById("caption");
         function modal_image(image_url) {
             modal.style.display = "block";
             document.getElementById('img-artikel').setAttribute('src', image_url);
             captionText.innerHTML = this.alt;
         }
         // Close the modal
         function closeModal() {
             document.getElementById("myModal").style.display = "none";
         }


    /*  var x = document.getElementById("latitude");
      var y = document.getElementById("longitude");

      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }

      function showPosition(position) {
        $('#latitude').val(position.coords.latitude);
        $('#longitude').val(position.coords.longitude);
      }*/


       let maps_absen = "searching...";
            if (document.getElementById("maps-absen")) {
                window.onload = function() {
                    var popup = L.popup();
                    var geolocationMap = L.map("maps-absen", {
                        center: [40.731701, -73.993411],
                        zoom: 15,
                    });

                    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                    }).addTo(geolocationMap);

                    function geolocationErrorOccurred(geolocationSupported, popup, latLng) {
                        popup.setLatLng(latLng);
                        popup.setContent(
                            geolocationSupported ?
                            "<b>Error:</b> The Geolocation service failed." :
                            "<b>Error:</b> This browser doesn't support geolocation."
                        );
                        popup.openOn(geolocationMap);
                    }

                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            function(position) {
                                var latLng = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude,
                                };

                                var marker = L.marker(latLng).addTo(geolocationMap);
                                maps_absen = position.coords.latitude + ", " + position.coords.longitude;
                                geolocationMap.setView(latLng);
                            },
                            function() {
                                geolocationErrorOccurred(true, popup, geolocationMap.getCenter());
                                maps_absen = 'No Location';
                            }
                        );
                    } else {
                        //No browser support geolocation service
                        geolocationErrorOccurred(false, popup, geolocationMap.getCenter());
                        maps_absen = 'No Location';
                    }
                };
            }
     </script>
</body>

</html>