<!DOCTYPE html>
<html lang="en">
<!-- base start -->
<?php $this->load->view('templates/base'); ?>
<!-- base end -->
<?php 
    $day = array(
        '1' => 'Senin',
        '2' => 'Selasa',
        '3' => 'Rabu',
        '4' => 'Kamis',
        '5' => 'Jumat',
        '6' => 'Sabtu',
        '7' => 'Minggu',
    );
    
    $month = array(
        '01'=>'January',
        '02'=>'February',
        '03'=>'Maret',
        '04'=>'April',
        '05'=>'Mei',
        '06'=>'Juni',
        '07'=>'Juli',
        '08'=>'Agustus',
        '09'=>'September',
        '10'=>'Oktober',
        '11'=>'November',
        '12'=>'Desember',
    );
    

    $bulan = date('m');
    $bulan = $month[$bulan];    

    $tanggal = date('d ').$bulan.date(' Y');

    $hari = date('N');
    $hari = $day[$hari];


$tgl_absen = date("Y-m-d");

$bulan = date('m');
$bulan = $month[$bulan];

$tanggal = date('d ') . $bulan . date(' Y');

$hari = date('N');
$hari = $day[$hari];


$karyawan = $this->session->userdata('nama_pegawai');
$email = $this->session->userdata('email');
// $id = $this->session->userdata('id');
$id = $user['id'];

$getJam = date("H:i:s");


