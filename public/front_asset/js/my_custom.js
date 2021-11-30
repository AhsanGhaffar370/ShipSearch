$(document).ready(function () {
    $("#check_all").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
    $(document).on('change', "#cargo_type_id,#loading_region_id,#loading_country_id,#loading_port_id,#discharge_region_id,#discharge_country_id,#discharge_port_id,#vessel_type_id,#charter_type_id,#region_id,#country_id,#port_id", function (e) {
        console.log("hello");
        if ($(this).find(':selected').text().includes('Any') && $("#" + (this).id + " option[value=" + $(this).find(':selected').val() + "]").is(":checked")) {
            $('#' + (this).id + ' option').attr("disabled", true);
            $("#" + (this).id + " option[value=" + $(this).find(':selected').val() + "]").removeAttr('disabled');
            $('#' + (this).id + '').selectpicker('refresh');
        }
        if ($(this).find(':selected').text() != "Any") {
            $('#' + (this).id + ' option:contains("Any")').attr("disabled", true);
            $('#' + (this).id + '').selectpicker('refresh');
        }
        if (($("#" + (this).id + " option[value=" + $(this).find(':selected').val() + "]").is(":checked") == false)) {
            $('#' + (this).id + ' option').removeAttr("disabled");
            $('#' + (this).id + '').selectpicker('refresh');
        }
    });
    //cargo
    $('.cargo_type_id').selectpicker();
    $('.loading_region_id').selectpicker();
    $('.loading_country_id').selectpicker();
    $('.loading_port_id').selectpicker();
    $('.discharge_region_id').selectpicker();
    $('.discharge_country_id').selectpicker();
    $('.discharge_port_id').selectpicker();

    //vessel
    $('.vessel_type_id').selectpicker();
    $('.charter_type_id').selectpicker();
    $('.region_id').selectpicker();
    $('.country_id').selectpicker();
    $('.port_id').selectpicker();


    //////////////////////////////////////
    //  highlight comapany detail when user click on view detail button in view cargo page
    //////////////////////////////////////
    let com_url_locat = window.location.href;

    if (com_url_locat.includes("#") && com_url_locat.includes("directory/view")) {
        let com_url_locat_id1 = com_url_locat.split('#');
        let comp_id31 = com_url_locat_id1[com_url_locat_id1.length - 1];
        $(".company_id_" + comp_id31).css({ "color": "#FFFFFF !important", "background-color": "#555555 !important" });
    }

    //////////////////////////////////////
    //  highlight navbar-link when visit any link of navbar.
    //////////////////////////////////////
    if (com_url_locat.includes("cargo"))
        $(".nav_link_cargo").addClass("nav_link_border");
    else if (com_url_locat.includes("vessel_sale"))
        $(".nav_link_vessel_sale").addClass("nav_link_border");
    else if (com_url_locat.includes("vessel"))
        $(".nav_link_vessel").addClass("nav_link_border");
    else if (com_url_locat.includes("directory"))
        $(".nav_link_directory").addClass("nav_link_border");



    //////////////////////////////////////
    // Reset all form fields code
    //////////////////////////////////////
    function reset_homepage_forms() {
        $("input[type=date]").val("");
        $("#cargo_type_id").val('default');
        $("#cargo_type_id").selectpicker("refresh");
        $("#loading_region_id").val('default');
        $("#loading_region_id").selectpicker("refresh");
        $("#loading_country_id").val('default');
        $("#loading_country_id").selectpicker("refresh");
        $("#loading_port_id").val('default');
        $("#loading_port_id").selectpicker("refresh");
        $("#discharge_region_id").val('default');
        $("#discharge_region_id").selectpicker("refresh");
        $("#discharge_country_id").val('default');
        $("#discharge_country_id").selectpicker("refresh");
        $("#discharge_port_id").val('default');
        $("#discharge_port_id").selectpicker("refresh");

        $("#vessel_type_id").val('default');
        $("#vessel_type_id").selectpicker("refresh");
        $("#charter_type_id").val('default');
        $("#charter_type_id").selectpicker("refresh");
        $(".region_id").val('default');
        $(".region_id").selectpicker("refresh");
        $(".country_id").val('default');
        $(".country_id").selectpicker("refresh");
        $(".port_id").val('default');
        $(".port_id").selectpicker("refresh");

        // var par_id = $(this).closest('form').parent().attr('id');
        // let form_id = "";
        // var arr = [];
        // if (par_id == "home_cargo") {
        //     arr = ['cargo_type_id', 'loading_region_id', 'loading_country_id', 'loading_port_id', 'discharge_region_id', 'discharge_country_id', 'discharge_port_id'];
        //     form_id = "search_cargo_form";
        // }
        // if (par_id == "home_vessel") {
        //     arr = ['vessel_type_id', 'charter_type_id', 'region_id', 'country_id', 'port_id'];
        //     form_id = "search_vessel_form";
        // }
        // if (par_id == "home_vsale") {
        //     arr = ['vessel_type_id', 'region_id', 'country_id', 'port_id'];
        //     form_id = "search_vsale_form";
        // }

        var form_ids = ['search_cargo_form', 'search_vessel_form', 'search_vsale_form'];
        $.ajax({
            url: route('cargo.reset_region_country_port'),
            type: "get",
            cache: true,
            success: function (response) {

                let json_data = $.parseJSON(response);

                $.each(form_ids, function (i, form_id) {

                    var arr = [];
                    if (form_id == 'search_cargo_form')
                        arr = ['cargo_type_id', 'loading_region_id', 'loading_country_id', 'loading_port_id', 'discharge_region_id', 'discharge_country_id', 'discharge_port_id'];
                    if (form_id == 'search_vessel_form')
                        arr = ['vessel_type_id', 'charter_type_id', 'region_id', 'country_id', 'port_id'];
                    if (form_id == 'search_vsale_form')
                        arr = ['vessel_type_id', 'region_id', 'country_id', 'port_id'];

                    $.each(arr, function (i, obj) {
                        var post_str = "";
                        post_str += `
                        <select name="` + obj + `[]" id="` + obj + `" form="` + form_id + `"
                            class="` + obj + ` add_cvs_inp_fields abcd ser_inp_fields21 mb-2" multiple title="Choose" data-size="5"
                            data-selected-text-format="count > 2" data-live-search="true">`;

                        if (obj.includes('region')) {
                            post_str += `<option value="26">Any</option>`;
                            $.each(json_data['data']['region'], function (i, obj1) {
                                post_str += `<option value="` + obj1.region_id + `">` + obj1.region_name + `</option>`;
                            });
                        }
                        if (obj.includes('country')) {
                            post_str += `<option value="197">Any</option>`;
                            $.each(json_data['data']['country'], function (i, obj1) {
                                post_str += `<option value="` + obj1.country_id + `">` + obj1.country_name + `</option>`;
                            });
                        }
                        if (obj.includes('port')) {
                            post_str += `<option value="5638">Any</option>`;
                            $.each(json_data['data']['port'], function (i, obj1) {
                                post_str += `<option value="` + obj1.port_id + `">` + obj1.port_name + `</option>`;
                            });
                        }
                        if (obj.includes('cargo_type')) {
                            post_str += `<option value="13" >Any</option>`;
                            $.each(json_data['data']['cargo_type'], function (i, obj1) {
                                post_str += `<option value="` + obj1.cargo_type_id + `">` + obj1.cargo_type_name + `</option>`;
                            });
                        }
                        if (obj.includes('vessel_type')) {
                            post_str += `<option value="11">Any</option>`;
                            $.each(json_data['data']['vessel_type'], function (i, obj1) {
                                post_str += `<option value="` + obj1.vessel_type_id + `">` + obj1.vessel_type_name + `</option>`;
                            });
                        }
                        if (obj.includes('charter_type')) {
                            post_str += `<option value="5">Any</option>`;
                            $.each(json_data['data']['charter_type'], function (i, obj1) {
                                post_str += `<option value="` + obj1.charter_type_id + `">` + obj1.charter_type_name + `</option>`;
                            });
                        }
                        post_str +=
                            `</select>`;

                        $('#' + form_id + ' .' + obj + "_par").html(post_str);
                        $('.' + obj).selectpicker();

                    });
                });
            }
        });
    }



    //////////////////////////////////////
    // Set timeout for homepage 
    //////////////////////////////////////
    setTimeout(function () {


        if (com_url_locat.includes("cargo") || com_url_locat.includes("vessel")) {
            console.log("window loaded");
        } else {
            reset_homepage_forms();
        }
    }, 1000);

    //////////////////////////////////////
    // Working on Reset Button
    //////////////////////////////////////
    $(".reset_btn").click(function (e) {
        e.preventDefault();

        reset_homepage_forms();
    });


    /////////////////////////////////////////////////
    // No Selected Cargo Search History Record
    /////////////////////////////////////////////////
    $(document).on('click', '#car_delete_selected_no', function (e) {
        e.preventDefault();

        $("#show_delete_popup").dialog("close");
    });

    /////////////////////////////////////////////////
    // Delete Selected Cargo Search History Record
    /////////////////////////////////////////////////
    $(document).on("click", '.del_sel_all_ser_hist', function (e) {
        e.preventDefault();

        let del_btn_id = $(this).attr('id');
        let del_type;
        let cvs_name;
        let ids;
        let flag = false;

        if (del_btn_id.includes('selected')) {
            del_type = 'selected';
            ids = $("input[name='delete_selected_rec[]']:checked").map(function () { return $(this).val(); }).get();
            if (ids.length >= 1)
                flag = true;
        }
        if (del_btn_id.includes('all')) {
            del_type = 'all';
            ids = 0;
            flag = true;
        }
        if (del_btn_id.includes('car'))
            cvs_name = 'cargo';
        if (del_btn_id.includes('ves'))
            cvs_name = 'cargo';
        if (del_btn_id.includes('vsale'))
            cvs_name = 'vessel_sale';

        $("#show_delete_popup").dialog("close");

        // let confirmalert = confirm("Are you sure?");

        // if (confirmalert == true) {
        if (flag == true) {
            // AJAX Request
            $.ajax({
                url: route(cvs_name + '.del_selected_ser_hist_rec'),
                data: "ids=" + ids + "&del_type=" + del_type,
                type: "get",
                success: function (response) {
                    if (response == "1") {
                        if (del_type == 'selected') {
                            $.each(ids, function (i, obj) {
                                let table_row = $("#ser_hist_rec_" + obj);
                                table_row.css('background', 'tomato');
                                table_row.fadeOut(800, function () {
                                    table_row.remove();
                                });
                            });
                        }
                        if (del_type == 'all') {
                            let table_row = $(".ser_hist_rec_each");
                            table_row.css('background', 'tomato');
                            table_row.fadeOut(800, function () {
                                table_row.remove();
                            });
                        }
                    } else
                        alert('Something went wrong, please try again');
                }
            });
        } else
            alert('Please Select a record to delete');
        // } 
    });


    function GetFormattedDate(date) {
        // var dateAr = '2014-01-06'.split('-');
        var dateAr = date.split('-');
        var mon = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec',];
        var newDate = dateAr[2] + '-' + mon[parseInt(dateAr[1]) - 1] + '-' + dateAr[0];
        return newDate;
    }


    // $("#home_vessel").hide();
    // $("#home_vsale").hide();
    $('.home_form_link').click(function (e) {
        e.preventDefault();
        var id = $(this).attr("id");

        $('.home_form_link').css({ 'background-color': '#276F6C' })
        $(this).css({ 'background-color': '#06423f' })

        $("#home_cargo").hide();
        $("#home_vessel").hide();
        $("#home_vsale").hide();

        if (id.includes('cargo'))
            $("#home_cargo").show();
        if (id.includes('vessel'))
            $("#home_vessel").show();
        if (id.includes('vsale'))
            $("#home_vsale").show();
        if (id.includes('directory'))
            $("#home_cargo").show();


        // $("#adv_ser_form").slideToggle(500);
    });

    //////////////////////////////////////
    // show record details button
    //////////////////////////////////////
    $('.hide_detail_btn').hide();
    $(document).on("click", '.show_detail_btn', function (e) {
        e.preventDefault();

        if ($("#member_type21").val() == "Free") {
            e.preventDefault();

            $(".ui-dialog-titlebar").hide();
            $("#access_denied").dialog('open');
        } else {
            let id = $(this).attr('href');
            $('.show_details_' + id).fadeToggle("slow");
            $('.show_detail_btn_' + id).hide();
            $('.hide_detail_btn_' + id).show();

            // $(".company_id_" + comp_id31).css({ "color": "#FFFFFF !important", "background-color": "#555555 !important" });
            $(this).parent().parent().css({
                "background-color": "#F1F1F1",
                "color": "#212529 !important"
            });
        }


    });

    //////////////////////////////////////
    // hide record details button
    //////////////////////////////////////
    $(document).on("click", '.hide_detail_btn', function (e) {
        e.preventDefault();
        let id = $(this).attr('href');
        $('.show_details_' + id).fadeToggle("slow");
        $('.show_detail_btn_' + id).show();
        $('.hide_detail_btn_' + id).hide();

        $(this).parent().parent().css({
            "background-color": ""
        });
    });

    //////////////////////////////////////
    // Request for New Search(New Load Search button)
    //////////////////////////////////////
    $('#new_ser_req').click(function (e) {
        e.preventDefault();
        $("#adv_ser_form").show();
        $("#cargo_type_id").focus();
        $(".edit_del_btns").hide();
        $(".ser_hist_rec_each").css({
            'background-color': "white",
            "color": "black"
        });
        // $("#adv_ser_form").slideToggle(500);
    });

    //////////////////////////////////////
    // Close new request search form
    //////////////////////////////////////
    $('#close_ser').click(function (e) {
        e.preventDefault();
        $("#adv_ser_form").hide();
        // $("#adv_ser_form").slideToggle(500);
    });


    ////////////////////////////////////// 
    // Close update search request form of each record
    //////////////////////////////////////
    $(document).on('click', '.close_ser_each', function (e) {
        e.preventDefault();
        let el = e.target;
        // let table_row = $(el).parent().parent().parent();
        let uid = el.getAttribute('href');

        $("#adv_ser_form_each_" + uid).hide();
        $("#ser_hist_rec_" + uid).show();

        $(".edit_del_btns").hide();
        $(".ser_hist_rec_each").css({
            'background-color': "white",
            "color": "black"
        });
    });










    //////////////////////////////////////
    // Cargo Section
    //////////////////////////////////////










    //////////////////////////////////////
    // AJAX Request for Searching records when user click on any record inside search history table.
    //////////////////////////////////////
    $(document).on("click", '.car_ser_hist_rec_req_each', function (e) {

        let id2 = $(this).attr('id');
        let id1 = id2.split('_');
        let id = id1[id1.length - 1];

        $(".edit_del_btns").hide();
        $(".edit_del_btn_" + id).show();

        $(".ser_hist_rec_each").css({
            'background-color': "white",
            "color": "black"
        });
        $(this).css({
            'background-color': "#555555",
            "color": "white"
        });


        $.ajax({
            url: route('cargo.ser_hist_rec'),
            // data: "id=" + id + "&cargotype=" + cargotype + "&laycan_from=" + laycan_from + "&laycan_to=" + laycan_to + "&lregion=" + lregion + "&dregion=" + dregion + "&lcountry=" + lcountry + "&dcountry=" + dcountry + "&lport=" + lport + "&dport=" + dport,
            data: "id=" + id,
            type: "get",
            success: function (response) {

                let json_data = $.parseJSON(response);
                var post_str = "";
                // console.log(json_data)

                if (json_data['data'][0]['length'] == 0) {
                    post_str +=
                        '<tr class=""><td colspan="11"><i>No exact results. Try expanding your filters</i></td></tr>';
                } else {
                    $.each(json_data, function (i, obj) {
                        $.each(obj[0], function (i, obj1) {
                            // console.log(obj1);
                            // console.log(i + "  " + obj1);
                            post_str +=
                                `<tr class="">
                                <td>
                                    <div class="td_h">` +
                                obj1.ref_no +
                                `</div>
                                </td>
                                <td>
                                    <div class="td_h">`;
                            $.each(json_data['data'][1]['cargo_type_id'][obj1.cargo_id], function (i, cargotype_obj) {
                                post_str += cargotype_obj;
                                if (json_data['data'][1]['cargo_type_id'][obj1.cargo_id][json_data['data'][1]['cargo_type_id'][obj1.cargo_id].length - 1] != cargotype_obj)
                                    post_str += `,<br>`;
                            });
                            post_str +=
                                `</div>
                                    <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Loading Country:</p>`;
                            post_str +=
                                `<p class="">`;
                            $.each(json_data['data'][1]['loading_country_id'][obj1.cargo_id], function (i, lcountry_obj) {
                                post_str += lcountry_obj;
                                if (json_data['data'][1]['loading_country_id'][obj1.cargo_id][json_data['data'][1]['loading_country_id'][obj1.cargo_id].length - 1] != lcountry_obj)
                                    post_str += `,<br>`;
                            });
                            post_str +=
                                `</p>
                                            <p class="b7 mb-0">Max LOA:</p>
                                            <p class="">` + obj1.max_loa + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">`;
                            $.each(json_data['data'][1]['loading_region_id'][obj1.cargo_id], function (i, lregion_obj) {
                                post_str += lregion_obj;
                                if (json_data['data'][1]['loading_region_id'][obj1.cargo_id][json_data['data'][1]['loading_region_id'][obj1.cargo_id].length - 1] != lregion_obj)
                                    post_str += `,<br>`;
                            });
                            post_str +=
                                `</div>
                                    <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Loading Port:</p>`;
                            post_str +=
                                `<p class="">`;
                            $.each(json_data['data'][1]['loading_port_id'][obj1.cargo_id], function (i, lport_obj) {
                                post_str += lport_obj;
                                if (json_data['data'][1]['loading_port_id'][obj1.cargo_id][json_data['data'][1]['loading_port_id'][obj1.cargo_id].length - 1] != lport_obj)
                                    post_str += `,<br>`;
                            });
                            post_str +=
                                `</p>
                                            <p class="b7 mb-0">Stowage Factor:</p>
                                            <p class="">` + obj1.stowage_factor + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">`;
                            $.each(json_data['data'][1]['discharge_region_id'][obj1.cargo_id], function (i, dregion_obj) {
                                post_str += dregion_obj;
                                if (json_data['data'][1]['discharge_region_id'][obj1.cargo_id][json_data['data'][1]['discharge_region_id'][obj1.cargo_id].length - 1] != dregion_obj)
                                    post_str += `,<br>`;
                            });
                            post_str +=
                                `</div>
                                    <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Discharge Country:</p>`;
                            post_str +=
                                `<p class="">`;
                            $.each(json_data['data'][1]['discharge_country_id'][obj1.cargo_id], function (i, dcountry_obj) {
                                post_str += dcountry_obj;
                                if (json_data['data'][1]['discharge_country_id'][obj1.cargo_id][json_data['data'][1]['discharge_country_id'][obj1.cargo_id].length - 1] != dcountry_obj)
                                    post_str += `,<br>`;
                            });
                            post_str +=
                                `</p>
                                            <p class="b7 mb-0">Max Height:</p>
                                            <p class="">` + obj1.max_height + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">` +
                                obj1.laycan_date_from +
                                `</div>
                                    <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Discharge Port:</p>`;
                            post_str +=
                                `<p class="">`;
                            $.each(json_data['data'][1]['discharge_port_id'][obj1.cargo_id], function (i, dport_obj) {
                                post_str += dport_obj;
                                if (json_data['data'][1]['discharge_port_id'][obj1.cargo_id][json_data['data'][1]['discharge_port_id'][obj1.cargo_id].length - 1] != dport_obj)
                                    post_str += `,<br>`;
                            });
                            post_str +=
                                `</p>
                                            <p class="b7 mb-0">Loading Equipment Req:</p>
                                            <p class="">` + obj1.loading_equipment_req + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">` +
                                obj1.laycan_date_to +
                                `</div>
                                    <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Over Age:</p>
                                        <p class="">` + obj1.over_age + `</p>
                                        <p class="b7 mb-0">Discharge Equipment Req:</p>
                                        <p class="">` + obj1.discharge_equipment_req + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">` +
                                obj1.quantity +
                                `</div>
                                    <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Hazmat:</p>
                                        <p class="">` + obj1.hazmat + `</p>
                                        <p class="b7 mb-0">Combinable:</p>
                                        <p class="">` + obj1.combinable + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">` +
                                obj1.loading_discharge_rates +
                                `</div>
                                    <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Commission:</p>
                                        <p class="">` + obj1.commision + `</p>
                                        <p class="b7 mb-0">Gear Lifting Capacity:</p>
                                        <p class="">` + obj1.gear_lifting_capacity + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">` +
                                obj1.created_at.split(" ")[0] +
                                `</div>
                                    <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Additional Info:</p>
                                        <p class="">` + obj1.additional_info + `</p>
                                        <p class="b7 mb-0">Company Name:</p>
                                        <a  
                                            href="#" 
                                            class="" 
                                            onclick="event.preventDefault()" 
                                            tabindex="0" 
                                            role="button" 
                                            data-html="true" 
                                            data-toggle="popover" 
                                            data-trigger="click" 
                                            data-placement="left"
                                            title='
                                                <p class="m-0"><b>` + obj1.user_info.company_name + `</b><a href="#" id="popovercloseid" type="button" class="close" >&times;</a></p>
                                            '
                                            data-content='
                                                <p class="size13 b6 m-0">Email </p>
                                                <p class="size11 b4 mb-2">` + obj1.user_info.email + `</p>
                                                <p class="size13 b6 m-0">Phone No </p>
                                                <p class="size11 b4 mb-2">` + obj1.user_info.phone + `</p>
                                                <p class="size13 b6 m-0">Address </p>
                                                <p class="size11 b4 mb-2">` + obj1.user_info.permanent_address + `</p>
                                                <a href= ` + route('directory.view.user', { id: obj1.created_by }) + ` target="_blank" class="btn btn-info btn_xxxs size11 text-white pt-1 pb-1 mr-3">
                                                    View Detail
                                                </a>
                                            '>  
                                            ` + obj1.user_info.company_name + `
                                        </a>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="` + obj1.cargo_id + `" class="show_detail_btn_` + obj1.cargo_id + ` show_detail_btn">
                                    <i class="fas fa-eye fa-2x"></i>
                                    </a>
                                    <a href="` + obj1.cargo_id + `" class="hide_detail_btn_` + obj1.cargo_id + ` hide_detail_btn">
                                    <i class="fas fa-eye-slash fa-2x"></i>
                                    </a>
                                    <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                    
                                    </div>
                                </td>
                            </tr>
                            `;
                            // <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                            //     <p class="b7 mb-0">Email Address:</p>
                            //     <a href="#" class="">` + obj1.user_info.email + `</a>
                            //     <p class="b7 mb-0">Phone No:</p>
                            //     <p class="">` + obj1.user_info.phone + `</p>
                            // </div>
                        });
                    });


                } //end else
                $("#all_records").html(post_str);

                $("#total_rec_found").html(json_data['data'][0]['length'] + " EXACT MATCHES");

                $('.hide_detail_btn').hide();

                $('[data-toggle="popover"]').popover()

            }
        });
    });





    //////////////////////////////////////
    // AJAX Request for delete a record of search history 
    //////////////////////////////////////
    $(document).on('click', '#car_delete_rec', function (e) {
        // $(".delete_rec").click(function(e){
        e.preventDefault();
        let el = e.target;
        let table_row = $(el).closest('tr');
        let deleteid = e.target.getAttribute('href');

        let confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            // AJAX Request
            $.ajax({
                url: route('cargo.del_ser_hist_rec'),
                data: "id=" + deleteid,
                type: "get",
                success: function (response) {
                    // alert(response);
                    if (response == "1") {
                        // Remove row from HTML Table
                        table_row.css('background', 'tomato');
                        table_row.fadeOut(800, function () {
                            table_row.remove();
                        });
                    } else {
                        alert('Invalid ID.');
                    }

                }
            });
        }
    });





    //////////////////////////////////////
    // Show Update search history form when user click on Edit
    //////////////////////////////////////
    $(document).on('click', '#car_show_update_ser_hist_form_each', function (e) {
        e.preventDefault();
        
        let el = e.target;
        let uid = el.getAttribute('href');
        
        $("#adv_ser_form").hide();

        $(".ser_hist_rec_each").show();
        $("#ser_hist_rec_" + uid).hide();

        $(".adv_ser_form_each").hide();
        $("#adv_ser_form_each_" + uid).show();

        $.ajax({
            url: route('cargo.get_update_hist_data'),
            data: "id=" + uid,
            type: "get",
            success: function (response) {

                let json_data = $.parseJSON(response);
                var len = json_data.length;

                $("#laycan_date_from_" + uid).val(json_data['data'][0]['laycan_date_from']);
                $("#laycan_date_to_" + uid).val(json_data['data'][0]['laycan_date_to']);

                let arr = ["cargo_type_id", "loading_region_id", "loading_country_id", "loading_port_id",
                    "discharge_region_id", "discharge_country_id", "discharge_port_id"
                ];

                $.each(arr, function (i, obj1) {

                    let dd_id = "#" + obj1 + "_" + uid;

                    let dd_data_ids = json_data['data'][1][obj1];
                    // let dd_data_arr = dd_data.split(",");

                    $.each(dd_data_ids, function (i, obj2) {
                        // console.log(obj2);
                        $(dd_id + " option[value='" + obj2 + "']").attr("selected", "selected");
                    });

                    $(dd_id).siblings(".btn").attr("class", "btn dropdown-toggle btn-light");

                    if (dd_data_ids.length > 2) {
                        $(dd_id).siblings(".btn").attr("title", dd_data_ids.length + " items selected");
                        $(dd_id).siblings(".btn").find(".filter-option-inner-inner").html(dd_data_ids.length + " items selected");
                    } else {
                        $(dd_id).siblings(".btn").attr("title", json_data['data'][2][obj1]);
                        $(dd_id).siblings(".btn").find(".filter-option-inner-inner").html(json_data['data'][2][obj1]);
                    }
                });

            }
        });
    });



    //////////////////////////////////////
    // AJAX Request for updating search history recod
    //////////////////////////////////////
    $(document).on('click', '.car_req_update_ser_hist_each', function (e) {
        e.preventDefault();
        let el = e.target;
        let uid = el.getAttribute('id').split("_")[1];

        $(".ser_hist_rec_each").show();
        $(".adv_ser_form_each").hide();

        let date_from = $("#laycan_date_from_" + uid).val();
        let date_to = $("#laycan_date_to_" + uid).val();


        let arr = ["cargo_type_id", "loading_region_id", "loading_country_id", "loading_port_id",
            "discharge_region_id", "discharge_country_id", "discharge_port_id"
        ];
        let dd_str_ids = new Array(7);
        let dd_str_names = new Array(7);
        let count = 0;

        $.each(arr, function (i, obj1) {
            let dd_id = "#" + obj1 + "_" + uid;

            var dd_data_ids = $(dd_id).map(function () { return $(this).val(); }).get();
            dd_str_ids[count] = "";
            $.each(dd_data_ids, function (i, obj1) {
                dd_str_ids[count] += obj1 + ",";
            });
            dd_str_ids[count] = dd_str_ids[count].replace(/,+$/, '');


            var dd_data_names = $(dd_id + " :selected").map(function () { return $(this).html(); }).get();
            dd_str_names[count] = "";
            $.each(dd_data_names, function (i, obj1) {
                dd_str_names[count] += obj1 + ",";
            });
            dd_str_names[count] = dd_str_names[count].replace(/,+$/, '');

            count++;
        });
        // console.log("cargo ", dd_str_ids[1]);


        if (date_from == "") {
            alert("Please fill out all fields");
        } else {
            $.ajax({
                url: route('cargo.update_hist_data'),
                data: "id=" + uid + "&cargo_type_id=" + dd_str_ids[0] + "&laycan_date_from=" + date_from +
                    "&laycan_date_to=" + date_to + "&loading_region_id=" + dd_str_ids[1] + "&loading_country_id=" + dd_str_ids[2] +
                    "&loading_port_id=" + dd_str_ids[3] + "&discharge_region_id=" + dd_str_ids[4] +
                    "&discharge_country_id=" + dd_str_ids[5] + "&discharge_port_id=" + dd_str_ids[6],
                type: "get",
                success: function (response) {
                    if (response == false) {
                        alert("something went wrong. Please try again");
                    } else {
                        $("#cargotype-" + uid).html(dd_str_names[0].replace(/,/g, ',<br>'));
                        $("#laycan_from-" + uid).html(date_from);
                        $("#laycan_to-" + uid).html(date_to);
                        $("#lregion-" + uid).html(dd_str_names[1].replace(/,/g, ',<br>'));
                        $("#lcountry-" + uid).html(dd_str_names[2].replace(/,/g, ',<br>'));
                        $("#lport-" + uid).html(dd_str_names[3].replace(/,/g, ',<br>'));
                        $("#dregion-" + uid).html(dd_str_names[4].replace(/,/g, ',<br>'));
                        $("#dcountry-" + uid).html(dd_str_names[5].replace(/,/g, ',<br>'));
                        $("#dport-" + uid).html(dd_str_names[6].replace(/,/g, ',<br>'));

                        let json_data = $.parseJSON(response);
                        var len = json_data.length;
                        var post_str = "";

                        if (json_data['data'][0]['length'] == 0) {
                            post_str +=
                                '<tr class=""><td colspan="11"><i>No exact results. Try expanding your filters</i></td></tr>';
                        } else {
                            $.each(json_data, function (i, obj) {
                                $.each(obj[0], function (i, obj1) {
                                    // console.log(obj1);
                                    // console.log(i + "  " + obj1);
                                    post_str +=
                                        `<tr class="">
                                        <td>
                                            <div class="td_h">` +
                                        obj1.ref_no +
                                        `</div>
                                        </td>
                                        <td>
                                            <div class="td_h">`;
                                    $.each(json_data['data'][1]['cargo_type_id'][obj1.cargo_id], function (i, cargotype_obj) {
                                        post_str += cargotype_obj;
                                        if (json_data['data'][1]['cargo_type_id'][obj1.cargo_id][json_data['data'][1]['cargo_type_id'][obj1.cargo_id].length - 1] != cargotype_obj)
                                            post_str += `,<br>`;
                                    });
                                    post_str +=
                                        `</div>
                                            <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Loading Country:</p>`;
                                    post_str +=
                                        `<p class="">`;
                                    $.each(json_data['data'][1]['loading_country_id'][obj1.cargo_id], function (i, lcountry_obj) {
                                        post_str += lcountry_obj;
                                        if (json_data['data'][1]['loading_country_id'][obj1.cargo_id][json_data['data'][1]['loading_country_id'][obj1.cargo_id].length - 1] != lcountry_obj)
                                            post_str += `,<br>`;
                                    });
                                    post_str +=
                                        `</p>
                                                    <p class="b7 mb-0">Max LOA:</p>
                                                    <p class="">` + obj1.max_loa + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">`;
                                    $.each(json_data['data'][1]['loading_region_id'][obj1.cargo_id], function (i, lregion_obj) {
                                        post_str += lregion_obj;
                                        if (json_data['data'][1]['loading_region_id'][obj1.cargo_id][json_data['data'][1]['loading_region_id'][obj1.cargo_id].length - 1] != lregion_obj)
                                            post_str += `,<br>`;
                                    });
                                    post_str +=
                                        `</div>
                                            <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Loading Port:</p>`;
                                    post_str +=
                                        `<p class="">`;
                                    $.each(json_data['data'][1]['loading_port_id'][obj1.cargo_id], function (i, lport_obj) {
                                        post_str += lport_obj;
                                        if (json_data['data'][1]['loading_port_id'][obj1.cargo_id][json_data['data'][1]['loading_port_id'][obj1.cargo_id].length - 1] != lport_obj)
                                            post_str += `,<br>`;
                                    });
                                    post_str +=
                                        `</p>
                                                    <p class="b7 mb-0">Stowage Factor:</p>
                                                    <p class="">` + obj1.stowage_factor + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">`;
                                    $.each(json_data['data'][1]['discharge_region_id'][obj1.cargo_id], function (i, dregion_obj) {
                                        post_str += dregion_obj;
                                        if (json_data['data'][1]['discharge_region_id'][obj1.cargo_id][json_data['data'][1]['discharge_region_id'][obj1.cargo_id].length - 1] != dregion_obj)
                                            post_str += `,<br>`;
                                    });
                                    post_str +=
                                        `</div>
                                            <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Discharge Country:</p>`;
                                    post_str +=
                                        `<p class="">`;
                                    $.each(json_data['data'][1]['discharge_country_id'][obj1.cargo_id], function (i, dcountry_obj) {
                                        post_str += dcountry_obj;
                                        if (json_data['data'][1]['discharge_country_id'][obj1.cargo_id][json_data['data'][1]['discharge_country_id'][obj1.cargo_id].length - 1] != dcountry_obj)
                                            post_str += `,<br>`;
                                    });
                                    post_str +=
                                        `</p>
                                                    <p class="b7 mb-0">Max Height:</p>
                                                    <p class="">` + obj1.max_height + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">` +
                                        obj1.laycan_date_from +
                                        `</div>
                                            <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Discharge Port:</p>`;
                                    post_str +=
                                        `<p class="">`;
                                    $.each(json_data['data'][1]['discharge_port_id'][obj1.cargo_id], function (i, dport_obj) {
                                        post_str += dport_obj;
                                        if (json_data['data'][1]['discharge_port_id'][obj1.cargo_id][json_data['data'][1]['discharge_port_id'][obj1.cargo_id].length - 1] != dport_obj)
                                            post_str += `,<br>`;
                                    });
                                    post_str +=
                                        `</p>
                                                    <p class="b7 mb-0">Loading Equipment Req:</p>
                                                    <p class="">` + obj1.loading_equipment_req + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">` +
                                        obj1.laycan_date_to +
                                        `</div>
                                            <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Over Age:</p>
                                                <p class="">` + obj1.over_age + `</p>
                                                <p class="b7 mb-0">Discharge Equipment Req:</p>
                                                <p class="">` + obj1.discharge_equipment_req + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">` +
                                        obj1.quantity +
                                        `</div>
                                            <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Hazmat:</p>
                                                <p class="">` + obj1.hazmat + `</p>
                                                <p class="b7 mb-0">Combinable:</p>
                                                <p class="">` + obj1.combinable + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">` +
                                        obj1.loading_discharge_rates +
                                        `</div>
                                            <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Commission:</p>
                                                <p class="">` + obj1.commision + `</p>
                                                <p class="b7 mb-0">Gear Lifting Capacity:</p>
                                                <p class="">` + obj1.gear_lifting_capacity + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">` +
                                        obj1.created_at.split(" ")[0] +
                                        `</div>
                                            <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Additional Info:</p>
                                                <p class="">` + obj1.additional_info + `</p>
                                                <p class="b7 mb-0">Company Name:</p>
                                                <a  
                                                    href="#" 
                                                    class="" 
                                                    onclick="event.preventDefault()" 
                                                    tabindex="0" 
                                                    role="button" 
                                                    data-html="true" 
                                                    data-toggle="popover" 
                                                    data-trigger="click" 
                                                    data-placement="left" 
                                                    title=' 
                                                        <p class="m-0"><b>` + obj1.user_info.company_name + `</b><a href="#" id="popovercloseid" type="button" class="close" >&times;</a></p>
                                                    '
                                                    data-content='
                                                        <p class="size13 b6 m-0">Email </p>
                                                        <p class="size11 b4 mb-2">` + obj1.user_info.email + `</p>
                                                        <p class="size13 b6 m-0">Phone No </p>
                                                        <p class="size11 b4 mb-2">` + obj1.user_info.phone + `</p>
                                                        <p class="size13 b6 m-0">Address </p>
                                                        <p class="size11 b4 mb-2">` + obj1.user_info.permanent_address + `</p>
                                                        <a href= ` + route('directory.view.user', { id: obj1.created_by }) + ` target="_blank" class="btn btn-info btn_xxxs size11 text-white pt-1 pb-1 mr-3">
                                                            View Detail
                                                        </a>
                                                    '>  
                                                    ` + obj1.user_info.company_name + `
                                                </a>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="` + obj1.cargo_id + `" class="show_detail_btn_` + obj1.cargo_id + ` show_detail_btn">
                                            <i class="fas fa-eye fa-2x"></i>
                                            </a>
                                            <a href="` + obj1.cargo_id + `" class="hide_detail_btn_` + obj1.cargo_id + ` hide_detail_btn">
                                            <i class="fas fa-eye-slash fa-2x"></i>
                                            </a>
                                            <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                            
                                            </div>
                                        </td>
                                    </tr>
                                    `;
                                    // <div class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                    //     <p class="b7 mb-0">Email Address:</p>
                                    //     <a href="#" class="">` + obj1.user_info.email + `</a>
                                    //     <p class="b7 mb-0">Phone No:</p>
                                    //     <p class="">` + obj1.user_info.phone + `</p>
                                    // </div>
                                });
                            });
                        } //end else
                        $("#all_records").html(post_str);

                        $("#total_rec_found").html(json_data['data'][0]['length'] + " EXACT MATCHES");

                        $('.hide_detail_btn').hide();

                        $('[data-toggle="popover"]').popover()
                    }
                }
            });
        }
    });










    //////////////////////////////////////
    // Vessel Section
    //////////////////////////////////////











    //////////////////////////////////////
    // AJAX Request for Searching records when user click on any record inside search history table.
    //////////////////////////////////////

    $(document).on("click", '.ves_ser_hist_rec_req_each', function (e) {

        let id2 = $(this).attr('id');
        let id1 = id2.split('_');
        let id = id1[id1.length - 1];

        $(".edit_del_btns").hide();
        $(".edit_del_btn_" + id).show();

        $(".ser_hist_rec_each").css({
            'background-color': "white",
            "color": "black"
        });
        $(this).css({
            'background-color': "#555555",
            "color": "white"
        });
        
        $.ajax({
            url: route('vessel.ser_hist_rec'),
            // data: "id=" + id + "&cargotype=" + cargotype + "&laycan_from=" + laycan_from + "&laycan_to=" + laycan_to + "&lregion=" + lregion + "&dregion=" + dregion + "&lcountry=" + lcountry + "&dcountry=" + dcountry + "&lport=" + lport + "&dport=" + dport,
            data: "id=" + id,
            type: "get",
            success: function (response) {

                let json_data = $.parseJSON(response);
                var len = json_data.length;
                var post_str = "";
                // console.log(json_data['data'][0]['cargo_name'])

                if (json_data['data'][0]['length'] == 0) {
                    post_str +=
                        '<tr class=""><td colspan="11"><i>No exact results. Try expanding your filters</i></td></tr>';
                } else {
                    $.each(json_data, function (i, obj) {
                        $.each(obj[0], function (i, obj1) {
                            // console.log(obj1);
                            // console.log(i + "  " + obj1);
                            post_str +=
                                `<tr class="">
                                <td>
                                    <div class="td_h">` +
                                obj1.ref_no +
                                `</div>
                                    <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Built Year:</p>
                                        <p class="">` + obj1.built_year + `</p>
                                        <p class="b7 mb-0">DWT:</p>
                                        <p class="">` + obj1.dwt + `</p>
                                        <p class="b7 mb-0">DWCC:</p>
                                        <p class="">` + obj1.dwcc + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">` +
                                obj1.vessel_name +
                                `</div>
                                    <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">IMO Number:</p>
                                        <p class="">` + obj1.imo_number + `</p>
                                        <p class="b7 mb-0">Call Sign:</p>
                                        <p class="">` + obj1.call_sign + `</p>
                                        <p class="b7 mb-0">Speed Ballast:</p>
                                        <p class="">` + obj1.speed_ballast + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">`;
                            // + obj1.vessel_type_id.replace(/,/g, ',<br>') +
                            post_str +=
                                $.each(json_data['data'][1]['vessel_type_id'][obj1.vessel_id], function (i, vesseltype_obj) {
                                    post_str += vesseltype_obj;
                                    if (json_data['data'][1]['vessel_type_id'][obj1.vessel_id][json_data['data'][1]['vessel_type_id'][obj1.vessel_id].length - 1] != vesseltype_obj)
                                        post_str += `,<br>`;
                                });
                            post_str +=
                                `</div>
                                    <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Speed Laden:</p>
                                        <p class="">` + obj1.speed_laden + `</p>
                                        <p class="b7 mb-0">Gross Tonnage:</p>
                                        <p class="">` + obj1.gross_tonnage + `</p>
                                        <p class="b7 mb-0">Net Tonnage:</p>
                                        <p class="">` + obj1.net_tonnage + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">`;
                            // + obj1.charter_type_id.replace(/,/g, ',<br>') +
                            post_str +=
                                $.each(json_data['data'][1]['charter_type_id'][obj1.vessel_id], function (i, chartertype_obj) {
                                    post_str += chartertype_obj;
                                    if (json_data['data'][1]['charter_type_id'][obj1.vessel_id][json_data['data'][1]['charter_type_id'][obj1.vessel_id].length - 1] != chartertype_obj)
                                        post_str += `,<br>`;
                                });
                            post_str +=
                                `</div>
                                    <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">LOA Max:</p>
                                        <p class="">` + obj1.loa_max + `</p>
                                        <p class="b7 mb-0">Beam Max:</p>
                                        <p class="">` + obj1.beam_max + `</p>
                                        <p class="b7 mb-0">Summer Draft:</p>
                                        <p class="">` + obj1.summer_draft + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">` +
                                obj1.laycan_date_from +
                                `</div>
                                    <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Fresh Water Draft:</p>
                                        <p class="">` + obj1.fresh_water_draft + `</p>
                                        <p class="b7 mb-0">Grain Capacity:</p>
                                        <p class="">` + obj1.grain_capacity + `</p>
                                        <p class="b7 mb-0">Bale Capacity:</p>
                                        <p class="">` + obj1.bale_capacity + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">` +
                                obj1.laycan_date_to +
                                `</div>
                                    <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Container Capacity 20FT:</p>
                                        <p class="">` + obj1.container_capacity_20ft + `</p>
                                        <p class="b7 mb-0">Container Capacity 40FT:</p>
                                        <p class="">` + obj1.container_capacity_40ft + `</p>
                                        <p class="b7 mb-0">Container Capacity 40CH:</p>
                                        <p class="">` + obj1.container_capacity_40ch + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">`;
                            // + obj1.region_id.replace(/,/g, ',<br>') +
                            post_str +=
                                $.each(json_data['data'][1]['region_id'][obj1.vessel_id], function (i, region_obj) {
                                    post_str += region_obj;
                                    if (json_data['data'][1]['region_id'][obj1.vessel_id][json_data['data'][1]['region_id'][obj1.vessel_id].length - 1] != region_obj)
                                        post_str += `,<br>`;
                                });
                            post_str +=
                                `</div>
                                    <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">IFO Consumption Empty:</p>
                                        <p class="">` + obj1.ifo_consumption_empty + `</p>
                                        <p class="b7 mb-0">IFO Consumption Laden:</p>
                                        <p class="">` + obj1.ifo_consumption_laden + `</p>
                                        <p class="b7 mb-0">IFO Consumption Port:</p>
                                        <p class="">` + obj1.ifo_consumption_port + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">`;
                            // + obj1.country_id.replace(/,/g, ',<br>') +
                            post_str +=
                                $.each(json_data['data'][1]['country_id'][obj1.vessel_id], function (i, country_obj) {
                                    post_str += country_obj;
                                    if (json_data['data'][1]['country_id'][obj1.vessel_id][json_data['data'][1]['country_id'][obj1.vessel_id].length - 1] != country_obj)
                                        post_str += `,<br>`;
                                });
                            post_str +=
                                `</div>
                                    <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">MGO Consumption Empty:</p>
                                        <p class="">` + obj1.mgo_consumption_empty + `</p>
                                        <p class="b7 mb-0">MGO Consumption Laden:</p>
                                        <p class="">` + obj1.mgo_consumption_laden + `</p>
                                        <p class="b7 mb-0">MGO Consumption Port:</p>
                                        <p class="">` + obj1.mgo_consumption_port + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">`;
                            // + obj1.port_id.replace(/,/g, ',<br>') +
                            post_str +=
                                $.each(json_data['data'][1]['port_id'][obj1.vessel_id], function (i, port_obj) {
                                    post_str += port_obj;
                                    if (json_data['data'][1]['port_id'][obj1.vessel_id][json_data['data'][1]['port_id'][obj1.vessel_id].length - 1] != port_obj)
                                        post_str += `,<br>`;
                                });
                            post_str +=
                                `</div>
                                    <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Lane Meters:</p>
                                        <p class="">` + obj1.lane_meters + `</p>
                                        <p class="b7 mb-0">P I Club:</p>
                                        <p class="">` + obj1.p_i_club + `</p>
                                        <p class="b7 mb-0">Classed By:</p>
                                        <p class="">` + obj1.classed_by + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">` +
                                obj1.created_at.split(" ")[0] +
                                `</div>
                                    <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Additional Info:</p>
                                        <p class="">` + obj1.additional_info + `</p>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="` + obj1.vessel_id + `" class="show_detail_btn_` + obj1.vessel_id + ` show_detail_btn">
                                        <i class="fas fa-eye fa-2x"></i>
                                    </a>
                                    <a href="` + obj1.vessel_id + `" class="hide_detail_btn_` + obj1.vessel_id + ` hide_detail_btn">
                                        <i class="fas fa-eye-slash fa-2x"></i>
                                    </a>
                                </td>
                            </tr>     
                            `;
                        });
                    });


                } //end else
                $("#all_records").html(post_str);

                $("#total_rec_found").html(json_data['data'][0]['length'] + " EXACT MATCHES");

                $('.hide_detail_btn').hide();

            }
        });
    });






    //////////////////////////////////////
    // AJAX Request for delete a record of search history 
    //////////////////////////////////////
    $(document).on('click', '#ves_delete_rec', function (e) {
        // $(".delete_rec").click(function(e){
        e.preventDefault();
        let el = e.target;
        let table_row = $(el).parent().parent().parent();
        let deleteid = e.target.getAttribute('href');

        let confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            // AJAX Request
            $.ajax({
                url: route('vessel.del_ser_hist_rec'),
                data: "id=" + deleteid,
                type: "get",
                success: function (response) {
                    // alert(response);
                    if (response == "1") {
                        // Remove row from HTML Table
                        table_row.css('background', 'red');
                        table_row.fadeOut(800, function () {
                            table_row.remove();
                        });
                    } else {
                        alert('Invalid ID.');
                    }

                }
            });
        }
    });








    //////////////////////////////////////
    // Show Update search history form when user click on Edit
    //////////////////////////////////////
    $(document).on('click', '#ves_show_update_ser_hist_form_each', function (e) {
        e.preventDefault();
        let el = e.target;
        let uid = el.getAttribute('href');

        $("#adv_ser_form").hide();

        $(".ser_hist_rec_each").show();
        $("#ser_hist_rec_" + uid).hide();

        $(".adv_ser_form_each").hide();
        $("#adv_ser_form_each_" + uid).show();

        $.ajax({
            url: route('vessel.get_update_hist_data'),
            data: "id=" + uid,
            type: "get",
            success: function (response) {

                let json_data = $.parseJSON(response);
                var len = json_data.length;

                $("#laycan_date_from_" + uid).val(json_data['data'][0]['laycan_date_from']);
                $("#laycan_date_to_" + uid).val(json_data['data'][0]['laycan_date_to']);

                let arr = ["vessel_type_id", "charter_type_id", "region_id", "country_id", "port_id"];

                $.each(arr, function (i, obj1) {

                    let dd_id = "#" + obj1 + "_" + uid;

                    let dd_data_ids = json_data['data'][1][obj1];
                    // let dd_data_arr = dd_data.split(",");

                    $.each(dd_data_ids, function (i, obj2) {
                        $(dd_id + " option[value='" + obj2 + "']").attr("selected", "selected");
                    });

                    $(dd_id).siblings(".btn").attr("class", "btn dropdown-toggle btn-light");

                    if (dd_data_ids.length > 2) {
                        $(dd_id).siblings(".btn").attr("title", dd_data_ids.length + " items selected");
                        $(dd_id).siblings(".btn").find(".filter-option-inner-inner").html(dd_data_ids.length + " items selected");
                    } else {
                        $(dd_id).siblings(".btn").attr("title", json_data['data'][2][obj1]);
                        $(dd_id).siblings(".btn").find(".filter-option-inner-inner").html(json_data['data'][2][obj1]);
                    }
                });

            }
        });
    });



    //////////////////////////////////////
    // AJAX Request for updating search history recod
    //////////////////////////////////////
    $(document).on('click', '.ves_req_update_ser_hist_each', function (e) {
        e.preventDefault();
        let el = e.target;
        let uid = el.getAttribute('id').split("_")[1];

        $(".ser_hist_rec_each").show();
        $(".adv_ser_form_each").hide();

        let date_from = $("#laycan_date_from_" + uid).val();
        let date_to = $("#laycan_date_to_" + uid).val();
        let dwt_from = $("#dwt_from_" + uid).val();
        let dwt_to = $("#dwt_to_" + uid).val();


        let arr = ["vessel_type_id", "charter_type_id", "region_id", "country_id", "port_id"];

        let dd_str_ids = new Array(7);
        let dd_str_names = new Array(7);
        // let dd_str = new Array(5);
        let count = 0;

        $.each(arr, function (i, obj1) {
            let dd_id = "#" + obj1 + "_" + uid;

            var dd_data_ids = $(dd_id).map(function () { return $(this).val(); }).get();
            dd_str_ids[count] = "";
            $.each(dd_data_ids, function (i, obj1) {
                dd_str_ids[count] += obj1 + ",";
            });
            dd_str_ids[count] = dd_str_ids[count].replace(/,+$/, '');


            var dd_data_names = $(dd_id + " :selected").map(function () { return $(this).html(); }).get();
            dd_str_names[count] = "";
            $.each(dd_data_names, function (i, obj1) {
                dd_str_names[count] += obj1 + ",";
            });
            dd_str_names[count] = dd_str_names[count].replace(/,+$/, '');

            count++;
        });

        // console.log("cargo ", dd_str[1]);


        if (date_from == "") {
            alert("Please fill out all fields");
        } else {
            $.ajax({
                url: route('vessel.update_hist_data'),
                data: "id=" + uid + "&vessel_type_id=" + dd_str_ids[0] + "&charter_type_id=" + dd_str_ids[1] + "&laycan_date_from=" + date_from +
                    "&laycan_date_to=" + date_to + "&region_id=" + dd_str_ids[2] + "&country_id=" + dd_str_ids[3] +
                    "&port_id=" + dd_str_ids[4]+"&dwt_from=" + dwt_from+"&dwt_to=" + dwt_to,
                type: "get",
                success: function (response) {
                    if (response == false) {
                        alert("something went wrong. Please try again");
                    } else {
                        $("#vesseltype-" + uid).html(dd_str_names[0].replace(/,/g, ',<br>'));
                        $("#chartertype-" + uid).html(dd_str_names[1].replace(/,/g, ',<br>'));
                        $("#laycan_from-" + uid).html(date_from);
                        $("#laycan_to-" + uid).html(date_to);
                        $("#region-" + uid).html(dd_str_names[2].replace(/,/g, ',<br>'));
                        $("#country-" + uid).html(dd_str_names[3].replace(/,/g, ',<br>'));
                        $("#port-" + uid).html(dd_str_names[4].replace(/,/g, ',<br>'));

                        let json_data = $.parseJSON(response);
                        var len = json_data.length;
                        var post_str = "";
                        // console.log(json_data['data'][0]['cargo_name'])

                        if (json_data['data'][0]['length'] == 0) {
                            post_str +=
                                '<tr class=""><td colspan="11"><i>No exact results. Try expanding your filters</i></td></tr>';
                        } else {
                            $.each(json_data, function (i, obj) {
                                $.each(obj[0], function (i, obj1) {
                                    // console.log(obj1);
                                    // console.log(i + "  " + obj1);
                                    post_str +=
                                        `<tr class="">
                                        <td>
                                            <div class="td_h">` +
                                        obj1.ref_no +
                                        `</div>
                                            <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Built Year:</p>
                                                <p class="">` + obj1.built_year + `</p>
                                                <p class="b7 mb-0">DWT:</p>
                                                <p class="">` + obj1.dwt + `</p>
                                                <p class="b7 mb-0">DWCC:</p>
                                                <p class="">` + obj1.dwcc + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">` +
                                        obj1.vessel_name +
                                        `</div>
                                            <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">IMO Number:</p>
                                                <p class="">` + obj1.imo_number + `</p>
                                                <p class="b7 mb-0">Call Sign:</p>
                                                <p class="">` + obj1.call_sign + `</p>
                                                <p class="b7 mb-0">Speed Ballast:</p>
                                                <p class="">` + obj1.speed_ballast + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">`;
                                    // + obj1.vessel_type_id.replace(/,/g, ',<br>') +
                                    post_str +=
                                        $.each(json_data['data'][1]['vessel_type_id'][obj1.vessel_id], function (i, vesseltype_obj) {
                                            post_str += vesseltype_obj;
                                            if (json_data['data'][1]['vessel_type_id'][obj1.vessel_id][json_data['data'][1]['vessel_type_id'][obj1.vessel_id].length - 1] != vesseltype_obj)
                                                post_str += `,<br>`;
                                        });
                                    post_str +=
                                        `</div>
                                            <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Speed Laden:</p>
                                                <p class="">` + obj1.speed_laden + `</p>
                                                <p class="b7 mb-0">Gross Tonnage:</p>
                                                <p class="">` + obj1.gross_tonnage + `</p>
                                                <p class="b7 mb-0">Net Tonnage:</p>
                                                <p class="">` + obj1.net_tonnage + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">`;
                                    // + obj1.charter_type_id.replace(/,/g, ',<br>') +
                                    post_str +=
                                        $.each(json_data['data'][1]['charter_type_id'][obj1.vessel_id], function (i, chartertype_obj) {
                                            post_str += chartertype_obj;
                                            if (json_data['data'][1]['charter_type_id'][obj1.vessel_id][json_data['data'][1]['charter_type_id'][obj1.vessel_id].length - 1] != chartertype_obj)
                                                post_str += `,<br>`;
                                        });
                                    post_str +=
                                        `</div>
                                            <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">LOA Max:</p>
                                                <p class="">` + obj1.loa_max + `</p>
                                                <p class="b7 mb-0">Beam Max:</p>
                                                <p class="">` + obj1.beam_max + `</p>
                                                <p class="b7 mb-0">Summer Draft:</p>
                                                <p class="">` + obj1.summer_draft + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">` +
                                        obj1.laycan_date_from +
                                        `</div>
                                            <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Fresh Water Draft:</p>
                                                <p class="">` + obj1.fresh_water_draft + `</p>
                                                <p class="b7 mb-0">Grain Capacity:</p>
                                                <p class="">` + obj1.grain_capacity + `</p>
                                                <p class="b7 mb-0">Bale Capacity:</p>
                                                <p class="">` + obj1.bale_capacity + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">` +
                                        obj1.laycan_date_to +
                                        `</div>
                                            <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Container Capacity 20FT:</p>
                                                <p class="">` + obj1.container_capacity_20ft + `</p>
                                                <p class="b7 mb-0">Container Capacity 40FT:</p>
                                                <p class="">` + obj1.container_capacity_40ft + `</p>
                                                <p class="b7 mb-0">Container Capacity 40CH:</p>
                                                <p class="">` + obj1.container_capacity_40ch + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">`;
                                    // + obj1.region_id.replace(/,/g, ',<br>') +
                                    post_str +=
                                        $.each(json_data['data'][1]['region_id'][obj1.vessel_id], function (i, region_obj) {
                                            post_str += region_obj;
                                            if (json_data['data'][1]['region_id'][obj1.vessel_id][json_data['data'][1]['region_id'][obj1.vessel_id].length - 1] != region_obj)
                                                post_str += `,<br>`;
                                        });
                                    post_str +=
                                        `</div>
                                            <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">IFO Consumption Empty:</p>
                                                <p class="">` + obj1.ifo_consumption_empty + `</p>
                                                <p class="b7 mb-0">IFO Consumption Laden:</p>
                                                <p class="">` + obj1.ifo_consumption_laden + `</p>
                                                <p class="b7 mb-0">IFO Consumption Port:</p>
                                                <p class="">` + obj1.ifo_consumption_port + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">`;
                                    // + obj1.country_id.replace(/,/g, ',<br>') +
                                    post_str +=
                                        $.each(json_data['data'][1]['country_id'][obj1.vessel_id], function (i, country_obj) {
                                            post_str += country_obj;
                                            if (json_data['data'][1]['country_id'][obj1.vessel_id][json_data['data'][1]['country_id'][obj1.vessel_id].length - 1] != country_obj)
                                                post_str += `,<br>`;
                                        });
                                    post_str +=
                                        `</div>
                                            <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">MGO Consumption Empty:</p>
                                                <p class="">` + obj1.mgo_consumption_empty + `</p>
                                                <p class="b7 mb-0">MGO Consumption Laden:</p>
                                                <p class="">` + obj1.mgo_consumption_laden + `</p>
                                                <p class="b7 mb-0">MGO Consumption Port:</p>
                                                <p class="">` + obj1.mgo_consumption_port + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">`;
                                    // + obj1.port_id.replace(/,/g, ',<br>') +
                                    post_str +=
                                        $.each(json_data['data'][1]['port_id'][obj1.vessel_id], function (i, port_obj) {
                                            post_str += port_obj;
                                            if (json_data['data'][1]['port_id'][obj1.vessel_id][json_data['data'][1]['port_id'][obj1.vessel_id].length - 1] != port_obj)
                                                post_str += `,<br>`;
                                        });
                                    post_str +=
                                        `</div>
                                            <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Lane Meters:</p>
                                                <p class="">` + obj1.lane_meters + `</p>
                                                <p class="b7 mb-0">P I Club:</p>
                                                <p class="">` + obj1.p_i_club + `</p>
                                                <p class="b7 mb-0">Classed By:</p>
                                                <p class="">` + obj1.classed_by + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">` +
                                        obj1.created_at.split(" ")[0] +
                                        `</div>
                                            <div class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Additional Info:</p>
                                                <p class="">` + obj1.additional_info + `</p>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="` + obj1.vessel_id + `" class="show_detail_btn_` + obj1.vessel_id + ` show_detail_btn">
                                                <i class="fas fa-eye fa-2x"></i>
                                            </a>
                                            <a href="` + obj1.vessel_id + `" class="hide_detail_btn_` + obj1.vessel_id + ` hide_detail_btn">
                                                <i class="fas fa-eye-slash fa-2x"></i>
                                            </a>
                                        </td>
                                    </tr>     
                                    `;
                                });
                            });
                        } //end else
                        $("#all_records").html(post_str);

                        $("#total_rec_found").html(json_data['data'][0]['length'] + " EXACT MATCHES");

                        $('.hide_detail_btn').hide();
                    }
                }
            });
        }
    });














    //////////////////////////////////////
    // Vessel Sale Section
    //////////////////////////////////////










    //////////////////////////////////////
    // AJAX Request for Searching records when user click on any record inside search history table.
    //////////////////////////////////////
    $(document).on("click", '.vsale_ser_hist_rec_req_each', function (e) {

        let id2 = $(this).attr('id');
        let id1 = id2.split('_');
        let id = id1[id1.length - 1];

        $(".edit_del_btns").hide();
        $(".edit_del_btn_" + id).show();

        $(".ser_hist_rec_each").css({
            'background-color': "white",
            "color": "black"
        });
        $(this).css({
            'background-color': "#555555",
            "color": "white"
        });

        $.ajax({
            url: route('vessel_sale.ser_hist_rec'),
            // data: "id=" + id + "&cargotype=" + cargotype + "&date_available=" + date_available + "&operations_date=" + operations_date + "&lregion=" + lregion + "&dregion=" + dregion + "&lcountry=" + lcountry + "&dcountry=" + dcountry + "&lport=" + lport + "&dport=" + dport,
            data: "id=" + id,
            type: "get",
            success: function (response) {

                let json_data = $.parseJSON(response);
                var len = json_data.length;
                var post_str = "";
                // console.log(json_data['data'][0]['cargo_name'])

                if (json_data['data'][0]['length'] == 0) {
                    post_str +=
                        '<tr class=""><td colspan="11"><i>No exact results. Try expanding your filters</i></td></tr>';
                } else {
                    $.each(json_data, function (i, obj) {
                        $.each(obj[0], function (i, obj1) {
                            // console.log(obj1);
                            // console.log(i + "  " + obj1);
                            post_str +=
                                `<tr class="">
                                <td>
                                    <div class="td_h">` +
                                obj1.ref_no +
                                `</div>
                                </td>
                                <td>
                                    <div class="td_h">
                                        <img src="http://www.eqan.net/shipsearch/public/storage/vessel_sale_images/` + obj1.vessel_img.split(',')[0] + `" width="80" id="show_img31" 
                                        class="img-thumbnail img-fluid" alt="vessel img" style="cursor: zoom-in;">`;
                            let count_img = 0;
                            $.each(obj1.vessel_img.split(','), function (i, vessel_img21) {
                                if (count_img != 0) {
                                    post_str += `<img src="http://www.eqan.net/shipsearch/public/storage/vessel_sale_images/` + vessel_img21 + `" class="img-thumbnail img-fluid d_n">`;
                                }
                                count_img++;
                            });
                            post_str +=
                                `
                                    </div> 
                                </td>
                                <td>
                                    <div class="td_h">`;
                            $.each(json_data['data'][1]['vessel_type_id'][obj1.vessel_sale_id], function (i, vesseltype_obj) {
                                post_str += vesseltype_obj;
                                if (json_data['data'][1]['vessel_type_id'][obj1.vessel_sale_id][json_data['data'][1]['vessel_type_id'][obj1.vessel_sale_id].length - 1] != vesseltype_obj)
                                    post_str += `,<br>`;
                            });
                            post_str +=
                                // + obj1.vessel_type_id.replace(/,/g, ',<br>') +
                                `</div>
                                    <div class="show_details show_details_` + obj1.vessel_sale_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Last Dry Docked:</p>
                                        <p class="">` + obj1.last_dry_docked + `</p>
                                        <p class="b7 mb-0">Last SS:</p>
                                        <p class="">` + obj1.last_ss + `</p>
                                        <p class="b7 mb-0">Classification:</p>
                                        <p class="">` + obj1.classification + `</p>
                                        <p class="b7 mb-0">GRT:</p>
                                        <p class="">` + obj1.grt + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">`;
                            $.each(json_data['data'][1]['region_id'][obj1.vessel_sale_id], function (i, region_obj) {
                                post_str += region_obj;
                                if (json_data['data'][1]['region_id'][obj1.vessel_sale_id][json_data['data'][1]['region_id'][obj1.vessel_sale_id].length - 1] != region_obj)
                                    post_str += `,<br>`;
                            });
                            post_str +=
                                // + obj1.region_id.replace(/,/g, ',<br>')  +
                                `</div>
                                    <div class="show_details show_details_` + obj1.vessel_sale_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">NRT:</p>
                                        <p class="">` + obj1.nrt + `</p>
                                        <p class="b7 mb-0">DWT:</p>
                                        <p class="">` + obj1.dwt + `</p>
                                        <p class="b7 mb-0">Light Weight:</p>
                                        <p class="">` + obj1.lightweight + `</p>
                                        <p class="b7 mb-0">Speed:</p>
                                        <p class="">` + obj1.speed + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">`;
                            $.each(json_data['data'][1]['country_id'][obj1.vessel_sale_id], function (i, country_obj) {
                                post_str += country_obj;
                                if (json_data['data'][1]['country_id'][obj1.vessel_sale_id][json_data['data'][1]['country_id'][obj1.vessel_sale_id].length - 1] != country_obj)
                                    post_str += `,<br>`;
                            });
                            post_str +=
                                // + obj1.country_id.replace(/,/g, ',<br>')  +
                                `</div>
                                    <div class="show_details show_details_` + obj1.vessel_sale_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Consumption:</p>
                                        <p class="">` + obj1.consumption + `</p>
                                        <p class="b7 mb-0">LOA:</p>
                                        <p class="">` + obj1.loa + `</p>
                                        <p class="b7 mb-0">Breadth:</p>
                                        <p class="">` + obj1.breadth + `</p>
                                        <p class="b7 mb-0">Summer Draft:</p>
                                        <p class="">` + obj1.summer_draft + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">`;
                            $.each(json_data['data'][1]['port_id'][obj1.vessel_sale_id], function (i, port_obj) {
                                post_str += port_obj;
                                if (json_data['data'][1]['port_id'][obj1.vessel_sale_id][json_data['data'][1]['port_id'][obj1.vessel_sale_id].length - 1] != port_obj)
                                    post_str += `,<br>`;
                            });
                            post_str +=
                                // + obj1.port_id.replace(/,/g, ',<br>')  + 
                                `</div>
                                    <div class="show_details show_details_` + obj1.vessel_sale_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Fresh Water Draft:</p>
                                        <p class="">` + obj1.fw_draft + `</p>
                                        <p class="b7 mb-0">Main Engine:</p>
                                        <p class="">` + obj1.main_engine + `</p>
                                        <p class="b7 mb-0">AUX Engines:</p>
                                        <p class="">` + obj1.aux_engines + `</p>
                                        <p class="b7 mb-0">Bow Thruster:</p>
                                        <p class="">` + obj1.bow_thruster + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">` +
                                obj1.built_year +
                                `</div>
                                    <div class="show_details show_details_` + obj1.vessel_sale_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Gears:</p>
                                        <p class="">` + obj1.gears + `</p>
                                        <p class="b7 mb-0">Propellers:</p>
                                        <p class="">` + obj1.propellers + `</p>
                                        <p class="b7 mb-0">Bunker Capacity:</p>
                                        <p class="">` + obj1.bunker_capacity + `</p>
                                        <p class="b7 mb-0">In Service:</p>
                                        <p class="">` + obj1.in_service + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">` +
                                obj1.price +
                                `</div>
                                    <div class="show_details show_details_` + obj1.vessel_sale_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Date Available:</p>
                                        <p class="">` + obj1.date_available + `</p>
                                        <p class="b7 mb-0">Operation Date:</p>
                                        <p class="">` + obj1.operations_date + `</p>
                                        <p class="b7 mb-0">Cargo Capacity:</p>
                                        <p class="">` + obj1.cargo_capacity + `</p>
                                        <p class="b7 mb-0">Holds Hatch:</p>
                                        <p class="">` + obj1.holds_hatch + `</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="td_h">` +
                                obj1.created_at.split(" ")[0] +
                                `</div>
                                    <div class="show_details show_details_` + obj1.vessel_sale_id + ` tr_bg_cl d_n">
                                        <p class="b7 mb-0">Cover Type:</p>
                                        <p class="">` + obj1.cover_type + `</p>
                                        <p class="b7 mb-0">Additional Description:</p>
                                        <p class="">` + obj1.additional_description + `</p>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="` + obj1.vessel_sale_id + `" class="show_detail_btn_` + obj1.vessel_sale_id + ` show_detail_btn">
                                        <i class="fas fa-eye fa-2x"></i>
                                    </a>
                                    <a href="` + obj1.vessel_sale_id + `" class="hide_detail_btn_` + obj1.vessel_sale_id + ` hide_detail_btn">
                                        <i class="fas fa-eye-slash fa-2x"></i>
                                    </a>
                                </td>
                            </tr>     
                            `;
                        });
                    });


                } //end else
                $("#all_records").html(post_str);

                $("#total_rec_found").html(json_data['data'][0]['length'] + " EXACT MATCHES");

                $('.hide_detail_btn').hide();

            }
        });
    });




    //////////////////////////////////////
    // AJAX Request for delete a record of search history 
    //////////////////////////////////////
    $(document).on('click', '#vsale_delete_rec', function (e) {
        // $(".delete_rec").click(function(e){
        e.preventDefault();
        let el = e.target;
        let table_row = $(el).parent().parent().parent();
        let deleteid = e.target.getAttribute('href');

        let confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            // AJAX Request
            $.ajax({
                url: route('vessel_sale.del_ser_hist_rec'),
                data: "id=" + deleteid,
                type: "get",
                success: function (response) {
                    // alert(response);
                    if (response == "1") {
                        // Remove row from HTML Table
                        table_row.css('background', 'red');
                        table_row.fadeOut(800, function () {
                            table_row.remove();
                        });
                    } else {
                        alert('Invalid ID.');
                    }

                }
            });
        }
    });





    //////////////////////////////////////
    // Show Update search history form when user click on Edit
    //////////////////////////////////////
    $(document).on('click', '#vsale_show_update_ser_hist_form_each', function (e) {
        e.preventDefault();
        let el = e.target;
        let uid = el.getAttribute('href');

        $("#adv_ser_form").hide();

        $(".ser_hist_rec_each").show();
        $("#ser_hist_rec_" + uid).hide();

        $(".adv_ser_form_each").hide();
        $("#adv_ser_form_each_" + uid).show();

        $.ajax({
            url: route('vessel_sale.get_update_hist_data'),
            data: "id=" + uid,
            type: "get",
            success: function (response) {

                let json_data = $.parseJSON(response);
                var len = json_data.length;

                $("#date_available_" + uid).val(json_data['data'][0]['date_available']);
                $("#operations_date_" + uid).val(json_data['data'][0]['operations_date']);

                let arr = ["vessel_type_id", "region_id", "country_id", "port_id"];

                $.each(arr, function (i, obj1) {

                    let dd_id = "#" + obj1 + "_" + uid;

                    let dd_data_ids = json_data['data'][1][obj1];
                    // let dd_data_arr = dd_data.split(",");

                    $.each(dd_data_ids, function (i, obj2) {
                        $(dd_id + " option[value='" + obj2 + "']").attr("selected", "selected");
                    });

                    $(dd_id).siblings(".btn").attr("class", "btn dropdown-toggle btn-light");

                    if (dd_data_ids.length > 2) {
                        $(dd_id).siblings(".btn").attr("title", dd_data_ids.length + " items selected");
                        $(dd_id).siblings(".btn").find(".filter-option-inner-inner").html(dd_data_ids.length + " items selected");
                    } else {
                        $(dd_id).siblings(".btn").attr("title", json_data['data'][2][obj1]);
                        $(dd_id).siblings(".btn").find(".filter-option-inner-inner").html(json_data['data'][2][obj1]);
                    }
                });

            }
        });
    });





    //////////////////////////////////////
    // AJAX Request for updating search history recod
    //////////////////////////////////////
    $(document).on('click', '.vsale_req_update_ser_hist_each', function (e) {
        e.preventDefault();
        let el = e.target;
        let uid = el.getAttribute('id').split("_")[1];

        $(".ser_hist_rec_each").show();
        $(".adv_ser_form_each").hide();

        let date_from = $("#date_available_" + uid).val();
        let date_to = $("#operations_date_" + uid).val();



        let arr = ["vessel_type_id", "region_id", "country_id", "port_id"];

        let dd_str_ids = new Array(4);
        let dd_str_names = new Array(4);
        // let dd_str = new Array(4);
        let count = 0;

        $.each(arr, function (i, obj1) {
            let dd_id = "#" + obj1 + "_" + uid;

            var dd_data_ids = $(dd_id).map(function () { return $(this).val(); }).get();
            dd_str_ids[count] = "";
            $.each(dd_data_ids, function (i, obj1) {
                dd_str_ids[count] += obj1 + ",";
            });
            dd_str_ids[count] = dd_str_ids[count].replace(/,+$/, '');


            var dd_data_names = $(dd_id + " :selected").map(function () { return $(this).html(); }).get();
            dd_str_names[count] = "";
            $.each(dd_data_names, function (i, obj1) {
                dd_str_names[count] += obj1 + ",";
            });
            dd_str_names[count] = dd_str_names[count].replace(/,+$/, '');

            count++;
        });
        // console.log("cargo ", dd_str_ids[1]);


        if (date_from == "") {
            alert("Please fill out all fields");
        } else {
            $.ajax({
                url: route('vessel_sale.update_hist_data'),
                data: "id=" + uid + "&vessel_type_id=" + dd_str_ids[0] + "&date_available=" + date_from +
                    "&operations_date=" + date_to + "&region_id=" + dd_str_ids[1] + "&country_id=" + dd_str_ids[2] +
                    "&port_id=" + dd_str_ids[3],
                type: "get",
                success: function (response) {
                    if (response == false) {
                        alert("something went wrong. Please try again");
                    } else {
                        $("#vesseltype-" + uid).html(dd_str_names[0].replace(/,/g, ',<br>'));
                        $("#date_available-" + uid).html(date_from);
                        $("#operations_date-" + uid).html(date_to);
                        $("#region-" + uid).html(dd_str_names[1].replace(/,/g, ',<br>'));
                        $("#country-" + uid).html(dd_str_names[2].replace(/,/g, ',<br>'));
                        $("#port-" + uid).html(dd_str_names[3].replace(/,/g, ',<br>'));

                        let json_data = $.parseJSON(response);
                        var len = json_data.length;
                        var post_str = "";
                        // console.log(json_data['data'][0]['cargo_name'])

                        if (json_data['data'][0]['length'] == 0) {
                            post_str +=
                                '<tr class=""><td colspan="11"><i>No exact results. Try expanding your filters</i></td></tr>';
                        } else {
                            $.each(json_data, function (i, obj) {
                                $.each(obj[0], function (i, obj1) {
                                    // console.log(obj1);
                                    // console.log(i + "  " + obj1);
                                    post_str +=
                                        `<tr class="">
                                        <td>
                                            <div class="td_h">` +
                                        obj1.ref_no +
                                        `</div>
                                        </td>
                                        <td>
                                            <div class="td_h">
                                                <img src="http://www.eqan.net/shipsearch/public/storage/vessel_sale_images/` + obj1.vessel_img.split(',')[0] + `" width="80" id="show_img31" 
                                                class="img-thumbnail img-fluid" alt="vessel img" style="cursor: zoom-in;">`;
                                    // http://www.eqan.net/shipsearch/public/storage/vessel_sale_images/
                                    let count_img = 0;
                                    $.each(obj1.vessel_img.split(','), function (i, vessel_img21) {
                                        if (count_img != 0) {
                                            post_str += `<img src="http://www.eqan.net/shipsearch/public/storage/vessel_sale_images/` + vessel_img21 + `" class="img-thumbnail img-fluid d_n">`;
                                        }
                                        count_img++;
                                    });
                                    post_str +=
                                        `
                                            </div> 
                                        </td>
                                        <td>
                                            <div class="td_h">`;
                                    $.each(json_data['data'][1]['vessel_type_id'][obj1.vessel_sale_id], function (i, vesseltype_obj) {
                                        post_str += vesseltype_obj;
                                        if (json_data['data'][1]['vessel_type_id'][obj1.vessel_sale_id][json_data['data'][1]['vessel_type_id'][obj1.vessel_sale_id].length - 1] != vesseltype_obj)
                                            post_str += `,<br>`;
                                    });
                                    post_str +=
                                        // + obj1.vessel_type_id.replace(/,/g, ',<br>') +
                                        `</div>
                                            <div class="show_details show_details_` + obj1.vessel_sale_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Last Dry Docked:</p>
                                                <p class="">` + obj1.last_dry_docked + `</p>
                                                <p class="b7 mb-0">Last SS:</p>
                                                <p class="">` + obj1.last_ss + `</p>
                                                <p class="b7 mb-0">Classification:</p>
                                                <p class="">` + obj1.classification + `</p>
                                                <p class="b7 mb-0">GRT:</p>
                                                <p class="">` + obj1.grt + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">`;
                                    $.each(json_data['data'][1]['region_id'][obj1.vessel_sale_id], function (i, region_obj) {
                                        post_str += region_obj;
                                        if (json_data['data'][1]['region_id'][obj1.vessel_sale_id][json_data['data'][1]['region_id'][obj1.vessel_sale_id].length - 1] != region_obj)
                                            post_str += `,<br>`;
                                    });
                                    post_str +=
                                        // + obj1.region_id.replace(/,/g, ',<br>')  +
                                        `</div>
                                            <div class="show_details show_details_` + obj1.vessel_sale_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">NRT:</p>
                                                <p class="">` + obj1.nrt + `</p>
                                                <p class="b7 mb-0">DWT:</p>
                                                <p class="">` + obj1.dwt + `</p>
                                                <p class="b7 mb-0">Light Weight:</p>
                                                <p class="">` + obj1.lightweight + `</p>
                                                <p class="b7 mb-0">Speed:</p>
                                                <p class="">` + obj1.speed + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">`;
                                    $.each(json_data['data'][1]['country_id'][obj1.vessel_sale_id], function (i, country_obj) {
                                        post_str += country_obj;
                                        if (json_data['data'][1]['country_id'][obj1.vessel_sale_id][json_data['data'][1]['country_id'][obj1.vessel_sale_id].length - 1] != country_obj)
                                            post_str += `,<br>`;
                                    });
                                    post_str +=
                                        // + obj1.country_id.replace(/,/g, ',<br>')  +
                                        `</div>
                                            <div class="show_details show_details_` + obj1.vessel_sale_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Consumption:</p>
                                                <p class="">` + obj1.consumption + `</p>
                                                <p class="b7 mb-0">LOA:</p>
                                                <p class="">` + obj1.loa + `</p>
                                                <p class="b7 mb-0">Breadth:</p>
                                                <p class="">` + obj1.breadth + `</p>
                                                <p class="b7 mb-0">Summer Draft:</p>
                                                <p class="">` + obj1.summer_draft + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">`;
                                    $.each(json_data['data'][1]['port_id'][obj1.vessel_sale_id], function (i, port_obj) {
                                        post_str += port_obj;
                                        if (json_data['data'][1]['port_id'][obj1.vessel_sale_id][json_data['data'][1]['port_id'][obj1.vessel_sale_id].length - 1] != port_obj)
                                            post_str += `,<br>`;
                                    });
                                    post_str +=
                                        // + obj1.port_id.replace(/,/g, ',<br>')  + 
                                        `</div>
                                            <div class="show_details show_details_` + obj1.vessel_sale_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Fresh Water Draft:</p>
                                                <p class="">` + obj1.fw_draft + `</p>
                                                <p class="b7 mb-0">Main Engine:</p>
                                                <p class="">` + obj1.main_engine + `</p>
                                                <p class="b7 mb-0">AUX Engines:</p>
                                                <p class="">` + obj1.aux_engines + `</p>
                                                <p class="b7 mb-0">Bow Thruster:</p>
                                                <p class="">` + obj1.bow_thruster + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">` +
                                        obj1.built_year +
                                        `</div>
                                            <div class="show_details show_details_` + obj1.vessel_sale_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Gears:</p>
                                                <p class="">` + obj1.gears + `</p>
                                                <p class="b7 mb-0">Propellers:</p>
                                                <p class="">` + obj1.propellers + `</p>
                                                <p class="b7 mb-0">Bunker Capacity:</p>
                                                <p class="">` + obj1.bunker_capacity + `</p>
                                                <p class="b7 mb-0">In Service:</p>
                                                <p class="">` + obj1.in_service + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">` +
                                        obj1.price +
                                        `</div>
                                            <div class="show_details show_details_` + obj1.vessel_sale_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Date Available:</p>
                                                <p class="">` + obj1.date_available + `</p>
                                                <p class="b7 mb-0">Operation Date:</p>
                                                <p class="">` + obj1.operations_date + `</p>
                                                <p class="b7 mb-0">Cargo Capacity:</p>
                                                <p class="">` + obj1.cargo_capacity + `</p>
                                                <p class="b7 mb-0">Holds Hatch:</p>
                                                <p class="">` + obj1.holds_hatch + `</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td_h">` +
                                        obj1.created_at.split(" ")[0] +
                                        `</div>
                                            <div class="show_details show_details_` + obj1.vessel_sale_id + ` tr_bg_cl d_n">
                                                <p class="b7 mb-0">Cover Type:</p>
                                                <p class="">` + obj1.cover_type + `</p>
                                                <p class="b7 mb-0">Additional Description:</p>
                                                <p class="">` + obj1.additional_description + `</p>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="` + obj1.vessel_sale_id + `" class="show_detail_btn_` + obj1.vessel_sale_id + ` show_detail_btn">
                                                <i class="fas fa-eye fa-2x"></i>
                                            </a>
                                            <a href="` + obj1.vessel_sale_id + `" class="hide_detail_btn_` + obj1.vessel_sale_id + ` hide_detail_btn">
                                                <i class="fas fa-eye-slash fa-2x"></i>
                                            </a>
                                        </td>
                                    </tr>     
                                    `;
                                });
                            });
                        } //end else
                        $("#all_records").html(post_str);

                        $("#total_rec_found").html(json_data['data'][0]['length'] + " EXACT MATCHES");

                        $('.hide_detail_btn').hide();
                    }
                }
            });
        }
    });




    //////////////////////////////////////
    // Close Dialog Box by default
    //////////////////////////////////////
    // $("#close_dialog").click(function() {
    //     $("#dialog").dialog("close");
    // });


    //////////////////////////////////////
    // Check if user is logged in when click on add cargo/ vessel / sale purchase button
    //////////////////////////////////////
    // $('.add_rec_validation').click(function(e) {

    //     if ($(this).attr('id') == "") {
    //         e.preventDefault();
    //         $("#dialog").dialog({
    //             draggable: false,
    //             resizable: false,
    //             closeOnEscape: false,
    //             width: '30%',
    //             modal: true
    //         });

    //         $(".ui-dialog-titlebar").hide();
    //         $("#dialog").dialog();
    //     }
    // });




    //////////////////////////////////////
    // Show Pagination
    //////////////////////////////////////
    $('#cvs_table').DataTable({
        searching: false,
        paging: false,
        info: false,
        "order": [],
        // 'columnDefs': [ {
        //     'targets': [7,8], // column index (start from 0)
        //     'orderable': false, // set orderable false for selected columns
        //  }]
        // "pagingType":"full_numbers",
        //   "lengthMenu":[[5,10,25],[5,10,25]],
        // "lengthMenu": [
        //     [10, 25, 50, 100, -1],
        //     [10, 25, 50, 100, 'All']
        // ],
        // responsive: true,
        // type: 'date'
        // stateSave: true
    });

    $('#directory_table').DataTable({
        searching: true,
        paging: false,
        info: false,
        "order": [],
        // "pagingType":"full_numbers",
        //   "lengthMenu":[[5,10,25],[5,10,25]],
        // "lengthMenu": [
        //     [10, 25, 50, 100, -1],
        //     [10, 25, 50, 100, 'All']
        // ],
        // responsive: true,
        // type: 'date'
        // stateSave: true
    });



    //////////////////////////////////////
    // Change Status
    //////////////////////////////////////
    //     $('.page-state').click(function(e) {
    //         e.preventDefault();

    //         let status_val;
    //         let status = $(this).html();

    //         let href = $(this).attr('href');
    //         let id = href.split('/');

    //         let id_val = id[id.length - 1]

    //         // alert(id[id.length - 1]);
    //         if (status == "De-Activate") {
    //             status_val = "0";
    //         } else {
    //             status_val = "1";
    //         }

    //         $.ajax({
    //             url: href,
    //             data: "id=" + id_val + "&status=" + status_val,
    //             type: "get",
    //             success: function(res) {
    //                 if (res == 0) {
    //                     $('.page-status-' + id_val).html("Activate");
    //                     $('.page-status-' + id_val).attr("id", "1");
    //                     $(".badge-" + id_val).html("In-Active");
    //                     // $(".badge-"+id_val).attr("class","badge badge-danger");
    //                     $(".badge-" + id_val).removeClass("badge-success");
    //                     $(".badge-" + id_val).addClass("badge-danger");
    //                 }
    //                 if (res == 1) {
    //                     $('.page-status-' + id_val).html("De-Activate");
    //                     $('.page-status-' + id_val).attr("id", "0");
    //                     $(".badge-" + id_val).html("Active");
    //                     // $(".badge-"+id_val).attr("class","badge badge-success");
    //                     $(".badge-" + id_val).removeClass("badge-danger");
    //                     $(".badge-" + id_val).addClass("badge-success");
    //                 }
    //             }
    //         });
    //     });

});