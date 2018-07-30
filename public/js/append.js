 // append js
$(document).ready(function() {
    var i = 1;

    $("#add_event").click(function() {
        $(".add_panel").append('<span class="comm_app" id="field' + i + '"><div class="col-lg-6 col-sm-12 col-xs-12"><div class="form-group"><label>Frequency</label><div class="input-holder"><input type="text" name="" value="" class="form-control"></div></div></div><div class="col-lg-6 col-sm-12 col-xs-12"><div class="form-group pd_app"><div class="input-holder"><input type="text" name="" value="" class="form-control"></div></div></div><span class="minus-icon" data-delete="field'+i+'"><i class="fa fa-minus"></i></span><div class="clearfix"></div></span>');
    });
    $("#add_pel").click(function() {
        $(".pepole_panel").append('<span class="comm_app" id="field' + i + '"><div class="col-lg-6 col-sm-12 col-xs-12"><div class="form-group"><label>Frequency</label><div class="input-holder"><input type="text" name="" value="" class="form-control"></div></div></div><div class="col-lg-6 col-sm-12 col-xs-12"><div class="form-group pd_app"><div class="input-holder"><input type="text" name="" value="" class="form-control"></div></div></div><span class="minus-icon" data-delete="field'+i+'"><i class="fa fa-minus"></i></span><div class="clearfix"></div></span>');
    });
    $("#add_map").click(function() {
        $(".map_add_panel").append('<span class="comm_app" id="field' + i + '"><div class="col-lg-6 col-sm-12 col-xs-12"><div class="form-group"><label>Frequency</label><div class="input-holder"><input type="text" name="" value="" class="form-control"></div></div></div><div class="col-lg-6 col-sm-12 col-xs-12"><div class="form-group pd_app"><div class="input-holder"><input type="text" name="" value="" class="form-control"></div></div></div><span class="minus-icon" data-delete="field'+i+'"><i class="fa fa-minus"></i></span><div class="clearfix"></div></span>');
    });
    $("body").on('click','.minus-icon',function(){

        var getId = $(this).attr('data-delete');
        $('#'+getId).remove();
        });

});