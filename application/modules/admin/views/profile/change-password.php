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
                        <li class="breadcrumb-item"><a href="<?= base_url().$module.'/dashboard'?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                </div>
                <!--breadcrumb wrap close-->
                <?php
                        if ( $this->session->flashdata( 'message' ) != '' ) {
                            echo $this->session->flashdata( 'message' );
                        }
                   ?>
                <!-- form -->
                <?php echo form_open( '', array ('id' => 'password_change_form') ); ?>
                <div class="section clearfix">
                    <div class="user-detail-panel">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label class="admin-label">Old Password<span class="req_str">*</span></label>
                                    <div class="input-holder">
                                        <input type="password" maxlength="16" class="form-control material-control" maxlength="55" name="oldpassword" value="">
                                        <?php
                                                    echo isset( $error_message ) ? '<label class="alert-danger">'.$error_message.'</label>' : form_error( 'oldpassword', '<label class="alert-danger">', '</label>' );
                                                ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label class="admin-label">New Password <span class="req_str">*</span></label>
                                    <div class="input-holder">
                                        <input type="password" maxlength="16" class="form-control material-control" maxlength="55" name="password" value="" id="password">
                                        <?php echo form_error( 'password', '<label class="alert-danger">', '</label>' ); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label class="admin-label">Confirm Password <span class="req_str">*</span></label>
                                    <div class="input-holder">
                                        <input type="password" maxlength="16" class="form-control material-control" maxlength="55" name="confirm_password" value="">
                                        <?php echo form_error( 'confirm_password', '<label class="alert-danger">', '</label>' ); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-xs-12">
                                <div class="button-wrap">
                                    <button type="button"  onclick="window.location.href = '<?php echo base_url() ?>admin/profile'"class="commn-btn cancel">Cancel</button>
                                    <button type="submit" class="commn-btn save">Save</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <!-- form -->
            </div>
        </div>