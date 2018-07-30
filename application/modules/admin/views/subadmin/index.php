<?php 
    $filterArr = $this->input->get();
    $filterArr = (object) $filterArr;
    $controller = $this->router->fetch_class();
    $method = $this->router->fetch_method();
    $module = $this->router->fetch_module();
?>
<input type="hidden" id="filterVal" value='<?php echo json_encode($filterArr); ?>'>
<input type="hidden" id="pageUrl" value='<?php echo base_url().$module.'/'.strtolower($controller).'/'.$method; ?>'>
        <div class="right-panel">
            <div class="inner-right-panel">
                <!-- alert -->
                <?php if ( null !== $this->session->flashdata("alertMsg")) { 
                    $error = $this->session->flashdata("alertMsg");
                ?>
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="alert-heading"><?= $error["type"] ?></h4>
                    <p><?= $error["text"] ?></p>
                </div>
                <?php } ?>
                <!-- //alert -->
                <!--breadcrumb wrap-->
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Sub Admin</li>
                    </ol>
                </div>

                <!--Filter Section -->
                <div class="section filter-section clearfix">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="srch-wrap fawe-icon-position col-sm-space">
                                <span class="fawe-icon fawe-icon-position-left search-ico"><i class="fa fa-search"></i></span>
                                <span class="fawe-icon fawe-icon-position-right close-ico"><i class="fa fa-times-circle"></i></span>
                                <input type="text" maxlength="50" value="<?php echo (isset($searchlike) && !empty($searchlike))? $searchlike:''?>" class="search-box searchlike" placeholder="Search by Name,Email" id="searchuser" name="search">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="circle-btn-wrap col-sm-space">
                                <a href="javascript:void(0)" id="filter-side-wrapper" class="tooltip-p">
                                    <div class="circle-btn animate-btn" title="Filter">
                                        <i class="fa fa-filter" aria-hidden="true"></i>
                                    </div>
                                </a>
                                <a href="<?= base_url()?>admin/subadmin/add" class="circle-btn" title="Add Detail">
                                    <img src="<?= base_url()?>public/images/add.svg">
                                </a>
                                <a href="javascript:void(0);" class="circle-btn exportCsv" title="Export to CSV/Excel">
                                    <img src="<?= base_url()?>public/images/save.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Filter Section Close-->

                <!--Filter Wrapper-->
                <div class="filter-wrap ">
                    <div class="filter_hd clearfix">
                        <div class="pull-left">
                            <h2 class="fltr-heading">Filter</h2>
                        </div>
                        <div class="pull-right">
                            <span class="close flt_cl">X</span>
                        </div>
                    </div>
                    <div class="inner-filter-wrap">
                        <div class="row">
                            <div class="col-lg-3 col-sm-3 col-xs-12">
                                <div class="fltr-field-wrap">
                                    <label class="admin-label">Adding Date</label>
                                    <div class="inputfield-wrap calendersec">
                                        <input readonly type="text" name="startDate" data-provide="datepicker" value="<?php echo!empty( $startDate ) ? date( 'm/d/Y', strtotime( $startDate ) ) : "" ?>" class="form-control startDate" id="startDate" placeholder="From">
                                        <span class="cal_bg"></span>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3 col-xs-12">
                                <div class="fltr-field-wrap pd_fl">
                                    <div class="inputfield-wrap calendersec">
                                        <input readonly type="text" name="endDate" data-provide="datepicker" value="<?php echo!empty( $endDate ) ? date( 'm/d/Y', strtotime( $endDate ) ) : "" ?>" class="form-control endDate" id="endDate" placeholder="To">
                                        <span class="cal_bg"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3 col-xs-12">
                                <div class="fltr-field-wrap">
                                    <label class="admin-label">State</label>
                                    <div class="commn-select-wrap">
                                        <select class="selectpicker filter status">
                                            <option value="">Select Status</option>
                                            <option <?=($status == "1") ? "selected" : ''?> value="1">Active</option>
                                            <option <?=($status == "3") ? "selected" : ''?> value="3">Blocked</option>
                                            <option <?=($status == "2") ? "selected" : ''?> value="2">Deleted</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="button-wrap text-center">
                                    <button type="reset" class="commn-btn cancel resetfilter" id="resetbutton">Reset</button>
                                    <input type="submit" class="commn-btn save applyFilterUser" id="filterbutton" name="filter" value="Apply">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--Filter Wrapper Close-->
                <div class="section">
                    <!-- <p class="tt-count">Total Users:(10)</p> -->
                    <!--table-->
                    <div class="table-responsive table-wrapper">
                        <table cellspacing="0" id="example" class="table-custom sortable">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email ID</th>
                                    <th>Adding Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                            if(!empty($data)){
                                                $count = 1;
                                                foreach ($data as $subadmin){
                                       ?>
                                <tr>
                                    <td><?=$count?></td>
                                    <td><?php if($subadmin["status"] == DELETED) { echo  $subadmin["admin_name"]; }else{ ?> <a href="<?= base_url().$module.'/'. strtolower($controller).'/view?id='.$subadmin['admin_id']?>"><?=$subadmin["admin_name"]?></a> <?php } ?></td>
                                    <td><?=$subadmin["admin_email"]?></td>
                                    <td><?=date('d-M-y',$subadmin['created_on'])?></td>
                                    <td id="status_<?=$subadmin['admin_id']?>">
                                        <?php
                                                    if($subadmin["status"] == ACTIVE){
                                                        echo "Active";
                                                    }elseif($subadmin["status"] == BLOCKED){
                                                        echo "Blocked";
                                                    }else{
                                                        echo "Deleted";
                                                    }
                                                 ?>
                                    </td>
                                    <td class=" table-action">
                                        <?php 
                                            if($subadmin['status'] == DELETED){
                                            ?>
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        <i class="fa fa-ban" aria-hidden="true"></i>
                                    <?php }else{?>
                                        <a href="<?= base_url()?>admin/subadmin/edit?id=<?=$subadmin['admin_id'] ?>"><i class="fa fa-pencil" aria-hidden="true" title="Edit Details"></i></a>
                                        <a href="javascript:void(0);" class="f-trash"><i class="fa fa-trash" aria-hidden="true" onclick="deleteUser('subadmin',<?php echo DELETED;?>'<?php echo encryptDecrypt($subadmin['admin_id']);?>','req/change-user-status','<?=$this->lang->line('confirm_delete_subadmin')?>');"></i></a>                                        
                                        <?php if($subadmin['status'] == "3"){ ?>
                                            <a href="javascript:void(0);" id ="unblock_<?=$subadmin['admin_id']?>" class="f-trash"><i class="fa fa-unlock" aria-hidden="true" onclick="blockUser('subadmin',<?=ACTIVE?>,'<?php echo encryptDecrypt($subadmin['admin_id']);?>','req/change-user-status','<?=$this->lang->line('confirm_unblock_subadmin')?>','Unblock');"></i></a>
                                        <?php }else{ ?>
                                            <a href="javascript:void(0);" id ="block_<?=$subadmin['admin_id']?>" class="f-trash"><i class="fa fa-ban" aria-hidden="true" onclick="blockUser('subadmin',<?=BLOCKED?>,'<?=encryptDecrypt($subadmin['admin_id'])?>','req/change-user-status','<?=$this->lang->line('confirm_block_subadmin')?>','Block');"></i></a>
                                        <?php } ?>
                                        <a href="javascript:void(0);" id ="unblock_<?=$subadmin['admin_id']?>" class="f-trash hide"><i class="fa fa-unlock" aria-hidden="true" onclick="blockUser('subadmin',<?=ACTIVE?>,'<?php echo encryptDecrypt($subadmin['admin_id']);?>','req/change-user-status','<?=$this->lang->line('confirm_unblock_subadmin')?>','Unblock');"></i></a>
                                        <a href="javascript:void(0);" id ="block_<?=$subadmin['admin_id']?>" class="f-trash hide"><i class="fa fa-ban" aria-hidden="true" onclick="blockUser('subadmin',<?=BLOCKED?>,'<?=encryptDecrypt($subadmin['admin_id'])?>','req/change-user-status','<?=$this->lang->line('confirm_block_subadmin')?>','Block');"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php $count++; }}else{ ?>
                                <tr><td colspan="12">No result found.</td></tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination_wrap clearfix">

                        <?= $link;?>

                    </div>

                </div>
            </div>
            <!--main wrapper close-->
        </div>