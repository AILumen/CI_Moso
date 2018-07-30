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
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin/users">Users</a></li>
                        <li class="breadcrumb-item">Users Detail</li>
                    </ol>
                </div>
                <!-- breadcrumb wrap close -->
                <div class="form-item-wrap">
                    <div class="form-item-title clearfix">
                        <h3 class="title">User Detail</h3>
                    </div>
                    <!-- title and form upper action end-->
                    <div class="form-ele-wrapper clearfix">
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-xs-12">
                                <div class="form-profile-pic-wrapper">
                                    <div class="profile-pic" style="background:url('<?php echo (!empty($profile['image'])) ? $profile['image'] : '' ?>'); background-size: 180px 180px;">
                                    </div>
                                </div>
                            </div>
                            <!--form ele wrapper-->
                            <div class="col-lg-8 col-sm-8 col-xs-12">
                                <div class="user-detail-panel">
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>User ID</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?=ucfirst($profile['userid']);?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?=$profile['username']?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Email ID</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?php echo !empty($profile['email']) ? $profile['email'] : "N/A"?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Location</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?php echo !empty($profile['address']) ? $profile['address'] : "N/A"?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Mobile Number </label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?php echo !empty($profile['contact']) ? $profile['contact'] : "N/A"?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Total Likes</label>
                                            <div class="input-holder">
                                                <span class="text-detail">
                                                    <?php 
                                                        if(($profile['likes']) == 0){
                                                            echo ($profile['likes']);
                                                        }else{
                                                    ?>
                                                    <a href="<?php echo base_url()?>admin/users/like?id=<?=encryptDecrypt($user_id);?>" id ="follower_<?=$user_id?>">
                                                        <b>
                                                            <?=($profile['likes'])?>
                                                        </b>
                                                    </a>
                                                    <?php } ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Total Followers</label>
                                            <div class="input-holder">
                                                <span class="text-detail">
                                                 <?php
                                                                if(($profile['follower']) == 0){
                                                                     echo ($profile['follower']);
                                                                }else{
                                                            ?>
                                                <a href="<?php echo base_url()?>admin/users/follower?id=<?=encryptDecrypt($user_id);?>" id ="follower_<?=$user_id?>">
                                                    <b>
                                                        <?=($profile['follower'])?>
                                                    </b>
                                                </a>
                                                <?php } ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Total Events</label>
                                            <div class="input-holder">
                                                <span class="text-detail">
                                                <?php 
                                                                if($profile['event'] == 0){
                                                                    echo $profile['event'];
                                                                }else{
                                                            ?>
                                                <a href="<?php echo base_url()?>admin/users/event?id=<?=encryptDecrypt($user_id);?>" id ="event_<?=$user_id?>">
                                                    <b>
                                                        <?=$profile['event']?>
                                                    </b>
                                                </a>
                                                <?php } ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Reported Count</label>
                                            <div class="input-holder">
                                                <span class="text-detail">
                                                <?php 
                                                                if($profile['reported_count'] == 0){
                                                                    echo $profile['reported_count'];
                                                                }else{
                                                            ?>
                                                  <a href="<?php echo base_url()?>admin/users/report?id=<?=encryptDecrypt($user_id);?>" id ="report_<?=$user_id?>">
                                                    <b>
                                                        <?=$profile['reported_count']?>
                                                    </b>
                                                </a>
                                                <?php } ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Profile Views</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?=$profile["profile_view"] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label title="No. Of times user has been blocked Manually">Manually Blocked</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?=$profile["block_count"] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label title="No. Of times user has been blocked Automatically">Automatically Blocked</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?=$profile["auto_block"] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Bio</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?php echo !empty($profile['userbio']) ? $profile['userbio'] : "N/A" ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Registered on</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?= date("jS \of F Y", $profile["createdon"])?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Chat Posted in Events</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?= $profile["chat_count"]?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Registration Mode</label>
                                            <div class="input-holder">
                                                <span class="text-detail">
                                                <?php 
                                                    if($profile['social_type'] == 1){
                                                        echo "Manual";
                                                    }elseif ($profile['social_type'] == 2) {
                                                        echo "Facebook";
                                                    }elseif ($profile['social_type'] == 3) {
                                                        echo "Instagram";
                                                    }else{
                                                        echo "N/A";
                                                    }
                                                ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                                if(!empty($profile["facebookprof"]) || !empty($profile["instaprof"])){
                                            ?>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Social Media</label>
                                            <div class="input-holder">
                                                <span class="text-detail">
                                                    <?php
                                                                    if(!empty($profile["facebookprof"]) && $profile["facebookprof"]!= ''){
                                                               ?>
                                                    <a href="<?=$profile["facebookprof"]?>" target="_balnk"><i class="fa fa-facebook"></i></a>
                                                    <?php } 
                                                                if(isset($profile["instaprof"]) && $profile["instaprof"]!= ''){
                                                                ?>
                                                    <a href="<?=$profile["instaprof"]?>" target="_balnk"><i class="fa fa-instagram"></i></a>
                                                    <?php } ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Last Seen</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?= date("d-M-y | h:i:s A", $profile["last_seen"]) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="input-holder">
                                                <span class="text-detail" id = "status_<?=$profile['userid']?>">
                                                    <?php
                                                        if($profile['status'] == '1'){
                                                            echo "Active";
                                                        }elseif($profile['status'] == '3'){
                                                            echo "Blocked";                                                           
                                                        }elseif($profile['status'] == '4'){
                                                            echo "Temporarily Blocked";
                                                        }elseif($profile['status'] == '6'){
                                                            echo "Ghost Banned";
                                                        }elseif($profile['status'] == '7'){
                                                            echo "Reported";
                                                        }else{
                                                            echo 'Inactive';
                                                        }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="button-wrap">
                                    <?php if($profile['status'] == '3'){?>
                                    <button type="button"  id ="unblock_<?=$profile['userid']?>" onclick="blockUser('user',<?=ACTIVE?>,'<?php echo encryptDecrypt($profile['userid']);?>','req/change-user-status','<?=$this->lang->line('confirm_un_block')?>','Unblock');" class="commn-btn cancel">Un-Block</button>
                                    <?php }else{ ?>
                                    <button type="button" id ="block_<?=$profile['userid']?>" onclick="blockUser('user',<?=BLOCKED?>,'<?=encryptDecrypt($profile['userid'])?>','req/change-user-status','<?=$this->lang->line('confirm_block')?>','Block');" class="commn-btn cancel">Block</button>
                                    <?php } ?>
                                    <button type="button" id ="block_<?=$profile['userid']?>" onclick="blockUser('user',<?=BLOCKED?>,'<?=encryptDecrypt($profile['userid'])?>','req/change-user-status','<?=$this->lang->line('confirm_block')?>','Block');" class="commn-btn cancel hide">Block</button>
                                    <button type="button" id ="unblock_<?=$profile['userid']?>" onclick="blockUser('user',<?=ACTIVE?>,'<?=encryptDecrypt($profile['userid'])?>','req/change-user-status','<?=$this->lang->line('confirm_un_block')?>','Unblock');" class="commn-btn cancel hide">Un-Block</button>
                                    <button type="submit" onclick="deleteUser('user',<?=DELETED?>,'<?=encryptDecrypt($profile['userid'])?>','req/change-user-status','<?=$this->lang->line('confirm_delete')?>');" class="commn-btn save">Delete</button>
                                </div>
                            </div>
                        </div>
                        <!--form ele wrapper end-->
                    </div>
                    <!--form element wrapper end-->
                </div>
            </div>
            <!--main wrapper close-->
        </div>