// cek apa udah absen atau belum
$check_absen_masuk = $this->db->query("SELECT jam_masuk FROM tbl_absensi 
                                    WHERE id_pegawai = '$id' 
                                    and tgl_absen = '$tgl_absen'
                                    and status_absen = 1")->num_rows();

$check_absen_keluar = $this->db->query("SELECT * FROM tbl_absensi 
                                    WHERE id_pegawai = '$id' 
                                    and tgl_absen = '$tgl_absen'
                                    and Jam_keluar != 0
                                    and status_absen = 1
                                   
                                   ")->num_rows();

?>

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
                  <a href="" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                  <span class="kt-subheader__breadcrumbs-separator"></span>
                  <a href="javascript:;" class="kt-subheader__breadcrumbs-link">
                    Presensi </a>
                </div>
              </div>
            </div>
          </div>
           <?= $this->session->flashdata('message'); ?>
          <div class="kt-container kt-grid__item kt-grid__item--fluid">
            <div class="kt-portlet kt-portlet--mobile">
              <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                  <i class="kt-font-brand flaticon2-paper"></i>
                  <h3 class="kt-portlet__head-title ml-3">
                    Presensi
                  </h3>
                   <h3 class="kt-portlet__head-title ml-5" >Waktu Datang: <?= $jamMasuk; ?></h3>
                   <h3 class="kt-portlet__head-title ml-3">Waktu Pulang: <?= $jamKeluar; ?></h3>
                </div>
                                                    <div id="jamabsen">
                                                        <input type="hidden" id="jamMasuk" value="<?= $jamMasuk; ?>">
                                                        <input type="hidden" id="getJam" value="<?= $getJam; ?>">
                                                        <input type="hidden" id="id" value="<?= $id; ?>">
                                                        <input type="hidden" id="jamKeluar" value="<?= $jamKeluar; ?>">
                                                        <input type="hidden" id="batas_jam_masuk" value="<?= $batas_jam_masuk;?>">
                                                        <input type="text" class="form-control" id="lat" value=""  name="lat" hidden="">
                                                        <input type="text" class="form-control" id="long" value="" name="long" hidden="">
                                                        
                                                    </div>

              </div>
              <div class="kt-portlet__body">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="TableKegiatan">
                  <thead>
                    <tr>
                      <th>Camera</th>
                      <th>Lokasi</th>
                      <th>Absen Masuk</th>
                      <th>Absen Keluar</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td><!-- <span class='badge badge-success'>hadir</span>  -->
                          Tanggal / Jam : <?= $hari, ' / ', $tanggal, ' / ', $getJam?> <p id="jam" class="ml-3"></p>
                          <div id="camera">
                           </div>
                            <div id="simpan" style="display:none">
                                <input type=button value="Remove" onClick="batal()">
                                <input type=button value="Save" onClick="simpan()" style="font-weight:bold;">
                            </div>
                        </td>
                        <td>

                           <iframe src="" id = "gmaps" width="200" height="200"></iframe>
                           <p>lokasi anda saat ini: <span id="city" ></span>, <span id="country"></span></p>
                        </td>
                        <td> 
                          <?php if ($getJam >= $jamMasuk && $getJam <= $batas_jam_masuk && $check_absen_masuk < 1) {; ?>
                          <button class="btn btn-dark" id="btn-absensi">Absen Masuk</button>                   
                          <?php } else {; ?>
                          <button class="btn btn-primary btn-sm " id="btn-absensi" disabled>Absen Masuk</button>
                          <?php }; ?>
                        </td>
                        <td>
                            <?php if ($getJam >= $jamKeluar && $check_absen_keluar < 1) {; ?>
                                  <button class="btn btn-dark btn-sm" id="btn-absensii">Absen keluar</button>
                                    <?php } else {; ?>
                                  <button class="btn btn-primary btn-sm" id="btn-absensi" disabled>Absen Keluar</button>
                                  <?php }; ?>
                        </td>
                        
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <script src="<?php echo config_item('assets'); ?>webcam.min.js" type="text/javascript"></script>
        <!-- <?php $this->load->view('templates/script'); ?> -->
        <!-- end:: script -->
        <script>
          $(document).ready(function() {
            $('#TableKegiatan').DataTable();
          });


          function myFunction() {
            window.open("<?= base_url('admin2/cetakk') ?>?tawal=<?= $tgl_awal; ?>&takhir=<?= $tgl_akhir; ?>&pegawai=<?= $pegawai; ?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=1070,left=1070,width=1070,height=1070");
          }
        </script>

            <script>
        $(document).ready(function() {

        });

        timer();
        function timer() {
            var currentTime = new Date()
            var hours = currentTime.getHours()
            var minutes = currentTime.getMinutes()
            var sec = currentTime.getSeconds()
            if (minutes < 10) {
                minutes = "0" + minutes
            }
            if (sec < 10) {
                sec = "0" + sec
            }
            var t_str = hours + ":" + minutes + ":" + sec + " ";
            document.getElementById('jam').innerHTML = t_str;
            setTimeout(timer, 1000);
        }

  </script>

   <script type="text/javascript">

        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach( '#camera' );

         $.getJSON('http://ip-api.com/json', function(data){
          $("#ip").text(data.query);
          $('#isp').text(data.isp);
          $('#country').text(data.country);
          $('#city').text(data.city);
          $("#gmaps").attr("src", "https://www.google.co.id/maps?q="+data.lat+","+data.lon+"&output=embed");
        })
      
        $('#btn-absensi').on('click', function(event) {
              event.preventDefault();
            let currentTime = new Date()
            let hours = currentTime.getHours()
            let minutes = currentTime.getMinutes()
            let absen = hours + ":" + minutes

            let nama = $('#namaKaryawan').val();
            let id = $('#id').val();
            let jamMasuk = $('#jamMasuk').val();
            let jamKeluar = $('#jamKeluar').val();
            let batas_jam_masuk = $('#batas_jam_masuk').val();
            let getjam = $('#getJam').val(); 
            let kota = $('#city').val();
            let indo = $('#country').val();

            // membuat variabel image
            let image = ''; 
            //memasukkan data gambar ke dalam variabel image
            Webcam.snap(function (data_uri) {
                image = data_uri;
            });  

            $.ajax({
                url: '<?php echo base_url('karyawan/save_absen'); ?>',
                type: 'POST',
                data: {
                    nama: nama,
                    id: id,
                    jamMasuk: jamMasuk,
                    jamKeluar: jamKeluar,
                    batas_jam_masuk: batas_jam_masuk,
                    absen: absen,
                    image : image,
                    getjam: getjam,
                    kota: kota,
                },
                success: function(html) {
                    document.write(html);
                    document.location.href = "<?= base_url('karyawan/absenku'); ?>";
                }
            })
        })

        $('#btn-absensii').on('click', function() {
             
            let currentTime = new Date()
            let hours = currentTime.getHours()
            let minutes = currentTime.getMinutes()
            let absen = hours + ":" + minutes

            let nama = $('#namaKaryawan').val();
            let id = $('#id').val();
            let jamMasuk = $('#jamMasuk').val();
            let jamKeluar = $('#jamKeluar').val();
            let batas_jam_masuk = $('#batas_jam_masuk').val();
            let getjam = $('#getJam').val();  
            // membuat variabel image

            $.ajax({
                url: '<?php echo base_url('karyawan/save_absen'); ?>',
                type: 'POST',
                data: {
                    nama: nama,
                    id: id,
                    jamMasuk: jamMasuk,
                    jamKeluar: jamKeluar,
                    batas_jam_masuk: batas_jam_masuk,
                    absen: absen,
                    getjam: getjam
                },
                success: function(html) {
                    document.write(html);
                    document.location.href = "<?= base_url('karyawan/absenku'); ?>";
                }
            })
        })
    </script>

 <script type="text/javascript">
       
    </script>  
</body>
</html>

   