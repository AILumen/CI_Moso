<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MOSO</title>
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>public/images/logo.png">
    <!-- CSS Plugin -->
    <link href="<?=base_url()?>public/css/plugin/bootstrap.min.css" rel='stylesheet'>
    <link href="<?=base_url()?>public/css/plugin/bootstrap-select.min.css" rel='stylesheet'>
    <link href="<?=base_url()?>public/css/plugin/font-awesome.min.css" rel='stylesheet'>
    <link href="<?=base_url()?>public/css/plugin/datepicker.css" rel='stylesheet'>
    <link href="<?=base_url()?>public/css/layout.css" rel='stylesheet'>
    <link href="<?=base_url()?>public/css/style.css" rel='stylesheet'>
    <link href="<?=base_url()?>public/css/media.css" rel='stylesheet'>
    <link href="<?=base_url()?>public/css/form-roles.css" rel='stylesheet'>
    <link href="<?=base_url()?>public/css/input-radio.css" rel='stylesheet'>
    <link href='https://api.mapbox.com/mapbox-gl-js/v0.44.1/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.44.1/mapbox-gl.js'></script>
</head>
    <?php
        $this->load->helper('cookie');
        $controller = strtolower($this->router->fetch_class());
        $method = strtolower($this->router->fetch_method());
        $sidebarState = isset($adminInfo["sidebar_state"]) ? $adminInfo["sidebar_state"] : "";
        $sideBar = get_cookie('sideBar');
        $sideBar = isset($sideBar) ? $sideBar : "";
    ?>
    <body class="<?php echo ($sideBar == 'minimized') ? 'body-sm' : '' ?>">
        <div class="in-data-wrap">
        <!--left panel-->
        <aside class="sidebar-wrapper">
            <div class="sidebar-menu">
                <div class="xs-sidemenu-toggle">
                    <span class="ico">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </div>
                <div class="user-short-detail">
                    <div class="image-view-wrapper img-view80p img-viewbdr-radius">
                        <div id="lefft-logo" class="image-view img-view80" style="background:url('<?php echo (isset($admininfo['admin_profile_pic']) && !empty($admininfo['admin_profile_pic'])) ? IMAGE_PATH.$admininfo['admin_profile_pic'] : base_url().'public/images/user_b.svg' ?>')"></div>
                    </div>
                    <span class="user-name"><?=$admininfo["admin_name"]?></span>
                </div>
                <div class="left-menu side-panel">
                    <ul>
                        <li>
                            <a href="<?= base_url()?>admin/dashboard" class="<?php echo ($controller == 'dashboard') ? 'active' : ''; ?>">
                                <span class="left_icon dash_1"></span>
                                <span class="nav-txt">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>admin/users" class="<?php echo ($controller == 'user') ? 'active' : ''; ?>">
                                <span class="left_icon dash_2"></span>

                                <span class="nav-txt">Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>admin/event" class="<?php echo ($controller == 'event') ? 'active' : ''; ?>">
                                <span class="left_icon dash_3"></span>

                                <span class="nav-txt">Events</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>admin/media" class="<?php echo ($controller == 'media') ? 'active' : ''; ?>">
                                <span class="left_icon dash_4"></span>

                                <span class="nav-txt">Media</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>admin/advertisement" class="<?php echo ($controller == 'advertisement') ? 'active' : ''; ?>">
                                <span class="left_icon dash_5"></span>
                                <span class="nav-txt">Advertisement</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>admin/algorithm" class="<?php echo ($controller == 'algorithm') ? 'active' : ''; ?>">
                                <span class="left_icon dash_6"></span>

                                <span class="nav-txt">Algorithm Settings</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= base_url()?>admin/subadmin" class="<?php echo ($controller == 'subadmin') ? 'active' : ''; ?>">
                                <span class="left_icon dash_7"> </span>
                                <span class="nav-txt">Sub Admin</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="<?php echo ($controller == 'notification') ? 'active' : ''; ?>">
                                <span class="left_icon dash_8"></span>
                                <span class="nav-txt">Push Notifications</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>admin/version" class="<?php echo ($controller == 'version') ? 'active' : ''; ?>">
                                <span class="left_icon dash_9"></span>
                                <span class="nav-txt">Version</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>admin/content" class="<?php echo ($controller == 'content') ? 'active' : ''; ?>">
                                <span class="left_icon dash_10"></span>
                                <span class="nav-txt">Content</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <!--left panel-->

        <!--Header-->
        <header>
            <div class="headerinner">
                <div class="headerleft">
                <!--toggle button-->
                    <div class="toggleBtn">
                        <span class="line-bar"></span>
                        <span class="line-bar shot-line-br"></span>
                        <span class="line-bar"></span>
                    </div>
                    <!--toggle button close-->

                    <!--nav brand wrap-->
                    <div class="nav-brand clearfix">
                        <a href="<?=base_url()?>admin/dashboard" title="Logo">
                            <!-- <span><img src="public/images/"></span> -->
                            <div class="logoTxt">
                                <span class="logo_txt">MORE SOCIAL</span>
                            </div>
                        </a>
                    </div>
                    <!--nav brand wrap close-->
                </div>
                <div class="headerright">
                    <!--User Setting-->
                    <div class="user-setting-wrap">
                        <ul>
                            <li>
                                <a href="<?= base_url()?>admin/profile"  title="Profile"><img src="<?= base_url()?>public/images/setting.svg" alt="Profile"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal-logout" title="Logout"><img src="<?= base_url()?>public/images/logout.svg" title="Logout"></a>
                            </li>
                        </ul>
                    </div>
                    <!--User Setting wrap close-->
                </div>
            </div>
        </header>
        <!-- header close -->
