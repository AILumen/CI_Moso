<div class="right-panel">
            <div class="inner-right-panel">

                <!--breadcrumb wrap-->
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Advertisement Settings</a></li>
                        <li class="breadcrumb-item">Manage Settings</li>
                    </ol>
                </div>
                <!-- breadcrumb wrap close -->
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
                <?php if (isset($saveErr)) {?>
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="alert-heading">Opps!</h4>
                    <p><?= $saveErr ?></p>
                </div>
                <?php } ?>
                <!-- //alert -->
                <div class="form-item-wrap">
                    <div class="form-item-title clearfix">
                        <h3 class="title">Event Screen</h3>
                    </div>
                    <?php echo form_open_multipart( 'admin/advertisement/update', array ('id' => 'frequency_update') ); ?>
                    <!-- title and form upper action end-->
                    <div class="form-ele-wrapper clearfix">
                        <div class="row">
                            <!--form ele wrapper-->
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="user-detail-panel clearfix">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="add_panel clearfix">
                                            <div class="col-lg-5 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Frequency</label>
                                                    <div class="input-holder">
                                                        <input type="text" name="event_screen_ad_frequency" value="<?=$data['event_screen_ad_frequency']?>" class="form-control" readonly  id="event">
                                                        <input type="hidden" value="<?=$data['event_screen_ad_frequency']?>" class="form-control" id="event_ac">
                                                        <?php echo form_error( 'event_screen_ad_frequency', '<label class="alert-danger">', '</label>' ); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                     <label>No. of events,after which Ads will appear</label> 
                                                    <div class="input-holder">
                                                        <input type="text" name="event_ad_count" value="<?=$data['event_ad_count']?>" class="form-control" readonly id="event_count">
                                                        <input type="hidden"  value="<?=$data['event_ad_count']?>" class="form-control"  id="event_count_ac">
                                                        <?php echo form_error( 'event_ad_count', '<label class="alert-danger">', '</label>' ); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <span class="app_time_zone" title="Edit" id="edit_event" onclick="editFreequency('event')"><i class="fa fa-pencil"></i></span>
                                                <span class="app_time_zone hide" title="Cancel" id="cancel_edit_event" onclick="cancelEdit('event')"><i class="fa fa-ban"></i></span>
                                            </div>
                                            </div>
                                            
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--form ele wrapper end-->
                    </div>
                    <!--form element wrapper end-->
                </div>
                <div class="form-item-wrap">
                <div class="form-item-title clearfix">
                    <h3 class="title">Pepole Screen</h3>
                </div>
                <!-- title and form upper action end-->
                <div class="form-ele-wrapper clearfix">
                    <div class="row">
                        <!--form ele wrapper-->
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <div class="user-detail-panel clearfix">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="pepole_panel clearfix">
                                        <div class="col-lg-5 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Frequency</label>
                                                <div class="input-holder">
                                                    <input type="text" name="people_screen_ad_frequency" value="<?=$data["people_screen_ad_frequency"]?>" class="form-control" readonly id="people">
                                                    <input type="hidden"  value="<?=$data["people_screen_ad_frequency"]?>" class="form-control"  id="people_ac">
                                                    <?php echo form_error( 'people_screen_ad_frequency', '<label class="alert-danger">', '</label>' ); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                 <label>No.of events,after which Ads will appear</label> 
                                                <div class="input-holder">
                                                    <input type="text" name="people_ad_count" value="<?= $data["people_ad_count"] ?>" class="form-control" readonly id="people_count">
                                                    <input type="hidden" value="<?=$data["people_ad_count"]?>" class="form-control" id="people_count_ac">
                                                    <?php echo form_error( 'people_ad_count', '<label class="alert-danger">', '</label>' ); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <span class="app_time_zone" id="edit_people" title="Edit" onclick="editFreequency('people')"><i class="fa fa-pencil"></i></span>
                                            <span class="app_time_zone hide" id="cancel_edit_people" title="Cancel" onclick="cancelEdit('people')"><i class="fa fa-ban"></i></span>
                                        </div>
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--form ele wrapper end-->
                </div>
                <!--form element wrapper end-->

            </div>

<!-- panel three close -->
    <div class="button-wrap">
        <button type="submit" class="commn-btn save update_add">Save</button>
        <button type="reset" class="commn-btn cancel" onclick='window.location.href = "<?=base_url().$module.'/'.strtolower('dashboard')?>"'>Cancel</button>
    </div>
    <?php echo form_close(); ?>
            </div>
            <!--main wrapper close-->
        </div>