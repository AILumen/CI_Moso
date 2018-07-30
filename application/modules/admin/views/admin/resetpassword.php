    <div class="form-section">
        <div class="form-inner-section">
            <div class="logo">
                <span class="logo_txt"><img src="<?=base_url()?>public/images/logo.png"></span>
                <span class="back_lg_panel"><button class="back_icon" onclick="window.location.href = '<?= base_url()?>admin/login'" title="Back"><i class="fa fa-arrow-left"></i></button></span>
            </div>
            <div class="form-wrapper">
                <div class="login-error">
                    <span class="error"></span>
                </div>
                <form method="post" id="resetform">
                    <input type="hidden" name="<?php echo $csrfName; ?>" id="<?php echo $csrfName; ?>" value="<?php echo $csrfToken; ?>"> 
                    <h1 class="form-heading">Reset Password</h1>
                    <p class="form-desc"></p>
                    <div class="form-group" id="passerror">
                        <span class="field-ico password-ico"></span>
                        <input type="password" class="form-field" maxlength="40" placeholder="Enter New Password" id="password" name="password" autocomplete="off">
                        <span class="error-mssg passwordErr" id="password"></span>
                        <span class="bar"></span>
                    </div>
                    <div class="form-group" id="conpassreq">
                        <span class="field-ico password-ico"></span>
                        <input type="password" class="form-field" maxlength="40" placeholder="Enter Confirm Password" id="cnfpassword" name="cpassword" autocomplete="off">
                        <span class="error-mssg cnfpasswordErr" id="cnfpassword"></span>
                        <span class="bar"></span>
                    </div>
                    <div class="form-group text-center">
                        <button class="login-btn" onclick="return validatepassword()" type="submit" id="resetbtn">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>