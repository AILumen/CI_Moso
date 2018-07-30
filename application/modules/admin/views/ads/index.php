<div class="right-panel">
    <div class="inner-right-panel">

        <!--breadcrumb wrap-->
        <div class="breadcrumb-wrap">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">Advertisement</a>
                </li>
                <li class="breadcrumb-item">Listing</li>
            </ol>
        </div>

        <!--Filter Section -->
        <div class="section filter-section clearfix">
            <div class="row">
                <div class="col-lg-2 col-sm-3">
                    <div class="display col-sm-space">
                        <select class="selectpicker">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
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
                            <label class="admin-label">
                                Date
                            </label>
                            <div class="inputfield-wrap calendersec">
                                <input type="text" name="startDate" value="" class="startDate" id="startDate" placeholder="From">
                                <span class="cal_bg"></span>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <div class="fltr-field-wrap">
                            <label class="admin-label">Location</label>
                            <div class="inputfield-wrap">
                                <input type="text">                                    
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <div class="fltr-field-wrap">
                            <label class="admin-label">Total Clicks</label>
                            <div class="inputfield-wrap">
                                <input type="text">                                    
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <div class="fltr-field-wrap">
                            <label class="admin-label">Total Views</label>
                            <div class="inputfield-wrap">
                                <input type="text">                                    
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="button-wrap">
                            <button type="reset" class="commn-btn cancel" id="resetbutton">Reset</button>
                            <input type="submit" class="commn-btn save" id="filterbutton" name="filter" value="Apply">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--Filter Wrapper Close-->
        <div class="section">
            <!--table-->
            <div class="table-responsive table-wrapper">
                <table cellspacing="0" id="example" class="table-custom sortable">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Advertisement Title</th>
                            <th>Advertisement Media</th>
                            <th>Posted By</th>
                            <th>Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="adv-detail.html">Advertisement title goes here..</a></td>
                            <td class="td-media">
                                <img src="https://lh5.ggpht.com/epl7Mb7-7vMskGJxbK6H5n8k8_TbKfLWi9oKnkiO9vW-OAHBGqnVTLkYTw9h"/>
                            </td>
                            <td>John Doe</td>
                            <td>01/01/2010</td>
                        </tr>                             

                    </tbody>
                </table>
            </div>
            <div class="pagination_wrap clearfix">

                <ul>
                    <li>
                        <a href="javascript:void(0);" class="page_cout active">1</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="page_cout">2</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="page_cout">3</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="page_cout">Next</a>
                    </li>
                </ul>

            </div>

        </div>
    </div>
    <!--main wrapper close-->
</div>