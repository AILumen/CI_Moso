<?php 
    $controller = $this->router->fetch_class();
    $method = $this->router->fetch_method();
    $module = $this->router->fetch_module();
?>
<div class="right-panel">
            <div class="inner-right-panel">
                <!--breadcrumb wrap-->
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Admin Profile</li>
                    </ol>
                </div>
                <!--breadcrumb wrap close-->
                <?php
                        if ( $this->session->flashdata( 'password_updated' ) != '' ) {
                            echo $this->session->flashdata( 'password_updated' );
                        }
                   ?>
                <!--Filter Section -->
                <div class="section">
                    <div class="user-detail-panel">
                        <div class="row">
                            <div class="col-lg-3 col-sm-4 col-xs-12">
                                <div class="profile-pic image-view img-view200" style="background-image:url(<?=(!empty($admininfo["admin_profile_pic"])) ? IMAGE_PATH.$admininfo["admin_profile_pic"] : base_url().DEFAULT_IMAGE?>);">
                                </div>
                                <span class="loder-wrraper-single"></span>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-xs-12">
                                <div class="user-detail-panel">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label class="admin-label">Name</label>
                                                <div class="input-holder">
                                                    <span class="text-detail"><?=$admininfo["admin_name"]?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label class="admin-label">Email ID</label>
                                                <div class="input-holder">
                                                    <span class="text-detail"><?=$admininfo["admin_email"]?></span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <div class="button-wrap">
                                    <a href="<?=base_url().$module?>" class="profile_btn"><button type="button" class="commn-btn cancel">Cancel</button></a> </li>
                                    <a href="<?= base_url()?>admin/change-password" class="profile_btn"><button type="button" name="changepassword" class="commn-btn save">Change Password</button></a> </li>
                                    <a href="<?= base_url()?>admin/edit-profile" class="profile_btn"><button type="button" name="editprofile" class="commn-btn save">Edit Profile</button></a> </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>