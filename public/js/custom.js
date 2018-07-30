// sidebar in out
$('.toggleBtn, .xs-sidemenu-toggle').click(function(e) {
    e.stopPropagation();
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $('body').removeClass('section-caught');
        // $('.right-panel').removeClass('fluid-rightpanel');
        // $('.right-panel').removeClass('fluid-rightpanel');
    } else {
        $(this).addClass('active');
        $('body').addClass('section-caught');
        // $('.section-caught').addClass('open-sidebar')
        // $('.right-panel').addClass('fluid-rightpanel');
    }
})



// sidebar
$('.closeSidebar768').click(function() {
    $('.toggleBtn').removeClass('active');
    $('body').removeClass('section-caught');
})

$('.search786').click(function(e) {
    $('.search-wrapper').addClass('show');
    e.stopPropagation();
})
$(document).on("click", function(e) {
    if (!($(e.target).is(".search-wrapper") === false)) {
        $(".search-wrapper").addClass('show');
    } else {
        $(".search-wrapper").removeClass('show');
    }
});

/* dropdown */
//hide and show dropdowns
$('.drp').on('click', function(e) {
    e.stopPropagation();
    if ($(this).hasClass('active')) {
        $('.fncy-drp').removeClass('fncy-drp-opened');
        $('.drp').removeClass('active');
    } else {
        $('.fncy-drp').removeClass('fncy-drp-opened');
        $('.drp').removeClass('active');
        $(this).addClass('active');
        $(this).find('.fncy-drp').addClass('fncy-drp-opened');
    }
})
$(document).on("click", function(e) {
    if (!($(e.target).is(".fncy-drp") === true)) {
        $(".fncy-drp").removeClass('fncy-drp-opened');
        $('.drp').removeClass('active');
    }
});


//Action Tool tip js Start
$(".user-td").click(function(e) {
    e.stopPropagation();
    $(".user-call-wrap").hide();
    $(this).find(".user-call-wrap").show();
});
$("body").click(function() {
    $(".user-call-wrap").hide();
});

//Action Tool tip js Close  


//Filter Show or hide JS
$("#filter-side-wrapper").click(function(e) {
    e.stopPropagation();
    $(".filter-wrap").slideToggle();
});
$(".close.flt_cl").click(function() {
    $(".filter-wrap").slideUp();
});

// $(document).click(function (e) {
//     if (!$(e.target).is('.filter-wrap, .filter-wrap *')) {
//         $(".filter-wrap").removeClass("active");
//         $(".search-wrapper").removeClass("show");
//     }
// });
$(".flt_cl").click(function(e) {
    $(".filter-wrap").removeClass("active");
});
//Filter Show or hide JS Close
$("#filter-table_wrap").click(function() {
    $(".filter-detail_panel").slideToggle();
});
$(".filter-detail_panel .close.flt_cl").click(function() {
    $(".filter-detail_panel").slideUp();
});

//Select Picker Js Start
$('.selectpicker').selectpicker();

//Select Picker Js Close


$(".search-box").keyup(function() {
    var char_length = $(this).val().length;
    if (char_length > 0) {
        $(".close-ico").show();
    } else {
        $(".close-ico").hide();
    }
});

$(document).ready(function (){
    if ($('.search-box').val()) {
        var searchlen = $('.search-box').val().length;
        if (searchlen > 0) {
            $('.close-ico').show();
        } else {
            $('.close-ico').hide();
        }
    }
});

$(".close-ico").click(function() {
        $(".close-ico").hide();
        
        var filter = {};
        var pageUrl = $('#pageUrl').val();
        filter = $('#filterVal').val();
        filter = JSON.parse(filter);
        var limit = $('.dispLimit').find(":selected").val();
        if(("searchlike" in filter) == true){
            $(".search-box").val('');
            delete filter['searchlike'];
            if (limit != undefined) {
                filter['limit'] = limit;
            }
            var queryParams = $.param(filter)
            window.location.href = pageUrl + '?' + queryParams;
        }else{
            $(".search-box").val('');
        }

    })
    // append js
