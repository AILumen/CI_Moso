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

        <!--breadcrumb wrap-->
        <div class="breadcrumb-wrap">
            <ol class="breadcrumb">
                <!-- <li class="breadcrumb-item"><a href="javascript:void(0);">Version Management</a></li> -->
                <li class="breadcrumb-item">Notification</li>
            </ol>
        </div>

        <!--Filter Section -->
        <div class="section filter-section clearfix">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="srch-wrap fawe-icon-position col-sm-space">
                        <span class="fawe-icon fawe-icon-position-left search-ico"><i class="fa fa-search"></i></span>
                        <span class="fawe-icon fawe-icon-position-right close-ico"><i class="fa fa-times-circle"></i></span>
                        <input type="text" maxlength="50" value="<?php echo (isset($searchlike) && !empty($searchlike))? $searchlike:''?>" class="search-box searchlike" placeholder="Search by Title" id="searchuser" name="search">
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <div class="circle-btn-wrap col-sm-space">
                        <a href="<?=base_url()?>admin/notification/add "class="circle-btn" title="Send Notification">
                            <img src="<?= base_url()?>public/images/send-mail.svg">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--Filter Section Close-->
        <div class="section">
            <!-- <p class="tt-count">Total Users:(10)</p> -->
            <!--table-->
            <div class="table-responsive table-wrapper">
                <table cellspacing="0" id="example" class="table-custom sortable">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Title</th>
                            <th>Platform</th>
                            <th>User's Sent Count</th>
                            <th>Created date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($notiList)){ $count = 1; foreach ($notiList as $key => $value){?>
                        <tr>
                            <td><?=$count?></td>
                            <td><?=$value["title"]?></td>
                            <td><?=($value["platform"] == 1) ? "All" : ($value["platform"] == 2) ? "Android" : "iOS"?></td>
                            <td><?=$value["total_sents"]?></td>
                            <td><?=date('d-M-y',$value['created_on']); ?></td>
                        </tr>
                        <?php $count++; }}else{ ?>
                            <tr><td colspan="12">No result found.</td></tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="pagination_wrap clearfix">

                <?=$links?>

            </div>

        </div>
    </div>
            <!--main wrapper close-->
</div>