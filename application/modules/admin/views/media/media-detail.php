<div class="right-panel">
            <div class="inner-right-panel">

                <!--breadcrumb wrap-->
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Media Management</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url()?>admin/media">Media Listing</a></li>
                        <li class="breadcrumb-item">Media Detail</li>
                    </ol>
                </div>
                <!-- breadcrumb wrap close -->
                <div class="form-item-wrap">
                    <div class="form-item-title clearfix">
                        <h3 class="title">Media Detail</h3>
                    </div>
                    <!-- title and form upper action end-->
                    <div class="form-ele-wrapper clearfix">
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-xs-12">
                                <div class="form-profile-pic-wrapper">
                                    <div class="profile-pic" style="background-image:url('<?=$mediaInfo['result']['media_url']?>');">
                                        <!-- <a href="javascript:void(0);" class="upimage-btn">
                            <img src="images/photo-camera.svg">
                            <input type="file" id="uploadPic">
                        </a> -->
                                    </div>
                                </div>
                            </div>
                            <!--form ele wrapper-->
                            <div class="col-lg-8 col-sm-8 col-xs-12">
                                <div class="user-detail-panel">
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <div class="input-holder">
                                                <span class="text-detail">
                                                    <?= ($mediaInfo['result']['media_type'] == 1) ? 'Image' : 'Video'?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Size</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?= round($mediaInfo['result']['media_size']/1024,2)?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Uploaded By </label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?=$mediaInfo['result']['username']?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Uploaded on</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?=date('Y-m-d',$mediaInfo['result']['createdon'])?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Total Likes</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><a href="javascript:void(0);" onclick="underdev()"><?=$mediaInfo['result']['likes']?></a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Total Reported Count</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><a href="javascript:void(0);" onclick="underdev()"><?=$mediaInfo['result']['reported']?></a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Event Name</label>
                                            <div class="input-holder">
                                                <span class="text-detail"><?=$mediaInfo['result']['evt_name']?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="button-wrap">
<!--                                    <button type="submit" class="commn-btn save">Report Media</button>-->
                                    <button type="submit" class="commn-btn save" onclick="deleteUser('media',<?php echo DELETED;?>,'<?= encryptDecrypt($mediaInfo['result']['id']);?>','req/change-user-status','Are you sure you want to delete the selected Media?');">Delete Media</button>
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