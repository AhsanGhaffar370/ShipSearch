$(document).ready(function() {

    $('#cargo_form').submit(function(e) {

        var flag = true;
        var ids = ["cargo_type_id", "loading_region_id", "loading_country_id", "loading_port_id_1", "loading_port_id_2", "discharge_region_id", "discharge_country_id", "discharge_port_id_1", "discharge_port_id_2", "unit_id", "loading_discharge_unit_id"];

        for (var i = 0; i < ids.length; i++) {
            check_dropdowns(ids[i]);
        }
        check_eqp_req();

        for (var i = 0; i < ids.length; i++) {
            if (check_dropdowns(ids[i]) == false) {
                flag = false;
                break;
            }
        }

        if (flag === true && check_eqp_req() === true) {
            return;
        } else {
            e.preventDefault();
        }
    });

    $('.datepicker').datepicker({
        autoclose: true,
    });

});


function check_dropdowns(id) {
    var cargo_type = $("#" + id);
    var cargo_type_val = cargo_type.val();

    if (cargo_type_val == null) {
        cargo_type.css({ "border": "1px solid red" });
        cargo_type.focus();
        return false;
    } else {
        cargo_type.css({ "border": "2px solid green", "padding": "5px" });
        return true;
    }
} //end of function


function check_eqp_req() {
    var eqp_req = $("input[name='loading_discharge_equipment_req[]']:checked").map(function() { return $(this).val(); }).get();

    if (eqp_req.length != 0) {
        $("#check_bor").removeClass("border-danger");
        return true;
    } else {
        $("#check_bor").addClass("border-danger");
        return false;
    }
}












//email validation function
function check_mail() {
    $("#err").remove();
    var email_re = new RegExp(/^\w+@\w+(\.\w+)+$/);
    var email = $("#email").val();

    if (email.length < 1) {
        $("#email").css({ "border": "1px solid red", "padding": "10px" });
        $('#email').after('<span id="err" class="size13 cl_r b7">Email is required</span>');
        // $("#email").focus();
        return false;

    } else if (!email_re.test(email)) {
        $("#email").css({ "border": "1px solid red", "padding": "10px" });
        $("#email").after('<span id="err" class="size13 cl_r b7">Please provide valid Email i.e:xxx@gmail.com</span>');
        // $("#email").focus();
        return false;


    } else {
        $("#email").css({ "border": "2px solid green", "padding": "10px" });
        return true;
    }
} //end of function


// password validation function
function check_pass() {
    $("#error").remove();
    var pass_re = new RegExp(/^.{6,30}$/);
    var pass = $("#pass").val();

    if (pass.length < 1) {
        $("#pass").css({ "border": "1px solid red", "padding": "10px" });
        $('#pass').after('<span id="err" class="size13 cl_r b7">Password is required</span>');
        // $("#pass").focus();
        return false;

    } else if (!pass_re.test(pass)) {
        $("#pass").css({ "border": "1px solid red", "padding": "10px" });
        $('#pass').after('<span id="err" class="size13 cl_r b7">Please provide strong password</span>');
        // $("#pass").focus();
        return false;

    } else {
        $("#pass").css({ "border": "2px solid green", "padding": "10px" });
        return true;
    }
} //end of function


//clearence saga link on brands images
// $(".term-308 #content, .term-755 #content, .term-767 #content, .term-681 #content, .term-771 #content, .term-434 #content, .term-492 #content").find("img").eq(0).wrap("<a href='https://asanbuy.pk/clearance-saga/'></a>");
// $(".term-308 #content, .term-755 #content, .term-767 #content, .term-681 #content, .term-771 #content, .term-434 #content, .term-492 #content").find("img").eq(0).attr("src", "https://asanbuy.pk/wp-content/uploads/2021/01/clearance-saga-inner-banner-asanbuy.pk_.jpg");

//wordpress ka kaam

// 	var term308=document.getElementsByClassName("term-308")[0];
// // 	var term308=document.getElementById("content").childNodes[1];
// 	term308.setAttribute("src","https://asanbuy.pk/wp-content/uploads/2021/01/clearance-saga-inner-banner-asanbuy.pk_.jpg");
// 	var img1=term308.outerHTML;
// 	var img2="<a href='https://asanbuy.pk/clearance-saga/'>"+img1+"</a>";
// 	term308.outerHTML=img2;

// 	term308.setAttribute('id',"ab212");
// 	document.getElementById("ab212").outerHTML=img2;

// 	var children = document.getElementsByClassName("term-308")[0];// any tag could be used here..

//   for(var i = 0; i< children.length;i++)
//   {
//     if (children.childNodes[i].getAttribute('id') == 'content') // any attribute could be used here
//     {
//      console.log("ahsan bhai");
//      console.log(children.childNodes[i].childNodes[1].outerHTML);

//     }
//   }