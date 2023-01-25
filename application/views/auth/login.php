

  <!DOCTYPE html>

<!--
Author: Setiawan Iman
Website: http://www.unzypsoft.com/
Contact: iman@unzypsoft.com / sales@unzypsoft.com
-->
<html lang="en">

    <!-- begin::Head -->
    <head>
        <base href="../../../">
        <meta charset="utf-8" />
        <title>KJM</title>
        <meta name="description" content="Login page example">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
    
        <!--begin::Page Custom Styles(used by this page) -->
        <link href="<?php echo config_item('assets'); ?>mt/css/pages/login/login-2.css" rel="stylesheet" type="text/css" />

        <!--end::Page Custom Styles -->

        <!--begin::Global Theme Styles(used by all pages) -->
        <link href="<?php echo config_item('assets'); ?>mt/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo config_item('assets'); ?>mt/css/style.bundle.css" rel="stylesheet" type="text/css" />

        <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->
        <link href="<?php echo config_item('assets'); ?>mt/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo config_item('assets'); ?>mt/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo config_item('assets'); ?>mt/css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo config_item('assets'); ?>mt/css/skins/aside/dark.css" rel="stylesheet" type="text/css" />
        <!--end::Layout Skins -->
        <link rel="icon" href="<?php echo config_item('assets'); ?>aseanAssets/aseranLogo2.png">
    </head>

    <!-- end::Head -->

    <!-- begin::Body -->
    <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
    
        <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root kt-login kt-login--v2 kt-login--signin" id="kt_login">
              <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(<?php echo config_item('assets'); ?>mt/media/bg/bg-1.jpg);position:absolute;width:100%;height:100%;">
                  <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                      <div class="kt-login__container">
                          <div class="kt-login__logo">
                              <a href="#">
                                <img src="<?php echo config_item('assets'); ?>mt/media/logo/logonya.png" style="width: 80px;">
                              </a>
                          </div>
                          <div class="kt-login__signin">
                              <div class="kt-login__head">
                                  <h3 class="kt-login__title">Login</h3>

                                  <marquee width="430" class="kt-login__title" height="40">Selamat Datang di Presensi Non-ASN Kecamatan Bogor Timur</marquee>
                              </div>
                              <?= $this->session->flashdata('message');?>
                              <form class="user" method="post" action="<?= base_url('auth');?>">
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-user"  name="username" aria-describedby="emailHelp" placeholder="username" value="<?=set_value('email'); ?>">
                                   <?= form_error('email', '<small class="text-danger pl-3">','</small>' ); ?>
                                </div>
                                <div class="form-group">
                                  <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                   <?= form_error('password', '<small class="text-danger pl-3">','</small>' ); ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                  Login
                                </button>  
                                <div class=" form-group text-center mt-2"> 
                                <input type="checkbox" name="remember " id="remember">
                                <label>Ingat Saya</label>
                              </div>
                              </form>
                          </div>
                          <!-- <div class="kt-login__forgot">
                              <div class="kt-login__head">
                                  <h3 class="kt-login__title">Forgotten Password ?</h3>
                                  <div class="kt-login__desc">Enter your email to reset your password:</div>
                              </div>
                              <form class="kt-form" action="">
                                  <div class="input-group">
                                      <input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
                                  </div>
                                  <div class="kt-login__actions">
                                      <button id="kt_login_forgot_submit" class="btn btn-pill kt-login__btn-primary">Request</button>&nbsp;&nbsp;
                                      <button id="kt_login_forgot_cancel" class="btn btn-pill kt-login__btn-secondary">Cancel</button>
                                  </div>
                              </form>
                          </div> -->
                      </div>
                  </div>
              </div>
          </div>
      </div>


    <script>
            var KTAppOptions = {
                "colors": {
                    "state": {
                        "brand": "#5d78ff",
                        "dark": "#282a3c",
                        "light": "#ffffff",
                        "primary": "#5867dd",
                        "success": "#34bfa3",
                        "info": "#36a3f7",
                        "warning": "#ffb822",
                        "danger": "#fd3995"
                    },
                    "base": {
                        "label": [
                            "#c5cbe3",
                            "#a1a8c3",
                            "#3d4465",
                            "#3e4466"
                        ],
                        "shape": [
                            "#f0f3ff",
                            "#d9dffa",
                            "#afb4d4",
                            "#646c9a"
                        ]
                    }
                }
            };
        </script>

        <script src="<?php echo config_item('assets'); ?>mt/plugins/global/plugins.bundle.js" type="text/javascript"></script>
        <script src="<?php echo config_item('assets'); ?>mt/js/scripts.bundle.js" type="text/javascript"></script>

        <!--end::Global Theme Bundle -->

        <!--begin::Page Scripts(used by this page) -->
        <script src="<?php echo config_item('assets'); ?>mt/js/pages/custom/login/login-general.js" type="text/javascript"></script>

        <!--end::Page Scripts -->
    </body>

    <!-- end::Body -->
</html>

  
  

