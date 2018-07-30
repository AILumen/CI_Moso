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
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Event Management</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url().$module.'/'.strtolower($controller)?>">Events Listing</a></li>
                        <li class="breadcrumb-item">Event Management Category</li>
                    </ol>
                </div>

                <!--Filter Section -->
                <div class="section filter-section clearfix">
                    <div class="row">
                        <div class="col-lg-2 col-sm-3">
                            <div class="display col-sm-space">
                                <select class="selectpicker dispLimit">
                                    <option <?php echo ($limit == 10)?'Selected':'' ?> value="10">Display 10</option>
                                    <option <?php echo ($limit == 20)?'Selected':'' ?> value="20">Display 20</option>
                                    <option <?php echo ($limit == 50)?'Selected':'' ?> value="50">Display 50</option>
                                    <option <?php echo ($limit == 100)?'Selected':'' ?> value="100">Display 100</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="srch-wrap fawe-icon-position col-sm-space">
                                <span class="fawe-icon fawe-icon-position-left search-ico"><i class="fa fa-search"></i></span>
                                <span class="fawe-icon fawe-icon-position-right close-ico"><i class="fa fa-times-circle"></i></span>
                                <input type="text" maxlength="50" value="<?php echo (isset($searchlike) && !empty($searchlike))? $searchlike:''?>" class="search-box searchlike" placeholder="Search by Name" id="searchuser" name="search">
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-3">
                            <div class="circle-btn-wrap col-sm-space">
                                <a href="javascript:void(0);" class="circle-btn exportCsv" title="Export">
                                    <img src="<?= base_url()?>public/images/save.svg">
                                </a>
                                <a href="javascript:void(0);" class="circle-btn" data-target="#add_category" data-toggle="modal">
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
                                    <th>Sr.No</th>
                                    <th>Event Category</th>
                                    <th>Total Events</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                                    if(!empty($category)){
                                                        $srno = 1;
                                                        foreach ($category as $key => $value){
                                              ?>
                                <tr>

                                    <td><?=$srno?></td>
                                    <td><?=$value['category_name']?> </td>
                                    <td><?=$value['events']?></td>
                                    <td class=" table-action">
                                        <a href="javascript:void(0);" class="f-trash" data-toggle="modal" ><i class="fa fa-trash" title="Delete" onclick="deleteCategory('category',<?php echo DELETED;?>,'<?php echo encryptDecrypt($value['id']);?>','req/change-user-status','Are you sure you want to delete this selected Category?');"></i></a>

                                    </td>
                                </tr>
                                <?php $srno ++;}}else{ ?>
                                    <tr><td colspan="12">No result found.</td></tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination_wrap clearfix">

                        <?=$link?>

                    </div>

                </div>
            </div>
            <!--main wrapper close-->
        </div>