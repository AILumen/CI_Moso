<div class="form-section">
    <div class="form-inner-section">
        <?php
            if ($this->session->flashdata('Success') != '') {
                echo $this->session->flashdata('Success');
            }
        ?>
        <div class="logo">
            <span class="logo_txt"><img src="<?=base_url()?>public/images/logo.png"></span>
            <span class="back_lg_panel"><button class="back_icon" onclick="window.location.href = '<?=base_url();?>admin/Admin '" title="Back"><i class="fa fa-arrow-left"></i></button></span>
        </div>
        <div class="form-wrapper">
            <div class="error">
                <span class="error"></span>
            </div>
            <?php echo form_open('', array('id' => 'forget_pwd_admin_form')) ?>
            <form>
                <h1 class="form-heading">Forgot Password</h1>
                <p class="form-desc">Forgot your password? Don’t worry, Enter us your registered email and we will send you steps to reset your password.</p>
                <div class="form-group clearfix">
                    <span class="ad-password field-ico password-ico"></span>
                    <input type="text" class="form-field" maxlength="150" placeholder="Email ID" name="email" id="email" value="<?=set_value('email')?>">
                    <?php echo isset($error) ? '<label class="login_error">' . $error . '</label>' : form_error('email', '<label class="login_error">', '</label>'); ?>
                </div>
                <div class="form-group text-center">
                    <button class="login-btn" type="submit">Send</button>
                </div>
            </form>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>