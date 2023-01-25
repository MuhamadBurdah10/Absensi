<?php $this->load->view('templates/base'); ?>
 <?php $this->load->view('templates/header'); ?>

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
              <?= $this->session->flashdata('message'); ?>
            <div class="kt-portlet kt-portlet--mobile">
              <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                  <i class="kt-font-brand flaticon2-edit"></i>
                  <h3 class="kt-portlet__head-title ml-3">
                   Nila Kegiatan Karyawan
                  </h3>
                </div>
                
              </div>
              <div class="kt-portlet__body">
               <div class="modal-content">
              
              <form class="controls" role="form" action="<?= base_url('manager/update_kegiatan') ?>" method="post" >
                <div class="modal-body">
                  <input type="hidden" name="id" value="<?= $kegiatan['0']['id_kegiatan']; ?>">
                  <!-- <input id="id" name="id" class="form-control" type="hidden" /> -->
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label>Nama Kegiatan</label>
                      <input name="nama_kegiatan" value="<?= $kegiatan['0']['nama_kegiatan']; ?>"  class="form-control" type="text" readonly="" />
                    </div>


                    <div class="form-group col-sm-6">
                      <label>Nama Pegawai</label>
                      <input name="nama_pegawai" value="<?= $kegiatan['0']['nama_pegawai']; ?>"  class="form-control" type="text" readonly=""/>
                    </div>
                   <div class="form-group col-sm-6">
                      <label>Mulai Kegiatan</label>
                      <input name="start_date"  class="form-control" type="text" value="<?= $kegiatan['0']['start_date']; ?>" readonly="">
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Selesai Kegiatan</label>
                      <input name="end_date"  class="form-control" type="text" value="<?= $kegiatan['0']['end_date']; ?>" readonly="">
                    </div>

                    <div class="form-group col-sm-6">
                      <label>Rician Kegiatan</label>
                      <textarea name="rincian" value="<?= $kegiatan['0']['rincian_kegiatan']; ?>"  class="form-control" type="text"/ readonly><?= $kegiatan['0']['rincian_kegiatan']; ?></textarea>
                    </div>

                    <div class="form-group col-sm-6">
                      <label style="color: green; "><b>Nila Kegiatan</b></label>
                      <select class="form-control" name="nilai">
                        <option value="0">-Pilih Nilai-</option>
                        <option value="Baik">Baik</option>
                        <option value="Cukup">Cukup</option>
                        <option value="Kurang Baik">Kurang Baik</option>
                        
                      </select>
                    </div>
                  </div> 
                </div>
                <div class="modal-footer"> 
                  <button type="submit" class="btn btn-primary">Selesai</button> <button type="reset"class="btn btn-secondary" data-dismiss="modal">Back</button> 
                </div> 
                </form>
              </div>
              </div>
            </div>
          </div>
        </div>
