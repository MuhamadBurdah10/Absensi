<?php $this->load->view('templates/base'); ?>
 <?php $this->load->view('templates/header'); ?>

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
                   Ubah Jadwal
                  </h3>
                </div>
                
              </div>
              <div class="kt-portlet__body">
               <div class="modal-content">
             
              <form class="controls" role="form" action="<?= base_url('admin2/ubahjadwal') ?>" method="post" enctype="multipart/form-data"> 
                <div class="modal-body">
                  <input type="hidden" name="id" value="<?= $kegiatan['id']; ?>">
                  <!-- <input id="id" name="id" class="form-control" type="hidden" /> -->
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label>Jam Masuk</label>
                      <input name="jam_masuk" value="<?= $kegiatan['jam_masuk']; ?>"  class="form-control" type="text"  />
                    </div>

                    <div class="form-group col-sm-6">
                      <label>Batas Jam Masuk</label>
                      <input name="batas_jam_masuk" value="<?= $kegiatan['batas_jam_masuk']; ?>"  class="form-control" type="text"  />
                    </div>

                    <div class="form-group col-sm-6">
                      <label>Jam Keluar</label>
                      <input name="jam_keluar" value="<?= $kegiatan['jam_keluar']; ?>"  class="form-control" type="text" />
                    </div>
                  </div> 
                </div>
                <div class="modal-footer"> 
                  <button type="submit" class="btn btn-primary">Ubah</button> <button type="reset"class="btn btn-secondary" data-dismiss="modal">Back</button> 
                </div> 
               
                 </form> 
              </div>
              </div>
            </div>
          </div>
        </div>
