<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
    <!-- begin:: Header Menu -->
    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
        </div>
    </div>
    <!-- end:: Header Menu -->
    <!-- begin:: Header Topbar -->
    <div class="kt-header__topbar">
        <!--begin: User Bar -->
        <div class="kt-header__topbar-item kt-header__topbar-item--user">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                <div class="kt-header__topbar-user">
                    <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                    <span class="kt-header__topbar-username kt-hidden-mobile"><?=ucwords($user['nama_pegawai']);?></span>
                    <img class="kt-hidden" alt="Pic" src="<?php echo config_item('assets'); ?>mt/media/users/default.jpg" />
                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                    <!-- @php
                    $short = explode('Metronic',Auth::user()->name);
                    @endphp -->
                    <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold"></span>
                </div>
            </div>
            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                <!--begin: Head -->
                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url('<?php echo config_item('assets'); ?>mt/media/misc/bg-1.jpg');">
                    <div class="kt-user-card__avatar">
                        <img class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success" alt="Pic" src="<?php echo config_item('assets'); ?>mt/media/users/default.jpg" />
                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                        <span class="kt-hidden">username</span>
                    </div>
                    <div class="kt-user-card__name">
                        <?=ucwords($user['nama_pegawai']);?><br>
                        <small><?=ucwords($user['roles']);?></small>
                    </div>
                </div>
                <!--end: Head -->
                <!--begin: Navigation -->
                <div class="kt-notification">
                    <div class="kt-notification__custom kt-space-between">
                        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
                        <form id="logout-form" action="<?= base_url('auth/logout'); ?>" method="POST" class="d-none">
                            <!-- @csrf -->
                        </form>
                    </div>
                </div>
                <!--end: Navigation -->
            </div>
        </div>
        <!--end: User Bar -->
    </div>
    <!-- end:: Header Topbar -->
</div>