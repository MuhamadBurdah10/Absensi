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
                    Presensi </a>
                </div>
              </div>
            </div>
          </div>

        
                 <div class="kt-container kt-grid__item kt-grid__item--fluid">
                  <form action="<?= base_url('admin2/detail_absen'); ?>" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-md-3">
                      <input type="date" name="awal" class="form-control col-sm ml-1" value="<?= $tgl_awal ?>">
                        </div>
                        <label style="padding-top: 0.6rem"><b>s/d</b></label>
                        <div class="col-md-3">
                          <input type="date" name="akhir" class="form-control  col-sm" value="<?= $tgl_akhir ?>">
                        </div>

                      <div class="col-md-4">
                        <select name="pegawai" class="form-control  col-sm-4">
                          <option value="">-- Pilih Pegawai --</option>
                          <?php
                        $tes = $this->db->get('tbl_pegawai')->result();

                        foreach ($tes as $die) { ?>
                          
                          <option value="<?php echo $die->id; ?>"><?php echo $die->nama_pegawai; ?></option>
                        <?php
                        }

                        ?>
                        </select>
                      </div>
                      <div class="col-md-">
                        <input type="submit" name="submit" value="Cari" class="btn btn-primary btn-sm" style="padding-right: 2rem; padding-left: 2rem;">
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
                    Detail Presensi
                  </h3>  
                </div>
                
                <div class="kt-portlet__head-toolbar">
                  <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                      <a onclick="myFunction()" class="btn btn-outline-brand btn-sm">
                        <i class="la la-print"></i>
                        Print
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="kt-portlet__body">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="TableKegiatan">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Pegawai</th>
                      <th>Tanggal basen</th>
                      <th>Status Absen</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($absen as $row) {
                      $status = $row->status_absen; ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->nama_pegawai; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($row->tgl_absen)); ?></td>
                       
                      <?php if ($status == 1 ) { ?>
                        <td><span class='badge badge-succes'>Hadir</span> 
                      <?php }else{?>

                        <td><span class='badge badge-danger'>Telat</span> 

                     <?php } ?>
                        
                        <!-- <td >
                          <a href="javascript:void(0)" data-toggle="modal" data-target="#edit_kegiatan" class="btn btn-outline-brand btn-sm">
                            <i class="la la-edit"></i>
                           
                          </a>
                          <a href="javascript:void(0)" class="btn btn-outline-danger btn-sm">
                            <i class="la la-trash"></i>
                          
                          </a>
                        </td> -->
 
                     </tr>
                    <?php
                      $no++;
                    }
                    ?>
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
  window.open("<?= base_url('admin2/cetak_detail') ?>?tawal=<?=$tgl_awal; ?>&takhir=<?=$tgl_akhir; ?>&pegawai=<?=$pegawai; ?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=1070,left=1070,width=1070,height=1070");
}

  </script>
</body>

</html>