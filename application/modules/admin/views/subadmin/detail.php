<?php 
    $filterArr = $this->input->get();
    $filterArr = (object) $filterArr;
    $controller = $this->router->fetch_class();
    $method = $this->router->fetch_method();
    $module = $this->router->fetch_module();
    $temp       = json_decode( $permission, TRUE );
    $permission = $temp['permission'];
?>
<div class="right-panel">
            <div class="inner-right-panel">

                <!--breadcrumb wrap-->
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url().$module.'/'. strtolower($controller)?>">Sub Admin</a></li>
                        <li class="breadcrumb-item">Sub Admin Details</li>
                    </ol>
                </div>
                <!-- breadcrumb wrap close -->
                <div class="form-item-wrap">
                    <div class="form-item-title clearfix">
                        <h3 class="title">Sub Admin Details</h3>
                    </div>
                    <!-- title and form upper action end-->
                    <div class="form-ele-wrapper clearfix">
                        <div class="row">
                            <!--form ele wrapper-->
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="user-detail-panel">
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?=$admindetail["admin_name"]?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Email Id</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?=$admindetail["admin_email"]?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?=($admindetail["status"] == "1") ? "Active" : "Inactive"?></span>
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
                                        <table class="table table-responsive ">
                                            <tr>
                                        <?php foreach($per_array as $per_key => $per_value) {
                                                 ?>
                                           <td>
                                           <span class="check_icon">
                                            <?php if(in_array($per_key, $permission)){ ?>
                                               <img src="<?= base_url()?>public/images/tick.svg" alt="">
                                            <?php }else{?>
                                               <img src="<?= base_url()?>public/images/cross-icon.svg" alt="">
                                            <?php } ?>
                                           </span>
                                           <label for="subcheck_<?php echo $per_key ?>" class="text-detail"><?php echo $per_value['text']; ?></label>
                                           </td>
                                        <?php } ?>
                                           </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php  $count ++;
                                            } 
                                       ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- close table panel -->

            </div>
            <!--main wrapper close-->
        </div>