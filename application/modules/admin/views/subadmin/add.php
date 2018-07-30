
<?php 
$filterArr = $this->input->get();
$filterArr = (object) $filterArr;
$controller = $this->router->fetch_class();
$method = $this->router->fetch_method();
$module = $this->router->fetch_module();
?>
<div class="right-panel">
            <div class="inner-right-panel">

                <!--breadcrumb wrap-->
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url().$module.'/'. strtolower($controller)?>">Sub Admin</a></li>
                        <li class="breadcrumb-item">Add Details</li>
                    </ol>
                </div>
                <!-- breadcrumb wrap close -->
                <div class="form-item-wrap">
                    <div class="form-item-title clearfix">
                        <h3 class="title">Add Details</h3>
                    </div>
                    <!-- title and form upper action end-->
                    <?php echo form_open_multipart( '', array ('id' => 'subadmin_add') ); ?>
                    <div class="form-ele-wrapper clearfix">
                        <div class="row">
                            <!--form ele wrapper-->
                            <input type="hidden" name="permission" id="permission" value="">
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="user-detail-panel">
                                    <div class="col-lg-3 col-sm-3 col-xs-12">
                                        <div class="form-group">
                                            <label>Name *</label>
                                            <div class="input-holder">
                                                <input type="text" name="name" value="<?php echo set_value( 'name' ); ?>" class="form-control subname">
                                                <?php echo form_error( 'name', '<label class="alert-danger">', '</label>' ); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-xs-12">
                                        <div class="form-group">
                                            <label>Email Id *</label>
                                            <div class="input-holder">
                                                <input type="text" name="email" value="<?php echo set_value( 'email' ); ?>" class="form-control subemail">
                                                <?php echo form_error( 'email', '<label class="alert-danger">', '</label>' ); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-xs-12">
                                        <div class="form-group">
                                            <label>Password *</label>
                                            <div class="input-holder">
                                                <input type="text" name="password" value="<?php echo set_value( 'password' ); ?>" class="form-control subpass">
                                                <?php echo form_error( 'password', '<label class="alert-danger">', '</label>' ); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-xs-12">
                                        <div class="form-group">
                                            <label>Status *</label>
                                            <div class="input-holder">
                                                <select class="substatus" name="status">
                                                    <option value="1">Active</option>
                                                    <option value="2">Inactive</option>
                                                </select>
                                                <?php echo form_error( 'status', '<label class="alert-danger">', '</label>' ); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--form ele wrapper end-->
                    </div>
                    <!--form element wrapper end-->
                </div>
                <!-- table panel -->
                <div class="section">
                    <h3 class="hd_tbl">Assign Roles</h3>
                    <!--table-->
                    <div class="table-responsive table-wrapper">
                        <table cellspacing="0" id="example" class="table-custom sortable">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Assign Roles</th>
                                    <th>Access Roles</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                            $count = 1;
                                            foreach ($acl_config as $key => $per_array){
                                       ?>
                                <tr>
                                    <td><?=$count?></td>
                                    <td><?=$key?></td>
                                    <td width="80%">
                                        <?php foreach($per_array as $per_key => $per_value) {?>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" name="<?=$per_key?>" id="subcheck_<?=$per_key?>" class="filled-in check child" value="<?=$per_key?>" data-parent="<?=$key?>">
                                            <label for="subcheck_<?php echo $per_key ?>" class="strong-label"><?php echo $per_value['text']; ?></label>
                                        </div>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php  $count ++;
                                            } 
                                       ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="button-wrap">
                        <button type="submit" class="commn-btn save subsave">Add</button>
                        <button type="reset" class="commn-btn cancel" onclick='window.location.href = "<?=base_url().$module.'/'.strtolower($controller)?>"'>Cancel</button>
                    </div>

                </div>
                <!-- close table panel -->
                <?php echo form_close(); ?>
            </div>
            <!--main wrapper close-->
        </div>
