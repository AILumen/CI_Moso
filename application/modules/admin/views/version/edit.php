<?php 
$filterArr = $this->input->get();
$filterArr = (object) $filterArr;
$controller = $this->router->fetch_class();
$method = $this->router->fetch_method();
$module = $this->router->fetch_module();
?>
<input type="hidden" id="pageUrl" value='<?php echo base_url().$module.'/'.strtolower($controller).'/'.$method; ?>'><div class="right-panel">
            <div class="inner-right-panel">

                <!--breadcrumb wrap-->
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Version Management</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url().$module.'/'. strtolower($controller)?>">Version Listing</a></li>
                        <li class="breadcrumb-item">Version Detail</li>
                    </ol>
                </div>
                <!-- breadcrumb wrap close -->
                <div class="form-item-wrap">
                    <div class="form-item-title clearfix">
                        <h3 class="title">Edit Version</h3>
                    </div>
                    <!-- title and form upper action end-->
                    <div class="form-ele-wrapper clearfix">
                        <div class="row">
                            <!--form ele wrapper-->
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="user-detail-panel">
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Version Name</label>
                                            <div class="input-holder">
                                                <input type="hidden" name="id" value="<?=(isset($version['id'])) ? $version['id'] : "" ?>" class="form-control vid">
                                                <input type="text" name="version" value="<?=(isset($version['name'])) ? $version['name'] : "" ?>" class="form-control vname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <div class="input-holder">
                                                <input type="text" name="title" value="<?=(isset($version['title'])) ? $version['title'] : "" ?>" class="form-control vtitle">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Platform</label>
                                            <div class="input-holder">
                                                <select class="vplatform" name="status">
                                                    <option value="1" <?=($version['platform'] == "1") ? "selected" : ""?>>Android</option>
                                                    <option value="2" <?=($version['platform'] == "2") ? "selected" : ""?>>IOS</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <div class="input-holder">
                                                <textarea name="textarea" id="txt_cke" class="vdescription" rows="5"><?=(isset($version['description'])) ? $version['description'] : ""?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-xs-12">
                                        <div class="fltr-field-wrap">
                                            <label class="admin-label">Is this current Version?</label>
                                            <div class="custom-checkbox">
                                                <input type="radio" name="yes" id="yes"class="with-gap" value="1" <?=($version['is_current'] == "1") ? "checked" : ""?>>
                                                <label for="yes" class="strong-label">Yes
                                                        </label>
                                            </div>
                                            <div class="custom-checkbox">
                                                <input type="radio" name="yes" id="no" class="with-gap" value="2" <?=($version['is_current'] == "2") ? "checked" : ""?>>
                                                <label for="no" class="strong-label">No
                                                            </label>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="button-wrap">

                                    <button type="submit" class="commn-btn save version">Update</button>
                                    <button type="reset" class="commn-btn cancel" onclick='window.location.href = "<?=base_url().$module.'/'.strtolower($controller)?>"'>Cancel</button>

                                </div>

                            </div>
                        </div>
                        <!--form ele wrapper end-->
                    </div>
                    <!--form element wrapper end-->
                </div>
            </div>
            <!--main wrapper close-->
        </div>