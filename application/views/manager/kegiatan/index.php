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
      <?php $this->load->view('templates/assidem'); ?>
      <!-- aside end -->
      <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
        <!-- begin:: Header -->
        <?php $this->load->view('templates/header2'); ?>
        <!-- end:: Header -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
           <div class="kt-container kt-grid__item kt-grid__item--fluid mb-1">
            <form action="<?= base_url('manager/index'); ?>" method="POST" autocomplete="off">
              <div class="row">
                <div class="col-md-3">
                  <input type="date" name="awal" class="form-control col-sm ml-1" value="<?=$awal ?>">
                </div>
                <label style="padding-top: 0.6rem"><b>s/d</b></label>
                <div class="col-md-3">
                  <input type="date" name="akhir" class="form-control  col-sm" value="<?=$akhir ?>">
                </div>

             <!--  <div class="col-md-4">
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
                </div>  -->
                <div class="col-md-">
                  <input type="submit" name="submit" value="Cari" class="btn btn-primary btn-sm" style="padding-right: 2rem; padding-left: 2rem;">
                </div>
              </div>
            </form>
          </div>

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
                    Kegiatan </a>
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
                    Data kegiatan
                  </h3>
                </div>
                
              </div>
              <div class="kt-portlet__body">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="TableKegiatan">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Pegawai</th>
                      <th>Nama Kegiatan</th>
                      <th>Tanggal Kegiatan</th>
                      <th>Mulai Kegiatan</th>
                      <th>Selesai Kegiatan</th>
                      <th>Rincian</th>
                      <th>Surat Kegiatan</th>
                      <th>Nilai</th>
                    
                      <th width="15%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($kegiatan as $row) {
                      /*var_dump($row);
                      die();*/
                      $nilai = $row->nilai_kegiatan;
                      $status = $row->status_kegiatan; ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->nama_pegawai; ?></td>
                        <td><?php echo $row->nama_kegiatan; ?></td>
                        <td><?php echo $row->created_at; ?></td>
                        <td><?php echo $row->start_date; ?></td>
                        <td><?php echo $row->end_date; ?></td>
                        <td><?php echo $row->rincian_kegiatan; ?></td>
                       <td><a href="<?= site_url("karyawan/download/".$row->surat_kegiatan."/surat"); ?>">Lihat</a></td>
                        <?php if ($nilai == null) { ?>
                        <td><span class='badge badge-warning badge'>Belum Dinilai</span>    </td >
                      <?php  }else{ ?>
                        <td><?php echo $row->nilai_kegiatan; ?></td>
                       <?php }?>
                      
                        <td >
                       
                          <a href="<?= site_url('manager/nilai_kegiatan/'.$row->id_kegiatan); ?>" class="btn btn-outline-brand btn-sm">
                          <i class="la la-edit">Nilai</i> 
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
        <div id="add_kegiatan" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeDefaultItemType" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add kegiatan</h5>
              </div>
              <form class="controls" role="form" action="<?= base_url('admin2/save_kegiatan') ?>" method="post">
                <div class="modal-body">

                  <!-- <input id="id" name="id" class="form-control" type="hidden" /> -->
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label>Nama Kegiatan</label>
                      <input name="nama_kegiatan" required="required" class="form-control" type="text" />
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Nama Pegawai</label>

                      <select name="pegawai"  class="form-control">
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
                    <!-- <div class="form-group col-sm-6">
                      <label>Mulai Kegiatan</label>
                      <input name="start_date" required="required" class="form-control" type="time" />
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Selesai Kegiatan</label>
                      <input name="end_date" required="required" class="form-control" type="time" />
                    </div>
                  </div> -->
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
  </script>
</body>

</html>

<!-- 
 function getabsen( $index_data)
    {
       /**/
            $sql = "SELECT p.nama_pegawai,a.jam_masuk, a.tgl_absen, a.status_absen  FROM tbl_absensi a
                JOIN tbl_pegawai p on p.id = a.id_pegawai AND a.id_pegawai=$index_data ORDER BY p.nama_pegawai";
       
        //echo $querinya;
        //die();
        $q = $this->db->query($sql);
        return $q->result();
    }
 -->