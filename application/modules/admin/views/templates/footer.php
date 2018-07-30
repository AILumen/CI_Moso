<footer>
    &copy;2017-2018 Surface App All Rights Reserved
</footer>

<!-- JS Plugin -->
<script src="<?=base_url()?>public/js/plugin/jquery.min.js"></script>
<script src="<?=base_url()?>public/js/date_validation.js"></script>
<script src="<?= base_url()?>public/js/plugin/bootstrap.min.js"></script>
<script src="<?= base_url()?>public/js/plugin/bootstrap-select.js"></script>
<script src="<?= base_url()?>public/js/plugin/datepicker.min.js"></script>
<script src="<?= base_url() ?>public/js/global-msg.js"></script>
<script src="<?= base_url()?>public/js/custom.js"></script>
<script src="<?= base_url()?>public/js/common.js"></script>
<script src="<?= base_url()?>public/ckeditor/ckeditor.js"></script>

<script> 
    var projectglobal = {};
    projectglobal.baseurl = "";
    var csrf_token = <?php echo "'" . $this->security->get_csrf_hash() . "'"; ?>;
    var baseUrl = '<?= base_url()?>'; 
    /*
     * create location cookie if not set already
     */
    var geoLocation = getCookie("location");
    if(geoLocation == ""){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(saveLocation);
        }
        function saveLocation(position) {
            document.cookie = "location=" + position.coords.latitude + "," + position.coords.longitude ; 
        }
    }
</script>
<!-- Delete Modal -->
        <div id="myModal-trash" class="modal fade" role="dialog">
            <input type="hidden" id="uid" name="uid" value="">
            <input type="hidden" id="ustatus" name="ustatus" value="">
            <div class="modal-dialog modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header modal-alt-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title modal-heading">Delete </h4>
                    </div>
                    <div class="modal-body">
                        <p class="modal-para">Are you sure want to delete?</p>
                    </div>

                    <input type="hidden" id="new_status" name="new_status">
                    <input type="hidden" id="new_id" name="new_id">
                    <input type="hidden" id="new_url" name="new_url">
                    <input type="hidden" id="new_msg" name="new_msg">
                    <input type="hidden" id="for" name="for">
                    <div class="modal-footer">
                        <div class="button-wrap">
                            <button type="button" class="commn-btn cancel" data-dismiss="modal">Cancel</button>
                            <button type="button" class="commn-btn save" onclick="changeStatusToDelete($('#for').val(),$('#new_status').val(),$('#new_id').val(),$('#new_url').val())">Delete</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--Block Modal -->
        <div id="myModal-block" class="modal fade" role="dialog">
            <input type="hidden" id="userid" name="userid" value="">
            <input type="hidden" id="udstatus" name="udstatus" value="">
            <div class="modal-dialog modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header modal-alt-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title modal-heading">BLOCK</h4>
                    </div>
                    <div class="modal-body">
                        <p class="modal-para">Are you sure want to block?</p>
                    </div>
                    <div class="button-wrap">
                        <button type="button" class="commn-btn cancel" data-dismiss="modal">Cancel</button>
                        <button type="button" class="commn-btn save" id="action" onclick="changeStatusToBlock($('#for').val(),$('#new_status').val(),$('#new_id').val(),$('#new_url').val())">Block</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Logout Modal -->
        <div id="myModal-logout" class="modal fade" role="dialog">
            <input type="hidden" id="uid" name="uid" value="">
            <input type="hidden" id="ustatus" name="ustatus" value="">
            <div class="modal-dialog modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header modal-alt-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title modal-heading">Logout</h4>
                    </div>
                    <div class="modal-body">
                        <p class="modal-para">Are you sure want to logout from admin panel?</p>
                    </div>

                    <div class="button-wrap">
                        <button type="button" class="commn-btn cancel" data-dismiss="modal">No</button>
                        <button type="button" class="commn-btn save" onclick="window.location='<?php echo base_url()?>admin/Logout'">Yes</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- game edit modal -->
        <div id="edit_game" class="modal fade" role="dialog">
            <input type="hidden" id="userid" name="userid" value="">
            <input type="hidden" id="udstatus" name="udstatus" value="">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header modal-alt-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title modal-heading">Edit Game</h4>
                    </div>
                    <div class="modal-body">
                        <div class="comm_modal_wrapper clearfix">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="admin-label">Game Name</label>
                                        <div class="input-holder">
                                            <input type="text" class="" maxlength="30" name="name" placeholder="AngelsCreed " value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="admin-label">No.of days</label>
                                        <div class="input-holder">
                                            <select class="selectpicker filter status" name="status">
                        <option value="">1</option>
                        <option>5</option>
                        <option>10</option>
                     </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="admin-label">Created On</label>
                                        <div class="inputfield-wrap calendersec">
                                            <input type="text" name="startDate" value="" class="edit_date" id="edit_date" placeholder="January/11/2017">
                                            <span class="cal_bg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="admin-label">No.of Players</label>
                                        <div class="input-holder">
                                            <input type="text" class="" maxlength="30" name="name" placeholder="30" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <input type="hidden" id="new_status" name="new_status">
                    <input type="hidden" id="new_id" name="new_id">
                    <input type="hidden" id="new_url" name="new_url">
                    <input type="hidden" id="new_msg" name="new_msg">
                    <input type="hidden" id="for" name="for">

                    <div class="button-wrap">
                        <!-- <button type="button" class="commn-btn cancel" data-dismiss="modal">Cancel</button> -->
                        <button type="button" class="commn-btn save" id="action" onclick="">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- close game edit modal -->
        <!--Block Modal -->
        <!--Category Modal -->
        <div id="add_category" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header modal-alt-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title modal-heading">Add Category</h4>
                    </div>
                    <div class="modal-body">
                        <div class="comm_modal_wrapper clearfix">
                            <div class="form-group">
                                <label class="admin-label">Enter a Category</label>
                                <div class="input-holder">
                                    <input type="text" class="category" maxlength="30" name="name" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button-wrap">
                        <button type="button" class="commn-btn cancel" data-dismiss="modal">Cancel</button>
                        <button type="button" class="commn-btn save" id="action" onclick="addcategory()">Add</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- close Category Model -->
<!--main wrapper close-->
</div>
</body>
</html>