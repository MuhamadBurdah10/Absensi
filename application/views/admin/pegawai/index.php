
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
                   Pegawai </a>
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
                    Data Pegawai
                  </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                  <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                      <a href="javascript:void(0)" data-toggle="modal" data-target="#add_pegawai" class="btn btn-outline-brand">
                        <i class="la la-plus"></i>
                        Add Pegawai
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
                      <th>Nama Pegawai</th>
                      <th>Jenis Kelamin</th>
                      <th>Tempat/Tanggal Lahir</th>
                      <th>Alamat</th>
                      <th>Email</th>
                      <th>No Hp</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($pegawai as $row) {
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->nama_pegawai; ?></td>
                        <td><?php echo $row->jk; ?></td>
                        <td><?php echo $row->tempat; ?>/<?php echo $row->tgl_lahir; ?></td>
                        <td><?php echo $row->alamat; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->no_hp; ?></td>
                        <td width="15%">
                          <a href="<?= site_url('admin2/edit_peg/'.$row->id); ?>" class="btn btn-outline-primary btn-sm btn-edit">
                            <i class="la la-edit"></i>
                          </a>
                          <a href="<?= site_url('admin2/delete_peg/'.$row->id); ?>" class="btn btn-outline-danger btn-sm btn-edit">
                            <i class="la la-trash"></i>
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
        <div id="add_pegawai" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeDefaultItemType" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Pegawai</h5>
              </div>
            <form class="controls" role="form" action="<?= base_url('admin2/save_pegawai') ?>" method="post">
                <div class="modal-body">

                  <!-- <input id="id" name="id" class="form-control" type="hidden" /> -->
                  <div class="row">
                    <div class="form-group col-sm-4">
                      <label>Nama Pegawai</label>
                      <input name="pegawai" required="required" class="form-control" type="text" />
                    </div>
                     <div class="form-group col-sm-4">
                      <label>NIK</label>
                      <input name="pasword" required="required" class="form-control" type="type" />
                    </div>
                    <div class="form-group col-sm-4">
                      <label>Pasword</label>
                      <input name="pasword" required="required" class="form-control" type="password" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-4">
                      <label>Email</label>
                      <input name="email" required="required" class="form-control" type="email" >
                    </div>
                    <div class="form-group col-sm-4">
                      <label>Jabatan</label>
                      <select  name="roles" required="required" class="form-control" type="text">
                       <option>Pilih Jabatan</option>
                       <option value="admin">Admin</option>
                       <option value="manager">Manager</option>
                       <option value="pegawai">Pegawai</option>
                      
                     </select>
                    </div>
                    <div class="form-group col-sm-4">
                      <label>No Hp</label>
                      <input name="hp" required="required" class="form-control" type="text" >
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-4">
                    <label>Jenis Kelamin</label>
                     <select  name="jk" required="required" class="form-control" type="text">
                       <option>Pilih Jenis Kelamin</option>
                       <option value="laki-laki">Laki laki</option>
                       <option value="perempuan">Perempuan</option>
                     </select>
                    </div>
                    <div class="form-group col-sm-4">
                      <label>Tempat Lahir</label>
                      <input name="tempat" required="required" class="form-control" type="text" >
                    </div>
                    <div class="form-group col-sm-4">
                      <label>Tanggal Lahir</label>
                      <input name="tgl_lahir" required="required" class="form-control" type="date" >
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-12">
                      <label>Alamat</label>
                      <textarea name="alamat" required="required" class="form-control" type="text" ></textarea>
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

        <!-- Edit Jadwal -->
        <div id="edit_pegawai" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeDefaultItemType" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Jadwal</h5>
              </div>
             <form class="controls" role="form" action="<?= base_url('admin2/save_pegawai') ?>" method="post">
                <div class="modal-body">

                  <!-- <input id="id" name="id" class="form-control" type="hidden" /> -->
                  <div class="row">
                    <div class="form-group col-sm-4">
                      <label>Nama Pegawai</label>
                      <input name="pegawai" required="required" class="form-control" type="text" />
                    </div>
                     <div class="form-group col-sm-4">
                      <label>NIK</label>
                      <input name="nik" required="required" class="form-control" type="text" />
                    </div>
                    <div class="form-group col-sm-4">
                      <label>Password</label>
                      <input name="pasword" required="required" class="form-control" type="text" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-4">
                      <label>Email</label>
                      <input name="email" required="required" class="form-control" type="email" >
                    </div>
                    <div class="form-group col-sm-4">
                      <label>Jabatan</label>
                      <select  name="roles" required="required" class="form-control" type="text">
                       <option>Pilih Jabatan</option>
                       <option value="pegawai">Pegawai</option>
                       <option value="admin">Admin</option>
                       <option value="manager">Manager</option>
                     </select>
                    </div>
                    <div class="form-group col-sm-4">
                      <label>No Hp</label>
                      <input name="hp" required="required" class="form-control" type="text" >
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-4">
                    <label>Jenis Kelamin</label>
                     <select  name="jk" required="required" class="form-control" type="text">
                       <option>Pilih Jenis Kelamin</option>
                       <option value="laki-laki">Laki laki</option>
                       <option value="perempuan">Perempuan</option>
                     </select>
                    </div>
                    <div class="form-group col-sm-4">
                      <label>Tempat Lahir</label>
                      <input name="tempat" required="required" class="form-control" type="text" >
                    </div>
                    <div class="form-group col-sm-4">
                      <label>Tanggal Lahir</label>
                      <input name="tgl_lahir" required="required" class="form-control" type="date" >
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-12">
                      <label>Alamat</label>
                      <textarea name="alamat" required="required" class="form-control" type="text" ></textarea>
                    </div>
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Edit</button>
                  <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End Edit Jadwal -->

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

  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
 <script type="text/javascript">
        $(function () {
        $('[data-toggle="tooltip"]').tooltip();});

           $(document).ready(function () {
           $('.btn-edit').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const pasien = $(this).data('pasien');
            const rm = $(this).data('rm');
            const tanggal = $(this).data('tanggal');
            // Set data to Form Edit
            $('.id_pesanan').val(id_pesanan);
            $('.pasien').val(pasien);
            $('.rm').val(rm);
            $('.tanggal').val(tanggal);
           
            // Call Modal Edit
            $('#edit_pegawai').modal('show');
            });

            $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.pesananID').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });

       });
</script>
</body>

</html>