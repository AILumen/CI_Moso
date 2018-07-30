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
                <li class="breadcrumb-item">Events Listing</li>
            </ol>
        </div>

        <!--Filter Section -->
        <div class="section filter-section clearfix">
            <div class="row">
                <div class="col-lg-2 col-sm-6">
                    <div class="display col-sm-space">
                        <select class="form-control dispLimit">
                            <option <?php echo ($limit == 10)?'Selected':'' ?> value="10">Display 10</option>
                            <option <?php echo ($limit == 20)?'Selected':'' ?> value="20">Display 20</option>
                            <option <?php echo ($limit == 50)?'Selected':'' ?> value="50">Display 50</option>
                            <option <?php echo ($limit == 100)?'Selected':'' ?> value="100">Display 100</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="srch-wrap fawe-icon-position col-sm-space">
                        <span class="fawe-icon fawe-icon-position-left search-ico"><i class="fa fa-search"></i></span>
                        <span class="fawe-icon fawe-icon-position-right close-ico"><i class="fa fa-times-circle"></i></span>
                        <!-- <button class="srch search-icon" style="cursor:default"></button>
                                 <a href="javascript:void(0)"> <span class="srch-close-icon searchCloseBtn"></span></a> -->
                        <input type="text" maxlength="50" value="<?php echo (isset($searchlike) && !empty($searchlike))? $searchlike:''?>" class="search-box searchlike" placeholder="Search by Name,ID" id="searchuser" name="search">
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12">
                    <div class="circle-btn-wrap col-sm-space">
                        <a href="javascript:void(0)" id="filter-side-wrapper" class="tooltip-p">
                            <div class="circle-btn animate-btn" title="Filter">
                                <i class="fa fa-filter" aria-hidden="true"></i>
                            </div>

                        </a>

                        <a href="javascript:void(0);" class="circle-btn exportCsv" title="Export">
                            <img src="<?=base_url()?>public/images/save.svg">
                        </a>
                        <a href="<?= base_url().$module.'/'.strtolower($controller).'/category' ?>" class="commn-btn save" title="Manange Event Category">
                                Manange Event Category
                        </a>
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
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <div class="fltr-field-wrap">
                            <label class="admin-label">Registration Date</label>
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
                                <select class="form-control filter status" name="status">
                                    <option value="">All</option>
                                    <option <?php echo ($status == ACTIVE)?'selected':'' ?> value="1">Active</option>
                                    <option <?php echo ($status == EVENT_ENDED)?'selected':'' ?> value="3">Ended</option>
                                    <option <?php echo ($status == DELETED)?'selected':'' ?> value="2">Deleted</option>
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
            <!-- <p class="tt-count">Total Users:(10)</p> -->
            <!--table-->
            <div class="table-responsive table-wrapper">
                <table cellspacing="0" id="example" class="table-custom sortable">
                    <thead>
                <tr>
                    <th>S.No</th>
                    <th>Event Name</th>
                    <th>Created By</th>                    
                    <th>Date & Time</th>
                    <th>Total Likes</th>
                    <th>Total Talking</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>

            </thead>
            <tbody id="table_tr">
              <?php if(isset($eventlist) && count($eventlist)>0):
                    foreach($eventlist as $key =>$value):?>
                  <tr id ="remove_<?php echo $value['id'];?>">
                    <td><?php echo ++$key; ?></td>
                    <td> 
                        <?php if($value['evt_status'] == '1'){ ?>
                        <a href="<?=base_url()?>admin/event/detail?id=<?= encryptDecrypt($value['id']) ?>"><?= ucfirst(substr($value['evt_name'],0,150)) ?></a>
                        <?php
                                }else{ 
                                    echo ucfirst(substr($value['evt_name'],0,150));
                                }
                              ?>
                    </td>
                    <td><?= ucfirst($value['username'])?></td>
                    <td><?= date('d-M-y',$value['evt_start']) . '|' . date('h:i:sa',$value['evt_start'])?></td>
                    <td><?=$value['likes']?></td>
                    <td><?=$value['talking']?></td>
                    <td>
                        <?php 
                                if($value['evt_status'] == ACTIVE){
                                    echo 'Active';
                                }elseif($value['evt_status'] == DELETED){
                                    echo "Deleted";
                                }elseif($value['evt_status'] == EVENT_ENDED){
                                    echo 'Ended';
                                }else{
                                    echo 'Inactive';
                                }
                             ?>
                    </td>
                    <td>
                        <?php 
                                if($value["evt_status"] == ACTIVE){
                            ?>
                            <a href="javascript:void(0);" class="f-trash"><i class="fa fa-trash" aria-hidden="true" onclick="deleteUser('event',<?php echo DELETED;?>,'<?php echo encryptDecrypt($value['id']);?>','req/change-user-status','Are you sure you want to delete the selected Event?');"></i></a>
                        <?php
                                }else{
                             ?>
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        <?php } ?>
                    </td>
                </tr>
          <?php
              endforeach;
              else:
                  echo '<tr><td colspan="12">No result found.</td></tr>';
              endif;?>
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