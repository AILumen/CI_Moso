<?php 
$filterArr = $this->input->get();
$filterArr = (object) $filterArr;
$controller = $this->router->fetch_class();
$method = $this->router->fetch_method();
$module = $this->router->fetch_module();
?>
<link href="<?php echo base_url()?>public/css/datepicker.min.css" rel='stylesheet'>
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
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Media Management</a></li>
                        <li class="breadcrumb-item">Media Listing</li>
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

                        <!-- <div class="col-lg-6 col-sm-6">
                            <div class="srch-wrap fawe-icon-position col-sm-space">
                                <span class="fawe-icon fawe-icon-position-left search-ico"><i class="fa fa-search"></i></span>
                                <span class="fawe-icon fawe-icon-position-right close-ico"><i class="fa fa-times-circle"></i></span>
                                <button class="srch search-icon" style="cursor:default"></button>
                                         <a href="javascript:void(0)"> <span class="srch-close-icon searchCloseBtn"></span></a>
                                <input type="text" maxlength="50" value="" class="search-box searchlike" placeholder="Search by Name,ID" id="searchuser" name="search">
                            </div>
                        </div> -->

                        <div class="col-lg-10 col-sm-9">
                            <div class="circle-btn-wrap col-sm-space">
                                <a href="javascript:void(0)" id="filter-side-wrapper" class="tooltip-p">
                                    <div class="circle-btn animate-btn" title="Filter">
                                        <i class="fa fa-filter" aria-hidden="true"></i>
                                    </div>

                                </a>

<!--                                <a href="javascript:void(0);" class="circle-btn">
                                    <img src="<?= base_url()?>public/images/save.svg">
                                </a>
                                <a href="media_report.html" class="commn-btn save">
                                        Manage Report Media Reasons
                                    </a>-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--Filter Section Close-->

                <!--Filter Wrapper-->
                <div class="filter-wrap ">
                    <div class="filter_hd clearfix">
                        <div class="pull-left">
                            <h2 class="fltr-heading">Filter</h2>
                        </div>
                        <div class="pull-right">
                            <span class="close flt_cl">X</span>
                        </div>
                    </div>
                    <div class="inner-filter-wrap">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="fltr-field-wrap">
                                    <label class="admin-label">Media Type</label>
                                    <div class="custom-checkbox">
                                        <input type="radio" name="type" id="id_img" class="with-gap" value="1" <?php echo ($mediatype == 1)?'checked':'' ?>>
                                        <label for="id_img" class="strong-label">Image
                                            </label>
                                    </div>
                                    <div class="custom-checkbox">
                                        <input type="radio" name="type" id="id_vid" class="with-gap" value="2" <?php echo ($mediatype == 2)?'checked':'' ?>>
                                        <label for="id_vid" class="strong-label">Video
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-3 col-sm-3 col-xs-12">
                                <div class="fltr-field-wrap">
                                    <label class="admin-label">
                                            Date of Uploading</label>
                                    <div class="inputfield-wrap calendersec">
                                        <input type="text" name="startDate" value="" class="startDate" id="startDate" placeholder="From">
                                        <span class="cal_bg"></span>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3 col-xs-12">
                                <div class="fltr-field-wrap pd_fl">
                                    <div class="inputfield-wrap calendersec">
                                        <input type="text" name="endDate" data-provide="datepicker" value="" class="endDate" id="endDate" placeholder="To">
                                        <span class="cal_bg"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3 col-xs-12">
                                <div class="fltr-field-wrap">
                                    <label class="admin-label">Status</label>
                                    <div class="commn-select-wrap">
                                        <select class="selectpicker filter status" name="status">
                                            <option value="">All</option>
                                            <option <?php echo ($status == ACTIVE)?'selected':'' ?> value="1">Active</option>
                                            <option <?php echo ($status == BLOCKED)?'selected':'' ?> value="0">Inactive</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="button-wrap">
                                    <button type="reset" class="commn-btn cancel resetfilter" id="resetbutton">Reset</button>
                                    <input type="submit" class="commn-btn save applyFilterUser" id="filterbutton" name="filter" value="Apply">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--Filter Wrapper Close-->
                <div class="section">
                    <!--<p class="tt-count">Total Memory Consumed By Media: 12GB</p>-->
                    <!--table-->
                    <div class="table-responsive table-wrapper">
                        <table cellspacing="0" id="example" class="table-custom sortable">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>
                                        Media
                                    </th>
                                    <th>Event Name</th>
                                    <th>Size(KB)</th>
                                    <th> Uploaded By</th>
                                    <th>Uploaded on</th>
                                    <th>Total Likes</th>
                                    <th>Total ReportedCount</th>
                                    <th>Status</th>
                                    <th><span class="span.img_view">Action</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(isset($medialist) && count($medialist)>0):
                                $sno = 1;
                                foreach ($medialist as $value){
                                ?>
                                <tr>

                                    <td><?=$sno?></td>
                                    <?php if($value['media_type'] == 1){ ?>
                                    <td><span class="img_view"><img src="<?=$value['media_url']?>" alt=""></span></td>
                                    <?php }else{ ?>
                                    <td>
                                        <span class="img_view">
                                            <video class="video_pln" poster="<?=$value['media_url']?>" controls="">
                                                <source src="<?=$value['media_url']?>" type="video/mp4">                                                                          
                                            </video>
                                        </span>
                                    </td>
                                    <?php } ?>
                                    <td><?=$value['evt_name']?></td>
                                    <td><?= round($value['media_size']/1024, 2)?></td>
                                    <td><?=$value['username']?></td>
                                    <td> <?=date('Y-m-d',$value['createdon'])?></td>
                                    <td><?=$value['likes']?></td>
                                    <td><?=$value['reported']?></td>
                                    <td>
                                        <?php 
                                            if($value['status'] == 1){
                                                echo 'Active';
                                            }else{
                                                echo 'Inactive';
                                            }
                                        ?>
                                    </td>
                                    <td class=" table-action">
                                        <a href="<?= base_url()?>admin/media/detail?id=<?= encryptDecrypt($value['id']);?>" class="view"><i class="fa fa-eye" title="View"></i></a>
                                        <a href="javascript:void(0);" class="f-trash"><i class="fa fa-trash" aria-hidden="true" onclick="deleteUser('media',<?php echo DELETED;?>,'<?= encryptDecrypt($value['id']);?>','req/change-user-status','Are you sure you want to delete the selected Media?');"></i></a>
                                    </td>
                                </tr>
                                <?php $sno++;} 
                                    else:
                                    echo '<tr><td colspan="10">No result found.</td></tr>';
                                    endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination_wrap clearfix">

                        <ul>
                            <?=$link?>
                        </ul>

                    </div>

                </div>
            </div>
            <!--main wrapper close-->
        </div>