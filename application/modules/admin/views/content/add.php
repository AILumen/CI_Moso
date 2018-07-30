<?php 
$filterArr = $this->input->get();
$filterArr = (object) $filterArr;
$controller = $this->router->fetch_class();
$method = $this->router->fetch_method();
$module = $this->router->fetch_module();
?>
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
                        <li class="breadcrumb-item"><a href="<?=base_url()?>admin/content/index">Content</a></li>
                        <li class="breadcrumb-item">Add Content</li>
                    </ol>
                </div>
                <!-- breadcrumb wrap close -->
                <div class="form-item-wrap">
                    <div class="form-item-title clearfix">
                        <h3 class="title">Add Content</h3>
                    </div>
                    <!-- title and form upper action end-->
                    <div class="form-ele-wrapper clearfix">
                        <div class="row">
                            <!--form ele wrapper-->
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="user-detail-panel">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Page Title</label>
                                            <div class="input-holder">
                                                <input type="text" class="form-control ctitle" maxlength="50" name="title" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <div class="input-holder">
                                                <textarea name="textarea" id="txt_cke" class="cdescription" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="input-holder">
                                                <select class="selectpicker cstatus">
                                                    <option value="1" selected>Active</option>
                                                    <option value="2">Inactive</option>
                                                        </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="button-wrap">
                                    <button type="submit" class="commn-btn save content">Add</button>
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
    <script type="text/javascript">
        window.onload = function() {
            CKEDITOR.replace('txt_cke');
        };
    </script>