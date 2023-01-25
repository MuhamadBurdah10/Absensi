

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
      <?php $this->load->view('templates/asside'); ?>
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
                    Admin </a>
                </div>
              </div>
            </div>
          </div>
          <div class="kt-container kt-grid__item kt-grid__item--fluid">
            <div class="kt-portlet kt-portlet--mobile">
              <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                  <i class="kt-font-brand flaticon2-paper"></i>
                  <h3 class="kt-portlet__head-title ml-3">
                    Selamat Datang
                  </h3>
                </div>
                </div>
              </div>
              <div class="kt-portlet__body">

                <div class="row">

            <div class="col-xl-3 col-md-6 mt-3 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Karyawan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah?></div>
                            </div>
                            <div class="col-auto">
                          <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
             </div>


            <div class="col-xl-3 col-md-6 mt-3 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Kegiatan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$kegiatan?></div>
                    </div>
                    <div class="col-auto">
                     <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mt-3 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Kegiatan Sedang Berjalan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$show?></div>
                    </div>
                    <div class="col-auto">
                     <i class="fas fa-spinner fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        <div class="col-xl-3 col-md-6 mt-3 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Kegiatan Selesai</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $hide?> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-clipboard-check fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

              </div>
            </div>
          </div>
        </div>

        <!-- begin:: Footer -->
        <!-- <?php $this->load->view('templates/footer'); ?> -->
        <!-- end:: Footer -->
      </div>
    </div>
  </div>
  <div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
  </div>
  <!-- begin:: script -->
  <!-- <?php $this->load->view('templates/script'); ?> -->
  <!-- end:: script -->
  <script>
    $(document).ready(function() {
      $('#TableKegiatan').DataTable();
    });
  </script>
</body>

</html>

<!-- <div class="container-fluid">
    <div class="my-4 d-sm-flex align-items-center justify-content-between">
        <h1>Dashboard</h1>
        <div class="btn btn-primary" id="sync-data-dashboard"><span class="fas fa-sync-alt mr-1"></span>Refresh Data</div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h4><span class="fas fa-user-tie mr-2"></span>Jumlah Pegawai</h4>
                    <h6 class="mt-3"><?= $jmlpegawai ?><div class="d-inline ml-1">Pegawai</div>
                    </h6>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= base_url('datapegawai'); ?>">Lihat Selengkapnya</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <h4><span class="fas fa-user-clock mr-2"></span>Terlambat</h4>
                    <h6 class="mt-3"><?= $pegawaitelat ?><div class="d-inline ml-1">Pegawai
                        </div>
                    </h6>
                </div>
                <div class="card-footer small">
                    <div class="text-white">Data Hari Ini</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h4><span class="fas fa-user-check mr-2"></span>Hadir</h4>
                    <h6 class="mt-3"><?= $pegawaimasuk ?><div class="d-inline ml-1">Pegawai</div>
                    </h6>
                </div>
                <div class="card-footer small">
                    <div class="text-white">Data Hari Ini</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body">
                    <h4><span class="fas fa-clock mr-2"></span>Hari Ini</h4>
                    <div id="date-and-clock mt-3">
                        <h5 id="clocknow"></h5>
                        <h5 id="datenow"></h5>
                    </div>
                    </h6>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= base_url(''); ?>">Lihat Selengkapnya</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header"><span class="fas fa-user-clock mr-1"></span>Daftar Pegawai Terlambat [Hari Ini]
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dashboard" id="list-absensi-terlambat" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jam Masuk</th>
                                    <th>Nama Pegawai</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Jam Masuk</th>
                                    <th>Nama Pegawai</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header"><span class="fas fa-user-check mr-1"></span>Daftar Pegawai Hadir [Hari Ini]
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dashboard" id="list-absensi-masuk" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu Datang</th>
                                    <th>Nama Pegawai</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu Datang</th>
                                    <th>Nama Pegawai</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->