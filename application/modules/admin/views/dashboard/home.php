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
    <?php if ( null !== $this->session->flashdata("greetings")) { ?>
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="alert-heading"><?php echo $this->session->flashdata("greetings") ?></h4>
        <p><?php echo $this->session->flashdata("message") ?></p>
    </div>
    <?php } ?>
<!-- //alert -->
        <!--breadcrumb wrap-->
        <div class="breadcrumb-wrap">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Users</li>
            </ol>
        </div>
        <div class="dash_board_panel clearfix">
            <div class="dash_board_box board1 clearfix">
                <figure><img src="<?=base_url()?>public/images/user.svg"></figure>
                <div class="right_sec">
                    <span class="hd_dash">Total Users</span>
                    <span class="count_dash"><?=$userCount?></span>
                </div>
                <a href="<?=base_url()?>admin/users" class="view_detail" title="View Detail"><i class="fa fa-angle-double-right"></i></a>
            </div>
            <div class="dash_board_box board2 clearfix">
                <figure><img src="<?=base_url()?>public/images/user.svg"></figure>
                <div class="right_sec">
                    <span class="hd_dash">Total Events</span>
                    <span class="count_dash"><?=$eventCount?></span>

                </div>
                <a href="<?=base_url()?>admin/event" class="view_detail" title="View Detail"><i class="fa fa-angle-double-right"></i></a>
            </div>
            <div class="dash_board_box board3 clearfix">
                <figure><img src="<?=base_url()?>public/images/user.svg"></figure>
                <div class="right_sec">
                    <span class="hd_dash">Total Ads</span>
                    <span class="count_dash">0 </span>

                </div>
                <a href="javascript:void(0);" class="view_detail" title="View Detail" onclick="underdev()"><i class="fa fa-angle-double-right"></i></a>
            </div>
            <div class="dash_board_box board4 clearfix">
                <figure><img src="<?=base_url()?>public/images/user.svg"></figure>
                <div class="right_sec">
                    <span class="hd_dash">Total Media</span>
                    <span class="count_dash"><?=$mediaCount?></span>

                </div>
                <a href="<?= base_url()?>admin/media" class="view_detail" title="View Detail"><i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>

        <!--Filter Section -->
        <div class="section filter-section clearfix">
            <div class="row">
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <select class="selectpicker filter social">
                                    <option value="">Registration</option>
                                    <option <?= ($social == 1)?'selected':''?> value="1">Manual</option>
                                    <option <?= ($social == 2)?'selected':''?> value="2">Facebook</option>
                                    <option <?= ($social == 3)?'selected':''?> value="3">Instagram</option>
                                </select>

                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <select class="selectpicker filter status">
                            <option value="">Status</option>
                            <option <?php echo ($status == 2)?'selected':'' ?> value="2">Active</option>
                            <option <?php echo ($status == 1)?'selected':'' ?> value="1">Inactive</option>
                            <option <?php echo ($status == 8)?'selected':'' ?> value="8">Reported</option>
                            <option <?php echo ($status == 3)?'selected':'' ?> value="3">Deleted</option>
                            <option <?php echo ($status == 5)?'selected':'' ?> value="5">Temporarily Blocked</option>
                            <option <?php echo ($status == 4)?'selected':'' ?> value="4">Blocked</option>
                            <option <?php echo ($status == 7)?'selected':'' ?> value="7">Ghost Banned</option>
                        </select>

                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <select class="selectpicker filter time">
                                        <option value="">Time</option>
                                        <option <?= ($time == "daily") ? 'selected' : ''?> value="daily">Daily</option>
                                        <option <?= ($time == "week") ? 'selected' : ''?> value="week">Weekly</option>
                                        <option <?= ($time == "month") ? 'selected' : ''?> value="month">Monthly</option>
                                        <option <?= ($time == "year") ? 'selected' : ''?> value="year">Yearly</option>
                                    </select>

                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <div class="form-group fltr-field-wrap">
                        <!-- <label class="admin-label">Date</label> -->
                        <div class="inputfield-wrap calendersec">
                            <input type="text" name="startDate" value="" class="startDate" id="startDate" placeholder="From" readonly="true">
                            <span class="cal_bg"></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <div class="form-group fltr-field-wrap">
                        <!-- <label class="admin-label">Date</label>                         -->
                        <div class="inputfield-wrap calendersec">
                            <input type="text" name="endDate" data-provide="datepicker" value="" class="endDate" id="endDate" placeholder="To" readonly="true">
                            <span class="cal_bg"></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <div class="form-group fltr-field-wrap">
                          <div class="circle-btn-wrap col-sm-space">
                                <a href="javascript:void(0);" class="circle-btn exportReport" title="Export">
                                    <img src="<?=base_url()?>public/images/save.svg">
                                </a>
                          </div>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="buttn-panel">
                        <button type="reset" class="commn-btn cancel resetfilter" id="resetbutton">Reset</button>
                        <input type="submit" class="commn-btn save applyFilterUser" id="filterbutton" name="filter" value="Apply">
                    </div>
                </div>
            </div>
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
        <!--Filter Section Close-->
    </div>
    <!--main wrapper close-->
</div>

<!-- JS Plugin -->
<script src="https://code.highcharts.com/highcharts.js"></script>


<script>
    Highcharts.chart('container', {
        chart: {
            type: 'line'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: <?=$xAxis?>,
            title: {
                text: 'Time Period'
            }
        },
        yAxis: {
            title: {
                text: 'Number of Users'
            },
            lineColor: '#00000017',
            lineWidth: 1,
            min: 0,
            max: <?=$yAxis['max']?>,
            tickInterval: <?=$yAxis['step']?>
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: false
                },
                enableMouseTracking: true
            }
        },
        series: [{
            name: 'All Users',
            color: '#2599d2',
            data: <?=$chartData?>
        }]
    });
</script>