<div class="right-panel">
            <div class="inner-right-panel">

                <!--breadcrumb wrap-->
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Algorithm Settings</a></li>
                        <li class="breadcrumb-item">Manage Settings</li>
                    </ol>
                </div>
                <!-- breadcrumb wrap close -->
                <div class="form-item-wrap algo_tab_panel">
                    <div class="form-item-title clearfix open">
                        <h3 class="title">Event Algorithm</h3>
                        <span class="tab_icon"><i class="fa fa-angle-double-right"></i></span>
                    </div>
                    <!-- title and form upper action end-->
                    <div class="form-ele-wrapper clearfix" style="display:block;">
                        <div class="row">
                            <!--form ele wrapper-->
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="user-detail-panel algo_panel">
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Default Radius</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="<?=$app_settings["default_radius"]?>" placeholder="<?=$app_settings["default_radius"]?>">
                                                <span class="input_unit">Miles</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Minimum Radius</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="<?=$app_settings["min_radius"]?>" placeholder="<?=$app_settings["min_radius"]?>">
                                                <span class="input_unit">Miles</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Viral Users Pool</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="<?=$app_settings["viral_user_pool"]?>" placeholder="<?=$app_settings["viral_user_pool"]?>">
                                                <span class="input_unit">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>New Users Pool</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="<?=$app_settings["new_user_pool"]?>" placeholder="<?=$app_settings["new_user_pool"]?>">
                                                <span class="input_unit">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Event Creation Radius</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="<?=$app_settings["event_create_distance"]?>" placeholder="<?=$app_settings["event_create_distance"]?>">
                                                <span class="input_unit">Miles</span>
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
                <!-- panel 1 close  -->
                <div class="form-item-wrap algo_tab_panel">
                    <div class="form-item-title clearfix">
                        <h3 class="title">People Algorithm</h3>
                        <span class="tab_icon"><i class="fa fa-angle-double-right"></i></span>
                    </div>
                    <!-- title and form upper action end-->
                    <div class="form-ele-wrapper clearfix">
                        <div class="row">
                            <!--form ele wrapper-->
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="user-detail-panel algo_panel">
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Default Radius</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="<?=$app_settings["default_radius"]?>" placeholder="<?=$app_settings["default_radius"]?>">
                                                <span class="input_unit">Miles</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>New Users Hours </label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="<?=($app_settings["new_user_time"]/3600)?>" placeholder="<?=$app_settings["new_user_time"]/3600?>">
                                                <span class="input_unit">Hours</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Viral Users Pool</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="<?=$app_settings["viral_user_pool"]?>" placeholder="<?=$app_settings["viral_user_pool"]?>">
                                                <span class="input_unit">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>New Users Pool</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="<?=$app_settings["new_user_pool"]?>" placeholder="<?=$app_settings["new_user_pool"]?>">
                                                <span class="input_unit">%</span>
                                            </div>
                                        </div>
                                    </div>
