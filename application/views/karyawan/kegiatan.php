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
                  <a href=" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                  <span class="kt-subheader__breadcrumbs-separator"></span>
                  <a href="javascript:;" class="kt-subheader__breadcrumbs-link">
                    Kegiatan </a>
                </div>
              </div>
            </div>
          </div>
          <div class="kt-container kt-grid__item kt-grid__item--fluid">
              <?= $this->session->flashdata('message'); ?>
            <div class="kt-portlet kt-portlet--mobile">
              <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                  <i class="kt-font-brand flaticon2-paper"></i>
                  <h3 class="kt-portlet__head-title ml-3">
                    Data kegiatan
                  </h3>
                </div>
                <div class="kt-portlet__head-label">
                  <a href="javascript:void(0)" data-toggle="modal" data-target="#add_kegiatan" class="btn btn-outline-brand">
                        <i class="la la-plus"></i>
                        Tambah Kegiatan
                      </a>
                </div>                
              </div>

              <div class="kt-portlet__body">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="TableKegiatan">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Pegawai</th>
                      <th>Nama Kegiatan</th>
                      <th>Mulai Kegiatan</th>
                      <th>Selesai Kegiatan</th>
                      <th>Bukti Kegiatan</th>
                      <th>Rincian</th>
                      <th>Nilai Kegiatan</th>
                      <th>Status</th>
                      <th width="15%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($kegiatan as $row) {
                      $status = $row->status_kegiatan;
                      $nilai=$row->nilai_kegiatan
                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->nama_pegawai; ?></td>
                        <td><?php echo $row->nama_kegiatan; ?></td>
                        <td><?php echo $row->start_date; ?></td>
                        <td><?php echo $row->end_date; ?></td>
                        <td><a href="<?= site_url("karyawan/download/".$row->surat_kegiatan."/surat"); ?>">Lihat</a></td>
                        <td><?php echo $row->rincian_kegiatan; ?></td>
                         
                      <?php if ($nilai == null) { ?>
                        <td><span class='badge badge-warning badge'>Belum Dinilai</span>    </td >
                      <?php  }else{ ?>
                        <td><?php echo $row->nilai_kegiatan; ?></td>
                       <?php }?>
                     
                      <?php if ($status == 0) { ?>
                        <td><span class='badge badge-warning'>Pending</span> 
                      <?php } else{ ?>
                        <td><span class='badge badge-primary'>Selesai</span>
                       <?php }?>
                        </td >
                         
                      <td> 
                        <?php if ($status == 0 && $nilai== 0) { ?>
                        <a href="<?= site_url('karyawan/upload_kegiatan/'.$row->id_kegiatan); ?>" class="btn btn-outline-brand btn-sm">
                            <i class="la la-edit"></i>
                          </a> 
                        <?php } 
                         else { ?>
                       <a href="" class="btn btn-outline-brand btn-sm" onmouseover="over()" data-toggle="tooltip" title="Sudah Dinilai">
                            <i class="la la-edit"></i>
                          </a> 
                        <?php  }?>
                        </td>
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
         <!-- ModaL Add -->
        <div id="add_kegiatan" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeDefaultItemType" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add kegiatan</h5>
              </div>
              <form class="controls" role="form" action="<?= base_url('karyawan/save_kegiatan') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <!-- <input id="id" name="id" class="form-control" type="hidden" /> -->
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label>Nama Kegiatan</label>
                      <input name="nama_kegiatan" required="required" class="form-control" type="text" />
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Nama Pegawai</label>
                      <input name="pegawai" required="required" class="form-control" type="text" value="<?=$user['id'];?>" hidden=""/>
                      <input name="" required="required" class="form-control" type="text" value="<?=$user['nama_pegawai'];?>" readonly=""/>
                    </div>
                   <div class="form-group col-sm-6">
                      <label>Mulai Kegiatan</label>
                      <input name="start_date"  class="form-control" type="time" />
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Selesai Kegiatan</label>
                      <input name="end_date"  class="form-control" type="time" />
                    </div>
                     <div class="form-group col-sm-6">
                      <label>Rician Kegiatan</label>
                      <textarea name="rincian" value=""  class="form-control" type="text"/ required=""></textarea>
                    </div>

                    <div class="form-group col-sm-6">
                      <label>Upload Bukti Surat Kegiatan</label>
                      <input type="file" name="surat" class="form-control"  required="">
                    </div>
                  </div> 
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End Modal Add -->
        <!-- Edit kegiatan -->
        <div id="edit_kegiatan" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeDefaultItemType" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit kegiatan</h5>
              </div>
              <div class="modal-body">
                <input id="id" name="id" class="form-control" type="hidden" />
                <div class="row">

                  <div class="form-group col-sm-6">
                    <label>Jam Masuk</label>
                    <input name="date_time" class="form-control" type="time" />
                  </div>

                  <div class="form-group col-sm-6">
                    <label>Jam Keluar</label>
                    <input name="date_time" class="form-control" type="time" />
                  </div>

                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- End Edit kegiatan -->

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

    $(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>

</html>