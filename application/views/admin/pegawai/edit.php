<?php $this->load->view('templates/base'); ?>
 <?php $this->load->view('templates/header'); ?>

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
                   Edit Karyawan
                  </h3>
                </div>
                
              </div>
              <div class="kt-portlet__body">
               <div class="modal-content">
                  <form class="controls" role="form" action="<?= base_url('admin2/edit_pegawai') ?>" method="post">
                <div class="modal-body">

                 <input type="hidden" name="id" value="<?= $peg['id']; ?>">
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label>Nama Pegawai</label>
                      <input name="pegawai" required="required" class="form-control" type="text" value="<?=$peg['nama_pegawai']?>" readonly="" />
                    </div>
                  
                    <div class="form-group col-sm-6">
                      <label>NIK</label>
                      <input name="nik" required="required" class="form-control" type="number" value="<?=$peg['nik']?>" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-4">
                      <label>Email</label>
                      <input name="email" required="required" class="form-control" type="email" value="<?=$peg['email']?>">
                    </div>
                    <div class="form-group col-sm-4">
                      <label>Jabatan</label>
                      <select  name="roles" required="required" class="form-control" type="text" value="<?=$peg['roles']?>"">
                       <option value="admin">Admin</option>
                       <option value="manager">Manager</option>
                       <option value="pegawai">Pegawai</option>
                     </select>
                    </div>

                    <div class="form-group col-sm-4">
                      <label>Password</label>
                      <input name="Pasword" required="required" class="form-control" type="text" >
                    </div>
                    <div class="form-group col-sm-4">
                      <label>No Hp</label>
                      <input name="hp" required="required" class="form-control" type="text" value="<?=$peg['no_hp']?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-4">
                    <label>Jenis Kelamin</label>
                     <select  name="jk" required="required" class="form-control" type="text" value="<?=$peg['jk']?>">
                       <option value="laki-laki">Laki laki</option>
                       <option value="perempuan">Perempuan</option>
                     </select>
                    </div>
                    <div class="form-group col-sm-4">
                      <label>Tempat Lahir</label>
                      <input name="tempat" required="required" class="form-control" type="text" value="<?=$peg['tempat']?>">
                    </div>
                    <div class="form-group col-sm-4">
                      <label>Tanggal Lahir</label>
                      <input name="tgl_lahir" required="required" class="form-control" type="date" value="<?=$peg['tgl_lahir']?>">
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-12">
                      <label>Alamat</label>
                      <input name="alamat" required="required" class="form-control" type="text" value="<?=$peg['alamat']?>">
                    </div>
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <a href="<?= base_url('admin2/karyawan') ?>" class="btn btn-secondary" data-dismiss="modal">Back</a>
                </div>
              </form>
              </div>
              </div>
            </div>
          </div>
        </div>