<!--                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Active Days</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="4">
                                                <span class="input_unit">Miles</span>
                                            </div>
                                        </div>
                                    </div>-->

                                </div>
                            </div>

                        </div>
                        <!--form ele wrapper end-->
                    </div>
                    <!--form element wrapper end-->
                </div>
                <!-- panel 2 close -->
                <div class="form-item-wrap algo_tab_panel">
                    <div class="form-item-title clearfix">
                        <h3 class="title">Notification Algorithm</h3>
                        <span class="tab_icon"><i class="fa fa-angle-double-right"></i></span>
                    </div>
                    <!-- title and form upper action end-->
                    <div class="form-ele-wrapper clearfix">
                        <div class="row">
                            <!--form ele wrapper-->
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <h3 class="hd_tbl pd_rg">Feedback Notification</h3>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="user-detail-panel algo_panel">
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>First Session</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="6">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <h3 class="hd_tbl pd_rg">Positive Action</h3>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="user-detail-panel algo_panel">
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Likes</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="<?=$app_settings["max_likes"]?>" placeholder="<?=$app_settings["max_likes"]?>">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Followers</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="<?=$app_settings["max_follows"]?>" placeholder="<?=$app_settings["max_follows"]?>">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Profile Visits</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="<?=$app_settings["max_profiles_views"]?>" placeholder="<?=$app_settings["max_profiles_views"]?>">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Users Scrolled</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="30">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Sessions</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="4">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Max Notifications</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="4">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <h3 class="hd_tbl pd_rg">App Sharing Notification </h3>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="user-detail-panel algo_panel">
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Event Post</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="6">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <h3 class="hd_tbl pd_rg">Viral Notification</h3>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="user-detail-panel algo_panel">
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Radius</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="6">
                                                <span class="input_unit">Miles</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Daily Notification Limit</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="3">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <h3 class="hd_tbl pd_rg">Event Driven Notification</h3>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="user-detail-panel algo_panel">
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Daily Notification Limit Weekly</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="6">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Daily Notification Limit Daily </label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="3">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <h3 class="hd_tbl pd_rg">Profile Driven Notification</h3>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="user-detail-panel algo_panel">
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Daily Notification Limit Weekly</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="6">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Daily Notification Limit Daily </label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="3">

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
                <!-- panel 3 close -->
                <div class="form-item-wrap algo_tab_panel">
                    <div class="form-item-title clearfix">
                        <h3 class="title">Event End Algorithm</h3>
                        <span class="tab_icon"><i class="fa fa-angle-double-right"></i></span>
                    </div>
                    <!-- title and form upper action end-->
                    <div class="form-ele-wrapper clearfix">
                        <div class="row">
                            <!--form ele wrapper-->
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="user-detail-panel algo_panel">
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Radius</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="6">
                                                <span class="input_unit">Miles</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Minimum Criteria</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="3">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Likes</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="60">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Followers</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="30">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Number of Reports/End Event Request</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="4">

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
                <!-- panel 4 close -->
                <div class="form-item-wrap algo_tab_panel">
                    <div class="form-item-title clearfix">
                        <h3 class="title">Advertisement Algorithm</h3>
                        <span class="tab_icon"><i class="fa fa-angle-double-right"></i></span>
                    </div>
                    <!-- title and form upper action end-->
                    <div class="form-ele-wrapper clearfix">
                        <div class="row">
                            <!--form ele wrapper-->
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="user-detail-panel algo_panel">
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Minimum Session</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="6">


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Users Scrolled</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="3">


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
                <!-- panel 5 close -->
                <div class="form-item-wrap algo_tab_panel">
                    <div class="form-item-title clearfix">
                        <h3 class="title">Ghost Banned Algorithm</h3>
                        <span class="tab_icon"><i class="fa fa-angle-double-right"></i></span>
                    </div>
                    <!-- title and form upper action end-->
                    <div class="form-ele-wrapper clearfix">
                        <div class="row">
                            <!--form ele wrapper-->
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="user-detail-panel algo_panel">
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Reports</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="6">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Whitelisted Users Reports</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="3">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Media Delete</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="60">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Time Period</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="30">

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
                <!-- panel 6 close -->
                <div class="form-item-wrap algo_tab_panel">
                    <div class="form-item-title clearfix">
                        <h3 class="title">Search Algorithm</h3>
                        <span class="tab_icon"><i class="fa fa-angle-double-right"></i></span>
                    </div>
                    <!-- title and form upper action end-->
                    <div class="form-ele-wrapper clearfix">
                        <div class="row">
                            <!--form ele wrapper-->
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="user-detail-panel algo_panel">
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Radius</label>
                                            <div class="input-holder">
                                                <input type="text" name="" value="" placeholder="30">
                                                <!-- <span class="input_unit">%</span> -->
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
                <!-- panel 7 close -->
                <div class="button-wrap">
                    <button type="submit" class="commn-btn save">Save</button>
                    <button type="submit" class="commn-btn cancel">Cancel</button>
                </div>
            </div>
            <!--main wrapper close-->
        </div>