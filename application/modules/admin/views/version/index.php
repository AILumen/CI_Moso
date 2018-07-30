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
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Version Management</a></li>
                        <li class="breadcrumb-item">Version Listing</li>
                    </ol>
                </div>

                <!--Filter Section -->
                <div class="section filter-section clearfix">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="srch-wrap fawe-icon-position col-sm-space">
                                <span class="fawe-icon fawe-icon-position-left search-ico"><i class="fa fa-search"></i></span>
                                <span class="fawe-icon fawe-icon-position-right close-ico"><i class="fa fa-times-circle"></i></span>
                                <!-- <button class="srch search-icon" style="cursor:default"></button>
                                         <a href="javascript:void(0)"> <span class="srch-close-icon searchCloseBtn"></span></a> -->
                                <input type="text" maxlength="15" value="<?php echo (isset($searchlike) && !empty($searchlike))? $searchlike:''?>" class="search-box searchlike" placeholder="Search by Name,ID" id="searchuser" name="search">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="circle-btn-wrap col-sm-space">
<!--                                <a href="javascript:void(0);" class="circle-btn">
                                    <img src="<?= base_url()?>public/images/save.svg">
                                </a>-->
                                <a href="<?= base_url()?>admin/version/add" class="circle-btn">
                                    <img src="<?= base_url()?>public/images/add.svg">
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
                                    <th>
                                        Version Name
                                    </th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th> Platform </th>
                                    <th>Is Current Version </th>
                                    <th>Created date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                            if(empty($version)){
                                       ?>
                                <tr><td colspan="12">No result found.</td></tr>
                                <?php }else{  
                                            $srn = 1;
                                            foreach ($version as $value){
                                       ?>
                                <tr>

                                    <td><?=$srn?></td>
                                    <td><?=$value['name']?></td>
                                    <td><?=$value['title']?></td>
                                    <td><span class="table_view_pln"><?= substr($value['description'], 0,40)?></span></td>
                                    <td><?=($value['platform'] == "1") ? "Android" : "IOS"?></td>
                                    <td><?=($value['is_current'] == "1") ? "Yes" : "No"?> </td>
                                    <td><?= date('d-M-Y', $value['created_on'])?> </td>
                                    <td class=" table-action">
                                        <a href="javascript:void(0);" class="f-trash" ><i class="fa fa-trash" title="Delete" onclick="deleteContent('version',<?=DELETED?>,'<?=encryptDecrypt($value['id'])?>','req/change-user-status','<?=$this->lang->line('confirm_delete_version')?>')"></i></a>
                                        <a href="javascript:void(0);"><i class="fa fa-pencil" aria-hidden="true" title="Edit Details" onclick='window.location.href="<?= base_url().$module.'/'. strtolower($controller).'/'?>edit?id=<?=encryptDecrypt($value['id'])?>"'></i></a>

                                    </td>
                                </tr>
                                <?php
                                            $srn++;
                                            }
                                        ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination_wrap clearfix">

                        <?php echo $link;?>

                    </div>

                </div>
            </div>
            <!--main wrapper close-->
        </div>