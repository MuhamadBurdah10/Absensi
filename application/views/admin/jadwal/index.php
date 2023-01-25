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
                   Jadwal </a>
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
                    Jadwal
                  </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                  <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                      <a href="javascript:void(0)" data-toggle="modal" data-target="#add_jadwal" class="btn btn-outline-brand">
                        <i class="la la-plus"></i>
                        Data Jadwal
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="kt-portlet__body">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="TableJadwal">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jam Masuk</th>
                      <th>Bats Jam Masuk</th>
                      <th>Jam Keluar</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($jadwal as $row) { 
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->jam_masuk; ?></td>
                         <td><?php echo $row->batas_jam_masuk; ?></td>
                        <td><?php echo $row->jam_keluar; ?></td>
                        <td>
                          <a href="<?= site_url('admin2/edit_jadwal/'.$row->id); ?>" class="btn btn-outline-brand">
                            <i class="la la-edit"></i>
                            Edit
                          </a>
                          <a href="javascript:void(0)" class="btn btn-outline-danger">
                            <i class="la la-trash"></i>
                            Delete
                          </a>
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
        <div id="add_jadwal" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeDefaultItemType" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Jadwal</h5>
              </div>
              <form class="controls" role="form" action="<?= base_url('admin2/save_jadwal') ?>" method="post">
                <div class="modal-body">

                  <!-- <input id="id" name="id" class="form-control" type="hidden" /> -->
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label>Jam Masuk</label>
                      <input name="jam_masuk" required="required" class="form-control" type="time" />
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Jam Keluar</label>
                      <input name="jam_keluar" required="required" class="form-control" type="time" />
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
      $('#TableJadwal').DataTable();
    });
  </script>
</body>

</html>