$(document).ready(function() {
    var i = 1;

    $("#add_detail").click(function() {
        $("table tbody").append('<tr id="field' + i + '"><td><span class="table_sr_pln">1</span></td> <td> <span class="table_view_pln">AngelsCreed</span></td><td class="text-nowrap"><span class="table_view_pln">Male</span></td><td><span class="table_view_pln">Appartment</span></td><td><span class="table_input_pln"><label class="switch_btn"><input type="checkbox"><span class="slider round"></span></label></span></td><td class="table-action"><span class="table_input_pln"></span></td></tr>');
    });
    $("body").on('click', '.tlb_btn.remove', function() {

        var getId = $(this).attr('tr');
        $('#' + getId).remove();
    });

});
$(document).ready(function() {
    var i = 1;

    $("#add_player").click(function() {
        $("table tbody").append('<tr id="field' + i + '"><td><span class="table_sr_pln">1</span></td> <td> <span class="table_view_pln">AngelsCreed</span></td><td class="text-nowrap"><span class="table_view_pln">Male</span></td><td><span class="table_view_pln">Appartment</span></td><td><span class="table_input_pln"><label class="switch_btn"><input type="checkbox"><span class="slider round"></span></label></span></td><td>Active</td><td class="table-action"><span class="table_input_pln"><a href="javascript:void(0);" class="f-eye"><i class="fa fa-eye" title="View"></i></a><a href="javascript:void(0)" class="f-pencil" data-toggle="modal" data-target="#edit_game"><i class="fa fa-pencil" title="Edit" aria-hidden="true"></i></a></span></td></tr>');
    });
    $("body").on('click', '.tlb_btn.remove', function() {

        var getId = $(this).attr('tr');
        $('#' + getId).remove();
    });

});
//image preview
// images jd
$(function() {
    var previewImage = function(input, block) {
        var fileTypes = ['jpg', 'jpeg', 'png'];
        var extension = input.files[0].name.split('.').pop().toLowerCase(); /*se preia extensia*/
        var isSuccess = fileTypes.indexOf(extension) > -1; /*se verifica extensia*/

        if (isSuccess) {
            var reader = new FileReader();

            reader.onload = function(e) {
                block.css({
                    'background-image': 'url(' + e.target.result + ')'
                });
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            alert('Image not accepted');
        }

    };
    $('#uploadPic').on('change', function() {
        previewImage(this, $('.profile-pic'));
    })

});
$(".QR_id_panel").click(function() {
    $("#qr_code_detail").slideToggle();
    // $(".overlay").show();
});
// select input table js
$(document).ready(function() {
    $(".check").change(function() {
        if (this.checked) {
            this.checked = true;
        } else {
            this.checked = false;
        }
    });

    $(".select-comm").click(function() {
        if ($(this).is(":checked")) {
            var isAllChecked = 0;
            $(".select-comm").each(function() {
                if (!this.checked)
                    isAllChecked = 1;
            })
            if (isAllChecked == 0) { $(".check").prop("checked", true); }
        } else {
            $(".check").prop("checked", false);
        }
    });
});
//close checkbox
//tab js
$(function() {
    $('.tab_wrap ul li:first').addClass('active');
    $('.comm_tab_panel .form-item-wrap').hide();
    $('.comm_tab_panel .form-item-wrap:first').show();
    $('.tab_wrap ul li').on('click', function() {
        $('.tab_wrap ul li').removeClass('active');
        $(this).addClass('active')
        $('.comm_tab_panel .form-item-wrap').hide();
        var activeTab = $(this).find('a').attr('href');
        $(activeTab).show();
        return false;
    });
});
// shorting js left panel sub menu
$('.drop_down_action > a').click(function(event) {
    event.preventDefault();
    if ($(this).parent().hasClass('active')) {
        $(this).parent().removeClass('active');
        $(this).next('.drop_down_menu').slideUp();
    } else {
        $('.drop_down_action').removeClass('active');
        $('.drop_down_menu').slideUp();
        $(this).parent().addClass('active');
        $(this).next('.drop_down_menu').slideDown();
    }

});
// form tab js
$('.form-item-title').click(function() {
    if ($(this).hasClass('open')) {
        $(this).removeClass('open');
        $(this).parent().removeClass('section-caught');

    } else {
        $(this).addClass('open');
        $(this).parent().addClass('section-caught');
        // $('.form-item-wrap').addClass('section-caught');
    }
});

/**
 * 
 */
$('.subsave').click(function () {
    
    var obj = [];
    $.each($("input[type='checkbox']:checked"), function(){
        obj.push($(this).val());
    });
    $( "#permission" ).val( JSON.stringify(obj) );
    $( "#subadmin_add" ).submit();
});
