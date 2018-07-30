<div class="right-panel">
            <div class="inner-right-panel">

                <!--breadcrumb wrap-->
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Event Management</a></li>
                        <li class="breadcrumb-item"><a href="<?=base_url()?>admin/event">Events Listing</a></li>
                        <li class="breadcrumb-item"><a href="<?=base_url()?>admin/event/detail?id=<?= encryptDecrypt($eventid)?>">Events Details</a></li>
                        <li class="breadcrumb-item"><?=$type?></li>
                    </ol>
                </div>
                <!-- breadcrumb wrap close -->
                <div class="form-item-wrap">
                    <div class="form-item-title clearfix">
                        <h3 class="title"><?=$type?></h3>
                    </div>
                    <!-- title and form upper action end-->
                    <div class="form-ele-wrapper clearfix pd_form">
                        <div class="row">
                            <!--form view details wrapper-->
                            <div class="col-lg-12 col-sm-12">
                                <?php 
                                    foreach ($listing as $value){
                                ?>
                                <div class="col-lg-4 col-sm-4 col-xs-12">
                                    <div class="friend_list_panel clearfix">
                                        <figure class="friend_img"><img src="<?=$value['image']?>"></figure>
                                        <div class="friend_name">
                                            <h2><?=$value['username']?></h2>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <!--form view details wrapper end-->
                        </div>
                    </div>
                    <!--form element wrapper end-->
                </div>
            </div>
            <!--main wrapper close-->
        </div>