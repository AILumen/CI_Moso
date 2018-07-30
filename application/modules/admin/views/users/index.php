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
    <?php if ( null !== $this->session->flashdata("message")) { 
        $error = $this->session->flashdata("message");
        print_r($error);die;
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
                <li class="breadcrumb-item">Users</li>
            </ol>
        </div>

<!--Filter Section -->
        <div class="section filter-section clearfix">
            <div class="row">
                <div class="col-lg-2 col-sm-2">
                    <div class="display col-sm-space">
                        <select class="form-control dispLimit">
                            <option <?php echo ($limit == 10)?'Selected':'' ?> value="10">Display 10</option>
                            <option <?php echo ($limit == 20)?'Selected':'' ?> value="20">Display 20</option>
                            <option <?php echo ($limit == 50)?'Selected':'' ?> value="50">Display 50</option>
                            <option <?php echo ($limit == 100)?'Selected':'' ?> value="100">Display 100</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-7 col-sm-7">
                    <div class="srch-wrap fawe-icon-position col-sm-space">
                        <span class="fawe-icon fawe-icon-position-left search-ico"><i class="fa fa-search"></i></span>
                        <span class="fawe-icon fawe-icon-position-right close-ico"><i class="fa fa-times-circle"></i></span>
                        <!-- <button class="srch search-icon" style="cursor:default"></button>
                                 <a href="javascript:void(0)"> <span class="srch-close-icon searchCloseBtn"></span></a> -->
                        <input type="text" maxlength="15" value="<?php echo (isset($searchlike) && !empty($searchlike))? $searchlike:''?>" class="search-box searchlike" placeholder="Search by Name, ID" id="searchuser" name="search">
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3">
                    <div class="circle-btn-wrap col-sm-space">
                        <a href="javascript:void(0)" id="filter-side-wrapper" class="tooltip-p">
                            <div class="circle-btn animate-btn" title="Filter">
                                <i class="fa fa-filter" aria-hidden="true"></i>
                            </div>

                        </a>
                        <a href="javascript:void(0);" class="circle-btn exportCsv">
                            <img src="<?=base_url()?>public/images/save.svg">
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
                    <div class="col-lg-4 col-sm-4 col-xs-12">
                        <div class="fltr-field-wrap">
                            <label class="admin-label">Registration Date</label>
                            <div class="inputfield-wrap calendersec">
                                <input type="text" name="startDate" value="<?=(isset($filterArr->startDate)) ? $filterArr->startDate : ""?>" class="startDate" id="startDate" placeholder="From" readonly>
                                <span class="cal_bg"></span>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-xs-12">
                        <div class="fltr-field-wrap pd_fl">
                            <div class="inputfield-wrap calendersec">
                                <input type="text" name="endDate" data-provide="datepicker" value="<?=(isset($filterArr->endDate)) ? $filterArr->endDate : ""?>" class="endDate" id="endDate" placeholder="To" readonly>
                                <span class="cal_bg"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-xs-12">
                        <div class="fltr-field-wrap">
                            <label class="admin-label">Registration Modal</label>
                            <div class="commn-select-wrap">
                                <select class="form-control filter social">
                            <option value="">Select</option>
                            <option <?php echo (isset($social) && $social == 1)?'Selected':'' ?> value="1">Manual</option>
                            <option <?php echo (isset($social) && $social == 2)?'Selected':'' ?> value="2">Facebook</option>
                            <option <?php echo (isset($social) && $social == 3)?'Selected':'' ?> value="3">Instagram</option>
                        </select>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-4 col-xs-12">
                        <div class="fltr-field-wrap">
                            <label class="admin-label">Reports against user</label>
                            <div class="commn-select-wrap">
                                <select class="form-control filter reports" name="reports">
                                    <option value="">All</option>
                                    <option <?php echo ($reports == 5)?'selected':'' ?> value="5">5+ Reports</option>
                                    <option <?php echo ($reports == 10)?'selected':'' ?> value="10">10+ Reports</option>
                                    <option <?php echo ($reports == 20)?'selected':'' ?> value="20">20+ Reports</option>
                                    <option <?php echo ($reports == 40)?'selected':'' ?> value="40">40+ Reports</option>
                                    <option <?php echo ($reports == 50)?'selected':'' ?> value="50">50+ Reports</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-xs-12">
                        <div class="fltr-field-wrap">
                            <label class="admin-label">Last Login</label>
                            <div class="commn-select-wrap">
                                <select class="form-control filter lastlogin" name="lastlogin">
                                    <option value="">All</option>
                                    <option <?=(isset($filterArr->lastlogin) && $filterArr->lastlogin == "today") ? "selected" : ""?> value="today">Today</option>
                                    <option <?=(isset($filterArr->lastlogin) && $filterArr->lastlogin == "yesterday") ? "selected" : ""?> value="yesterday">Yesterday</option>
                                    <option <?=(isset($filterArr->lastlogin) && $filterArr->lastlogin == "week") ? "selected" : ""?> value="week">Week Ago</option>
                                    <option <?=(isset($filterArr->lastlogin) && $filterArr->lastlogin == "month") ? "selected" : ""?> value="month">Month Ago</option>
                                    <option <?=(isset($filterArr->lastlogin) && $filterArr->lastlogin == "year") ? "selected" : ""?> value="year">Year Ago</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-xs-12">
                        <div class="fltr-field-wrap">
                            <label class="admin-label">Status</label>
                            <div class="commn-select-wrap">
                                <select class="form-control filter status" name="status">
                                    <option value="">All</option>
                                    <option <?= ($status == 2)?'selected':'' ?> value="2">Active</option>
                                    <option <?= ($status == 1)?'selected':'' ?> value="1">Inactive</option>
                                    <option <?= ($status == 8)?'selected':'' ?> value="8">Reported</option>
                                    <option <?= ($status == 3)?'selected':'' ?> value="3">Deleted</option>
                                    <option <?= ($status == 5)?'selected':'' ?> value="5">Temporarily Blocked</option>
                                    <option <?= ($status == 4)?'selected':'' ?> value="4">Blocked</option>
                                    <option <?= ($status == 7)?'selected':'' ?> value="7">Ghost Banned</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="custom-checkbox">
                            <input type="checkbox" name="check_feed" id="check_feed" class="filled-in check child" value="true" data-parent="" <?=(isset($filterArr->feed) && $filterArr->feed) ? "checked" : ''?>>
                            <label for="check_feed" class="strong-label" title="Users who have submitted feedback">Feedback Submitted</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" name="check_block"  id="check_block" class="filled-in check child" value="true" data-parent="" <?=(isset($filterArr->block) && $filterArr->block) ? "checked" : ''?>>
                            <label for="check_block" class="strong-label" title="Users who have blocked a user">Blocked a user</label>
                        </div>
                    </div>
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
                            <th>Sr.No</th>
                            <th>
                                <?php if(isset($userlist) && count($userlist) > 0){?>
                                <a href="<?=base_url()?>admin/user?field=name&order=<?=$order_by.$get_query ?>" class="sort <?php echo $order_by_name; ?>"><?="User Name"?></a>
                                <?php }else{ echo "User Name"; }?>
                            </th>
                            <th>Email ID</th>
                            <th>Mobile Number</th>
                            <th>Live Events</th>
                            <th>Followers</th>
                            <th>Registered Via</th>
                            <th>Last Login</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($userlist) && count($userlist) > 0){
                            if ($page > 1){
                                $i = (($page * $limit)- $limit) + 1;
                            } else {
                                $i = 1;
                            }
                            foreach($userlist as $value){
                        ?>
                        <tr id ="remove_<?=$value['userid']?>" >

                            <td><?=$i?></td>
                            <td>
                                <?php 
                                    if($value['status'] == '2'){
                                        echo ucfirst($value['username']); 
                                    }else{
                                ?>
                                <a href="<?php echo base_url()?>admin/users/detail?id=<?php echo encryptDecrypt($value['userid']); ?>"><?php echo ucfirst($value['username']); ?></a>
                                <?php } ?>
                    </td>
                    <td><?php echo $value['email'];?></td>
                    <td><?php echo !empty($value['contact'])?$value['contact']:"Not Available";?></td>
                    <td><?=$value['event']?></td>
                    <td><?=$value['follower']?></td>
                    <td>
                        <?php if($value['social_type'] == 1){
                            echo 'Email Address/Phone Number';
                        }elseif($value['social_type'] == 2){
                            echo 'Facebook';
                        }elseif ($value['social_type'] == 3){
                            echo 'Instagram';
                        }?>
                    </td>
                    <td><?=(isset($value["login_time"]) && !empty($value["login_time"])) ? date("d-M-y | h:i:s A", $value["login_time"]) : "N/A" ?></td>
                    <td id ="status_<?= $value['userid'];?>"><?php if($value['status'] == '1'){echo "Active";}elseif($value['status'] == '3'){echo "Blocked";}elseif($value['status'] == '4'){echo 'Blocked(Login Attempts Failed)';}elseif($value['status'] == '2'){echo 'Deleted';}else{ echo 'Inactive';}?></td>
                    <td class=" table-action">
                    <?php 
                        if($value['status'] == 2){
                        ?>
                    <i class="fa fa-ban" aria-hidden="true"></i>
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    <?php }else{?>
                        <?php if($value['status'] == "3" || $value['status'] == "4"){ ?>
                            <a href="javascript:void(0);" id ="unblock_<?=$value['userid']?>" class="f-trash"><i class="fa fa-unlock" aria-hidden="true" onclick="blockUser('user',<?=ACTIVE?>,'<?php echo encryptDecrypt($value['userid']);?>','req/change-user-status','<?=$this->lang->line('confirm_un_block')?>','Unblock');"></i></a>
                        <?php }else{ ?>
                            <a href="javascript:void(0);" id ="block_<?=$value['userid']?>" class="f-trash"><i class="fa fa-ban" aria-hidden="true" onclick="blockUser('user',<?=BLOCKED?>,'<?=encryptDecrypt($value['userid'])?>','req/change-user-status','<?=$this->lang->line('confirm_block')?>','Block');"></i></a>
                        <?php } ?>
                        <a href="javascript:void(0);" id ="unblock_<?= $value['userid']?>" class="f-trash hide"><i class="fa fa-unlock" aria-hidden="true" onclick="blockUser('user',<?=ACTIVE?>,'<?php echo encryptDecrypt($value['userid']);?>','req/change-user-status','<?=$this->lang->line('confirm_un_block')?>','Unblock');"></i></a>
                        <a href="javascript:void(0);" id ="block_<?= $value['userid']?>" class="f-trash hide"><i class="fa fa-ban" aria-hidden="true" onclick="blockUser('user',<?=BLOCKED?>,'<?=encryptDecrypt($value['userid'])?>','req/change-user-status','<?=$this->lang->line('confirm_block')?>','Block');"></i></a>
                        <a href="javascript:void(0);" class="f-trash"><i class="fa fa-trash" aria-hidden="true" onclick="deleteUser('user',<?=DELETED?>,'<?php echo encryptDecrypt($value['userid']);?>','req/change-user-status','<?=$this->lang->line('confirm_delete')?>');"></i></a>
                        <?php } ?>
                    </td>
                        </tr>
                        <?php
                            $i++; 
                            } } else { ?>
                        <tr><td colspan="12">No result found.</td></tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="pagination_wrap clearfix">

                 <?php echo $link;?>

            </div>

        </div>
    </div>
</div>
<!-- JS Plugin -->
<script src="<?php echo base_url()?>public/js/global-msg.js"></script>
<!-- JS Plugin -->