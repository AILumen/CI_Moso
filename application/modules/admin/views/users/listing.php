<div class="right-panel">
            <div class="inner-right-panel">

                <!--breadcrumb wrap-->
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>admin/users">Users</a></li>
                        <li class="breadcrumb-item"><a href="<?=base_url()?>admin/users/detail?id=<?=encryptDecrypt($userid)?>">Users Details</a></li>
                        <li class="breadcrumb-item">Total <?=$type?></li>
                    </ol>
                </div>
                <!-- breadcrumb wrap close -->
                <?php
                        if($type == "Reports"){
                    ?>
                <div class="section">
                <!-- <p class="tt-count">Total Users:(10)</p> -->
                <!--table-->
                <div class="table-responsive table-wrapper">
                    <table cellspacing="0" id="example" class="table-custom sortable">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Reported User</th>
                                <th>Reported By</th>
                                <th>Reason</th>
                                <th>Reported On</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                          $count = 1;
                                          foreach ($listing["result"] as $key => $value){
                                  ?>
                            <tr>
                                <td><?=$count?></td>
                                <td><?=$value["reported_user"]?></td>
                                <td><?=$value["reported_by"]?></td>
                                <td><?=$value["reason"]?></td>
                                <td><?= date("d-M-y",$value["created_on"])?></td>
                            </tr>
                            <?php $count++; } ?>
                        </tbody>
                    </table>
                </div>
                <div class="pagination_wrap clearfix">

                     <?php echo $link;?>

                </div>

            </div>
                 <?php
                        }else{
                     ?>
                <div class="form-item-wrap">
                    <div class="form-item-title clearfix">
                        <h3 class="title">Total <?=$type?></h3>
                    </div>
                    <!-- title and form upper action end-->
                    <div class="form-ele-wrapper clearfix pd_form">
                        <div class="row">
                            <!--form view details wrapper-->
                            <div class="col-lg-12 col-sm-12">
                                <?php
                                                foreach ($listing["result"] as $key => $value){
                                       ?>
                                <div class="col-lg-4 col-sm-4 col-xs-12">
                                    <div class="friend_list_panel clearfix">
                                        <figure class="friend_img"><img src="<?=$value['image']?>"></figure>
                                        <div class="friend_name">
                                            <h2>
                                                <?php 
                                                    if($type == "Events"){
                                                        if(strlen($value["evt_name"]) > 50){
                                                            echo substr($value["evt_name"], 0,50) . '...';
                                                        }else{
                                                            echo $value["evt_name"];
                                                        }
                                                    }elseif ($type == "Likes") {
                                                        echo $value['username'];
                                                    }elseif($type = "Followers"){
                                                        echo $value["username"];
                                                    }
                                                ?>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    }
                                ?>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <div class="pagination_wrap clearfix">

                                    <?=$link?>

                                </div>
                            </div>

                            <!--form view details wrapper end-->
                        </div>
                    </div>
                    <!--form element wrapper end-->
                </div>
                <?php } ?>
            </div>
            <!--main wrapper close-->
        </div>