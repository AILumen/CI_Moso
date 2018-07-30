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
                <li class="breadcrumb-item"><a href="<?= base_url().$module.'/profile'?>">Admin Profile</a></li>
                <li class="breadcrumb-item active">Admin Edit Profile</li>
            </ol>
        </div>
        <!--breadcrumb wrap close-->
         <?php
                if ( $this->session->flashdata( 'message' ) != '' ) {
                    echo $this->session->flashdata( 'message' );
                }
           ?>
        <?php  echo form_open_multipart( '', array ('id' => 'editadminprofile1') ); ?>
        <div class="section">
            <div class="user-detail-panel">
                <div class="row">
                    <div class="col-lg-3 col-sm-12 col-xs-12">
                        <!-- thumb wrapper -->

                        <div class="profile-pic" id="profilePic" style="background-image:url(<?=(!empty($admininfo["admin_profile_pic"])) ? IMAGE_PATH.$admininfo["admin_profile_pic"] : base_url().DEFAULT_IMAGE?>);">
                            <a href="javascript:void(0);" class="upimage-btn">
                                <input id="upload" style="display:none;" accept="image/*" name="admin_image" onchange="loadFile_signup( event, 'profilePic', this )" type="file">
                                <label class="camera" for="upload"><i class="fa fa-camera" aria-hidden="true"></i></label>
                            </a>
                        </div>

                        <!-- //thumb wrapper -->
                        <span class="loder-wrraper-single"></span>
                    </div>
                    <div class="col-lg-9 col-sm-12 col-xs-12">
                        <div class="user-detail-panel">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="admin-label">Name</label>
                                        <div class="input-holder">
                                            <input type="text" maxlength="100" name="Admin_Name" id="Admin_Name" value="<?=$admininfo["admin_name"]?>">
                                            <?php echo form_error( 'Admin_Name', '<label class="alert-danger">', '</label>' ); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="admin-label">Email ID</label>
                                        <div class="input-holder">
                                            <input type="text" readonly maxlength="100" name="email" value="<?=$admininfo["admin_email"]?>" id="email">
                                            <?php echo form_error( 'email', '<label class="alert-danger">', '</label>' ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="button-wrap text-center">
                        <button type="button" onclick='window.location.href="<?= base_url().$module.'/profile'?>"' class="commn-btn cancel">Cancel</button>
                        <button type="submit" class="commn-btn save">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!--close form view   -->
        <!--Filter Section Close-->
         <?php echo form_close(); ?>
    </div>
    <!--Table listing-->
</div>