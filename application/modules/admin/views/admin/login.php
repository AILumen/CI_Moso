<body>
    <div class="form-section">
        <div class="form-inner-section">
            <div class="logo">
                <span class="logo_txt"><img src=<?=base_url()."public/images/logo.png"?>></span>
            </div>
            <div class="form-wrapper">
                <div class="login-error">
                    <span class="error">
                        <?php
                            if ($this->session->flashdata('message') != ''){
                                echo $this->session->flashdata('message');
                            }
                        ?>
                    </span>
                </div>
                <?php echo form_open('', array('id' => 'login_admin_form')) ?>
                <form>
                    <h1 class="form-heading">Login</h1>
                    <p class="form-desc">Enter Your Details below to get access your account</p>
                    <div class="form-group">
                        <span class="field-ico user-ico"></span>
                        <input type="text" class="form-field" maxlength="40" placeholder="Email ID" onfocus="this.removeAttribute('readonly');" readonly name="email" value="<?php echo isset($email) ? $email : set_value('email'); ?>" autocomplete="off" />
                    </div>
                    <div class="form-group" id="passworderr">
                        <span class="field-ico password-ico"></span>
                        <input type="password" class="form-field" maxlength="20" placeholder="Password" name="password" onfocus="this.removeAttribute('readonly');" readonly value="<?php echo isset($password) ? $password : set_value('password'); ?>" autocomplete="off" required />
                    </div>
                    <?php echo isset($error) ? '<label class="alert-danger">' . $error . '</label>' : form_error('email', '<label class="alert-danger">', '</label>') ?>
                    <div class="form-group clearfix">
                        <label class="pull-right">
                        <a href="<?php echo base_url(); ?>admin/forgot" class="frgt-pwd">Forgot Password?</a>
                    </label>
                        <div class="pull-left">
                            <div class="custom-checkbox">
                                <input type="checkbox" name="remember_me" id="remember_me" value="remember_me" class="filled-in check">
                                <label for="remember_me" class="strong-label">Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button class="login-btn" type="submit" id="login">Login</button>
                    </div>
                </form>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <!--Footer-->
    <!--Login page  Wrap close-->
    <script src="js/jquery.min.js"></script>
</body>