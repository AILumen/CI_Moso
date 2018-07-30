<div class="right-panel">
    <div class="inner-right-panel">

        <!--breadcrumb wrap-->
        <div class="breadcrumb-wrap">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Event Management</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url()?>admin/event">Events Listing</a></li>
                <li class="breadcrumb-item">Events Details</li>
            </ol>
        </div>
        <!-- breadcrumb wrap close -->
        <div class="form-item-wrap">
            <div class="form-item-title clearfix">
                <h3 class="title"><?=$profile["evt_name"]?></h3>
            </div>
            <!-- title and form upper action end-->
            <div class="form-ele-wrapper clearfix">
                <div class="row">
                    <div class="col-lg-4 col-sm-4 col-xs-12">
                        <div class="form-profile-pic-wrapper">
                            <div class="map_panel">
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                    <!--form ele wrapper-->
                    <div class="col-lg-8 col-sm-8 col-xs-12">
                        <div class="user-detail-panel">
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="input-holder">
                                        <span class="icon_pln"><i class="fa fa-map-marker"></i></span>
                                        <span class="text-detail"><?=$profile['evt_address']?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="form-group">

                                    <div class="input-holder">
                                        <span class="icon_pln"><i class="fa fa-calendar"></i></span>
                                        <span class="text-detail"><?=date("jS \of F Y",$profile["evt_createdon"])?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="form-group">

                                    <div class="input-holder">
                                        <span class="icon_pln"><i class="fa fa-clock-o"></i></span>
                                        <span class="text-detail"> <?=date("h:i:s A",$profile["evt_createdon"])?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="subtitle">
                                    <a href="<?=base_url()?>admin/users/detail?id=<?=encryptDecrypt($profile["userid"])?>">
                                       Created By</a>
                                </div>
                                <div class="creat_by clearfix">
                                    <figure class="friend_img"><img src="<?=$profile["image"]?>"></figure>
                                    <div class="friend_name">
                                        <h2><?=$profile["username"]?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="reportCountItemsWrap">
                                    <div class="reportCountItems">
                                        <span class="head">Report Count</span>
                                        <span class="key"><?=$profile["reports"]?></span>
                                    </div>
                                    <div class="reportCountItems">
                                        <span class="head">View Count</span>
                                        <span class="key"><?=$profile["eventview"]?></span>
                                    </div>
                                    <div class="reportCountItems">
                                        <span class="head">Favorite Count</span>
                                        <span class="key"><?=$profile["saved"]?></span>
                                    </div>
                                    <div class="reportCountItems">
                                        <span class="head">Distance (in Miles)</span>
                                        <span class="key"><?=(isset($profile["distance"]) ? round($profile["distance"],2) : "N/A")?></span>
                                    </div>
                                    <div class="reportCountItems">
                                        <span class="head">Event Chat Count</span>
                                        <span class="key"><?=$profile["chat_count"]?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="button-wrap">
                            <button type="submit" onclick="deleteUser('event',<?=DELETED?>,'<?=encryptDecrypt($profile['id'])?>','req/change-user-status','Are you sure you want to delete the selected Event?');" class="commn-btn save">Delete Event</button>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="tab_panel">
                            <ul>
                                <li>
                                    <a href="<?php echo ($profile["likes"] == 0) ? 'javascript:void(0);' : base_url().'admin/event/likes?id='.encryptDecrypt($profile['id'])?>" class="tab_bttn">Likes(<?=$profile["likes"]?>)</a>
                                </li>
                                <li>
                                    <a href="<?php echo ($profile["talking"] == 0) ? 'javascript:void(0);' : base_url().'admin/event/talking?id='.encryptDecrypt($profile['id'])?>" class="tab_bttn">Talking(<?=$profile["talking"]?>)</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--form ele wrapper end-->
            </div>
            <!--form element wrapper end-->
        </div>
        <!-- form view images -->
        <div class="form-item-wrap">
            <div class="form-item-title clearfix">
                <h3 class="title">Images</h3>
            </div>
            <!-- title and form upper action end-->
            <div class="form-ele-wrapper clearfix pd_form">
                <div class="images_gallery_panel">
                    <!--form view details wrapper-->
                    <?php if(count($profile['medialist']['images']) > 0){ ?>
                    <ul>
                        <?php 
                            foreach ($profile["medialist"]['images'] as $key => $value){
                        ?>
                        <li>
                            <div class="img_perview">
                                <img id = "image_"<?=$value["id"]?> src="<?=$value['media_url']?>" alt="">
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                   
                    <?php }else{ ?>
                        <span class="message">
                           No Images found! 
                        </span> 
                        <?php } ?>


                         <?php 
                        if(count($profile['medialist']['images']) > 10){
                    ?>
                    <a href="javascript:void(0);" onclick="underdev()" class="view_more_pl">View More..</a>
                    <?php } ?>
                    <!--form view details wrapper end-->
                </div>
            </div>
            <!--form element wrapper end-->
        </div>
        <!-- form view images close -->
        <!-- form view video -->
        <div class="form-item-wrap">
            <div class="form-item-title clearfix">
                <h3 class="title">Videos</h3>
            </div>
            <!-- title and form upper action end-->
            <div class="form-ele-wrapper clearfix pd_form">
                <div class="images_gallery_panel video_pln">
                    <!--form view details wrapper-->
                    <ul>
                        <?php 
                            if(count($profile['medialist']['videos']) > 0){
                                foreach ($profile['medialist']['videos'] as $key => $videoVal){
                        ?>
                        <li>
                            <div class="img_perview">
                                <video class="video_pln" poster="<?=$videoVal['media_url']?>" controls="">
                                        <source src="<?=$videoVal['media_url']?>" type="video/mp4">                                                                          
                                </video>
                            </div>
                        </li>
                        <?php
                                }
                            }else{
                        ?>
                        <li class="text-detail">
                            No Videos Found
                        </li>
                        <?php } ?>
                    </ul>
                    <?php 
                        if(count($profile['medialist']['videos']) > 0){
                    ?>        
                    <a href="javascript:void(0);" onclick="underdev()" class="view_more_pl">View More..</a>
                    <?php } ?>


                    <!--form view details wrapper end-->
                </div>
            </div>
        </div>
        <!-- form view close video -->
        <div class="form-item-wrap chat_panel">
                    <div class="form-item-title clearfix">
                        <h3 class="title">Event Chat Room</h3>
                        <span class="chat_icon"><i class="fa fa-angle-double-right"></i></span>
                    </div>
                    <!-- title and form upper action end-->
                    <div class="chat_panel_wrapper">
                        <div class="message_wrapper clearfix">
                            <?php
                                        if($profile["chat_count"] > 0){
                                            foreach ($profile["chat"] as $message){
                                  ?>
                            <ul>
                                <?php 
                                            if($message["id"] == $profile["userid"]){
                                       ?>
                                <li class="sent">
                                    <div class="sent_pl">
                                        <img src="<?=$message["avatar"]?>" alt="<?=$profile["username"]?>">
                                        <h3><?=$profile["username"]?></h3>
                                        <p><?=$message["text"]?></p>
                                    </div>
                                </li>
                                <?php }else{?>
                                <li class="replie">
                                    <div class="replay_pl">
                                        <img src="<?=$message["avatar"]?>" alt="<?=$profile["userid"]?>">
                                        <p><?=$message["text"]?></p>
                                    </div>
                                </li>
                                <?php }}}else{ echo "No Chats Yet!"; }?>
                            </ul>
                        </div>
                    </div>
                </div>
    </div>
    <!--main wrapper close-->
</div>  
        <script>
            //load map
            mapboxgl.accessToken = 'pk.eyJ1IjoibW9yZXNvY2lhbCIsImEiOiJjamRjdXNwaTQwN3AwMnFxemQ2MTJqOGhiIn0.mXR0h9sLXmO1YUsdU7CAww';
            var map = new mapboxgl.Map({
                container: 'map',
                zoom: 10, //Set default zoom value
                center : [<?=$profile['evt_longitude']?>,<?=$profile['evt_latitude']?>], // set center coordinates of the map
                style: 'mapbox://styles/mapbox/streets-v9'
            });
            //Load marker on map
            map.on('load', function() {
                map.loadImage('https://i.imgur.com/MK4NUzI.png', function(error, image) { // load pointer image
                    if (error) throw error;
                    map.addImage('pointer', image); // add image to the map
                    map.addLayer({ // add layers to the map
                        "id": "points",
                        "type": "symbol",
                        "source": {
                            "type": "geojson",
                            "data": {
                                "type": "FeatureCollection",
                                "features": [{
                                    "type": "Feature",
                                    "geometry": {
                                        "type": "Point",
                                        "coordinates": [<?=$profile['evt_longitude']?>,<?=$profile['evt_latitude']?>] //set location coordinatess
                                    }
                                }]
                            }
                        },
                        "layout": {
                            "icon-image": "pointer",
                            "icon-size": 0.75 // set pointer size
                        }
                    });
                });
            });
</script>