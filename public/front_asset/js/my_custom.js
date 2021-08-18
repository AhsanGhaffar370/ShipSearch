$(document).ready(function() {

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


    function GetFormattedDate(date) {
        // var dateAr = '2014-01-06'.split('-');
        var dateAr = date.split('-');
        var mon = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', ];
        var newDate = dateAr[2] + '-' + mon[parseInt(dateAr[1]) - 1] + '-' + dateAr[0];
        return newDate;
    }

    //////////////////////////////////////
    // show record details button
    //////////////////////////////////////
    $('.hide_detail_btn').hide();
    $(document).on("click", '.show_detail_btn', function(e) {
        e.preventDefault();
        let id = $(this).attr('href');
        $('.show_details_' + id).fadeToggle("slow");
        $('.show_detail_btn_' + id).hide();
        $('.hide_detail_btn_' + id).show();

        $(this).parent().parent().css({
            "background-color": "#F1F1F1"
        });
    });

    //////////////////////////////////////
    // hide record details button
    //////////////////////////////////////
    $(document).on("click", '.hide_detail_btn', function(e) {
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
    $('#new_ser_req').click(function(e) {
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
    $('#close_ser').click(function(e) {
        e.preventDefault();
        $("#adv_ser_form").hide();
        // $("#adv_ser_form").slideToggle(500);
    });


    ////////////////////////////////////// 
    // Close update search request form of each record
    //////////////////////////////////////
    $(document).on('click', '.close_ser_each', function(e) {
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
    $(document).on("click", '.car_ser_hist_rec_req_each', function(e) {

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
            success: function(response) {

                let json_data = $.parseJSON(response);
                var post_str = "";
                // console.log(json_data)

                if (json_data['data'][0]['length'] == 0) {
                    post_str +=
                        '<tr class=""><td colspan="11"><i>No exact results. Try expanding your filters</i></td></tr>';
                } else {
                    $.each(json_data, function(i, obj) {
                        $.each(obj[0], function(i, obj1) {
                            // console.log(obj1);
                            // console.log(i + "  " + obj1);
                            post_str += `<tr class="">
                                    <td>` + obj1.ref_no + `</td>
                                    <td>` + obj1.cargo_name + `</td>
                                    <td>`;
                            $.each(json_data['data'][1]['cargo_type_id'][obj1.cargo_id], function(i, cargotype_obj) {
                                post_str += cargotype_obj + ',<br>';
                            });
                            post_str += `</td>
                                        <td>`;
                            $.each(json_data['data'][1]['loading_region_id'][obj1.cargo_id], function(i, lregion_obj) {
                                post_str += lregion_obj + ',<br>';
                            });
                            post_str += `</td>
                                        <td>`;
                            $.each(json_data['data'][1]['discharge_region_id'][obj1.cargo_id], function(i, dregion_obj) {
                                post_str += dregion_obj + ',<br>';
                            });

                            post_str += `</td>
                                    <td>` + GetFormattedDate(obj1.laycan_date_from) + `</td>
                                    <td>` + GetFormattedDate(obj1.laycan_date_to) + `</td>
                                    <td>` + obj1.quantity + `</td>
                                    <td>` + obj1.loading_discharge_rates + `</td>
                                    <td>` + obj1.created_at + `</td>
                                    <td class="text-center">
                                        <a href="` + obj1.cargo_id + `" class="show_detail_btn_` + obj1
                                .cargo_id + ` show_detail_btn"><i class="fas fa-eye fa-2x"></i></a>
                                        <a href="` + obj1.cargo_id + `" class="hide_detail_btn_` + obj1
                                .cargo_id + ` hide_detail_btn"><i class="fas fa-eye-slash fa-2x"></i></a>
                                    </td>
                                    </tr>
                                    <tr class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                    <td></td>
                                    <td>
                                        <p class="b7 mb-0">Loading Country:</p>`;
                            post_str += `<p class="">`;
                            $.each(json_data['data'][1]['loading_country_id'][obj1.cargo_id], function(i, lcountry_obj) {
                                post_str += lcountry_obj + ',<br>';
                            });
                            post_str += `</p>
                                        <p class="b7 mb-0">Max LOA:</p>
                                        <p class="">` + obj1.max_loa + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Loading Port:</p>`;
                            post_str += `<p class="">`;
                            $.each(json_data['data'][1]['loading_port_id'][obj1.cargo_id], function(i, lport_obj) {
                                post_str += lport_obj + ',<br>';
                            });
                            post_str += `</p>
                                        <p class="b7 mb-0">Max Draft:</p>
                                        <p class="">` + obj1.max_draft + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Discharge Country:</p>`;
                            post_str += `<p class="">`;
                            $.each(json_data['data'][1]['discharge_country_id'][obj1.cargo_id], function(i, dcountry_obj) {
                                post_str += dcountry_obj + ',<br>';
                            });
                            post_str += `</p>
                                        <p class="b7 mb-0">Max Height:</p>
                                        <p class="">` + obj1.max_height + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Discharge Port:</p>`;
                            post_str += `<p class="">`;
                            $.each(json_data['data'][1]['discharge_port_id'][obj1.cargo_id], function(i, dport_obj) {
                                post_str += dport_obj + ',<br>';
                            });
                            post_str += `</p>
                                        <p class="b7 mb-0">Loading Equipment Req:</p>
                                        <p class="">` + obj1.loading_equipment_req + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Over Age:</p>
                                        <p class="">` + obj1.over_age + `</p>
                                        <p class="b7 mb-0">Discharge Equipment Req:</p>
                                        <p class="">` + obj1.discharge_equipment_req + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Hazmat:</p>
                                        <p class="">` + obj1.hazmat + `</p>
                                        <p class="b7 mb-0">Combinable:</p>
                                        <p class="">` + obj1.combinable + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Commission:</p>
                                        <p class="">` + obj1.commision + `</p>
                                        <p class="b7 mb-0">Gear Lifting Capacity:</p>
                                        <p class="">` + obj1.gear_lifting_capacity + `</p>
                                    </td>
                                    <td colspan="2">
                                        <p class="b7 mb-0">Additional Info:</p>
                                        <p class="">` + obj1.additional_info + `</p>
                                    </td>
                                    <td></td>
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
    $(document).on('click', '#car_delete_rec', function(e) {
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
                success: function(response) {
                    // alert(response);
                    if (response == "1") {
                        // Remove row from HTML Table
                        table_row.css('background', 'tomato');
                        table_row.fadeOut(800, function() {
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
    $(document).on('click', '#car_show_update_ser_hist_form_each', function(e) {
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
            success: function(response) {

                let json_data = $.parseJSON(response);
                var len = json_data.length;

                $("#laycan_date_from_" + uid).val(json_data['data'][0]['laycan_date_from']);
                $("#laycan_date_to_" + uid).val(json_data['data'][0]['laycan_date_to']);

                let arr = ["cargo_type_id", "loading_region_id", "loading_country_id", "loading_port_id",
                    "discharge_region_id", "discharge_country_id", "discharge_port_id"
                ];

                $.each(arr, function(i, obj1) {

                    let dd_id = "#" + obj1 + "_" + uid;

                    let dd_data_ids = json_data['data'][1][obj1];
                    // let dd_data_arr = dd_data.split(",");

                    $.each(dd_data_ids, function(i, obj2) {
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
    $(document).on('click', '.car_req_update_ser_hist_each', function(e) {
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

        $.each(arr, function(i, obj1) {
            let dd_id = "#" + obj1 + "_" + uid;

            var dd_data_ids = $(dd_id).map(function() { return $(this).val(); }).get();
            dd_str_ids[count] = "";
            $.each(dd_data_ids, function(i, obj1) {
                dd_str_ids[count] += obj1 + ",";
            });
            dd_str_ids[count] = dd_str_ids[count].replace(/,+$/, '');


            var dd_data_names = $(dd_id + " :selected").map(function() { return $(this).html(); }).get();
            dd_str_names[count] = "";
            $.each(dd_data_names, function(i, obj1) {
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
                success: function(response) {
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
                        // console.log(json_data['data'][0]['cargo_name'])

                        if (json_data['data'][0]['length'] == 0) {
                            post_str +=
                                '<tr class=""><td colspan="11"><i>No exact results. Try expanding your filters</i></td></tr>';
                        } else {
                            $.each(json_data, function(i, obj) {
                                $.each(obj[0], function(i, obj1) {
                                    // console.log(obj1);
                                    // console.log(i + "  " + obj1);
                                    post_str += `<tr class="">
                                    <td>` + obj1.ref_no + `</td>
                                    <td>` + obj1.cargo_name + `</td>
                                    <td>`;
                                    $.each(json_data['data'][1]['cargo_type_id'][obj1.cargo_id], function(i, cargotype_obj) {
                                        post_str += cargotype_obj + ',<br>';
                                    });
                                    post_str += `</td>
                                        <td>`;
                                    $.each(json_data['data'][1]['loading_region_id'][obj1.cargo_id], function(i, lregion_obj) {
                                        post_str += lregion_obj + ',<br>';
                                    });
                                    post_str += `</td>
                                        <td>`;
                                    $.each(json_data['data'][1]['discharge_region_id'][obj1.cargo_id], function(i, dregion_obj) {
                                        post_str += dregion_obj + ',<br>';
                                    });

                                    post_str += `</td>
                                    <td>` + GetFormattedDate(obj1.laycan_date_from) + `</td>
                                    <td>` + GetFormattedDate(obj1.laycan_date_to) + `</td>
                                    <td>` + obj1.quantity + `</td>
                                    <td>` + obj1.loading_discharge_rates + `</td>
                                    <td>` + obj1.created_at + `</td>
                                    <td class="text-center">
                                        <a href="` + obj1.cargo_id + `" class="show_detail_btn_` + obj1
                                        .cargo_id + ` show_detail_btn"><i class="fas fa-eye fa-2x"></i></a>
                                        <a href="` + obj1.cargo_id + `" class="hide_detail_btn_` + obj1
                                        .cargo_id + ` hide_detail_btn"><i class="fas fa-eye-slash fa-2x"></i></a>
                                    </td>
                                    </tr>
                                    <tr class="show_details show_details_` + obj1.cargo_id + ` tr_bg_cl d_n">
                                    <td></td>
                                    <td>
                                        <p class="b7 mb-0">Loading Country:</p>`;
                                    post_str += `<p class="">`;
                                    $.each(json_data['data'][1]['loading_country_id'][obj1.cargo_id], function(i, lcountry_obj) {
                                        post_str += lcountry_obj + ',<br>';
                                    });
                                    post_str += `</p>
                                        <p class="b7 mb-0">Max LOA:</p>
                                        <p class="">` + obj1.max_loa + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Loading Port:</p>`;
                                    post_str += `<p class="">`;
                                    $.each(json_data['data'][1]['loading_port_id'][obj1.cargo_id], function(i, lport_obj) {
                                        post_str += lport_obj + ',<br>';
                                    });
                                    post_str += `</p>
                                        <p class="b7 mb-0">Max Draft:</p>
                                        <p class="">` + obj1.max_draft + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Discharge Country:</p>`;
                                    post_str += `<p class="">`;
                                    $.each(json_data['data'][1]['discharge_country_id'][obj1.cargo_id], function(i, dcountry_obj) {
                                        post_str += dcountry_obj + ',<br>';
                                    });
                                    post_str += `</p>
                                        <p class="b7 mb-0">Max Height:</p>
                                        <p class="">` + obj1.max_height + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Discharge Port:</p>`;
                                    post_str += `<p class="">`;
                                    $.each(json_data['data'][1]['discharge_port_id'][obj1.cargo_id], function(i, dport_obj) {
                                        post_str += dport_obj + ',<br>';
                                    });
                                    post_str += `</p>
                                        <p class="b7 mb-0">Loading Equipment Req:</p>
                                        <p class="">` + obj1.loading_equipment_req + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Over Age:</p>
                                        <p class="">` + obj1.over_age + `</p>
                                        <p class="b7 mb-0">Discharge Equipment Req:</p>
                                        <p class="">` + obj1.discharge_equipment_req + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Hazmat:</p>
                                        <p class="">` + obj1.hazmat + `</p>
                                        <p class="b7 mb-0">Combinable:</p>
                                        <p class="">` + obj1.combinable + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Commission:</p>
                                        <p class="">` + obj1.commision + `</p>
                                        <p class="b7 mb-0">Gear Lifting Capacity:</p>
                                        <p class="">` + obj1.gear_lifting_capacity + `</p>
                                    </td>
                                    <td colspan="2">
                                        <p class="b7 mb-0">Additional Info:</p>
                                        <p class="">` + obj1.additional_info + `</p>
                                    </td>
                                    <td></td>
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
    // Vessel Section
    //////////////////////////////////////











    //////////////////////////////////////
    // AJAX Request for Searching records when user click on any record inside search history table.
    //////////////////////////////////////
    $(document).on("click", '.ves_ser_hist_rec_req_each', function(e) {

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
            success: function(response) {

                let json_data = $.parseJSON(response);
                var len = json_data.length;
                var post_str = "";
                // console.log(json_data['data'][0]['cargo_name'])

                if (json_data['data']['length'] == 0) {
                    post_str +=
                        '<tr class=""><td colspan="11"><i>No exact results. Try expanding your filters</i></td></tr>';
                } else {
                    $.each(json_data, function(i, obj) {
                        $.each(obj, function(i, obj1) {
                            // console.log(obj1);
                            // console.log(i + "  " + obj1);
                            post_str += `<tr class="">
                                    <td>` + obj1.ref_no + `</td>
                                    <td>` + obj1.vessel_name + `</td>
                                    <td>` + GetFormattedDate(obj1.laycan_date_from) + `</td>
                                    <td>` + GetFormattedDate(obj1.laycan_date_to) + `</td>
                                    <td>` + obj1.region_id.replace(/,/g, ',<br>') + `</td>
                                    <td>` + obj1.port_id.replace(/,/g, ',<br>') + `</td>
                                    <td>` + obj1.vessel_type_id.replace(/,/g, ',<br>') + `</td>
                                    <td>` + obj1.built_year + `</td>
                                    <td>` + obj1.deadweight + `</td>
                                    <td>` + obj1.created_at + `</td>
                                    <td class="text-center">
                                        <a href="` + obj1.vessel_id + `" class="show_detail_btn_` + obj1
                                .vessel_id + ` show_detail_btn"><i class="fas fa-eye fa-2x"></i></a>
                                        <a href="` + obj1.vessel_id + `" class="hide_detail_btn_` + obj1
                                .vessel_id + ` hide_detail_btn"><i class="fas fa-eye-slash fa-2x"></i></a>
                                    </td>
                                    </tr>
                                    
                                    <tr class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                    <td></td>
                                    <td>
                                        <p class="b7 mb-0">Country:</p>
                                        <p class="">` + obj1.country_id.replace(/,/g, ',<br>') + `</p>
                                        <p class="b7 mb-0">Charter Type:</p>
                                        <p class="">` + obj1.charter_type_id.replace(/,/g, ',<br>') + `</p>
                                        <p class="b7 mb-0">IMO Number:</p>
                                        <p class="">` + obj1.imo_number + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">DWCC:</p>
                                        <p class="">` + obj1.dwcc + `</p>
                                        <p class="b7 mb-0">Call Sign:</p>
                                        <p class="">` + obj1.call_sign + `</p>
                                        <p class="b7 mb-0">Speed Ballast:</p>
                                        <p class="">` + obj1.speed_ballast + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Laden:</p>
                                        <p class="">` + obj1.laden + `</p>
                                        <p class="b7 mb-0">Gross:</p>
                                        <p class="">` + obj1.gross + `</p>
                                        <p class="b7 mb-0">Net Tonnage:</p>
                                        <p class="">` + obj1.net_tonnage + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">LOA:</p>
                                        <p class="">` + obj1.loa + `</p>
                                        <p class="b7 mb-0">Beam:</p>
                                        <p class="">` + obj1.beam + `</p>
                                        <p class="b7 mb-0">Draft:</p>
                                        <p class="">` + obj1.draft + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Depth:</p>
                                        <p class="">` + obj1.depth + `</p>
                                        <p class="b7 mb-0">Grain:</p>
                                        <p class="">` + obj1.grain + `</p>
                                        <p class="b7 mb-0">Bale Capacity:</p>
                                        <p class="">` + obj1.bale_capacity + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Lane Meters:</p>
                                        <p class="">` + obj1.lane_meters + `</p>
                                        <p class="b7 mb-0">Container Capacity:</p>
                                        <p class="">` + obj1.container_capacity + `</p>
                                        <p class="b7 mb-0">Passenger Capacity:</p>
                                        <p class="">` + obj1.passenger_capacity + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">IFO:</p>
                                        <p class="">` + obj1.ifo + `</p>
                                        <p class="b7 mb-0">IFO Laden:</p>
                                        <p class="">` + obj1.ifo_laden + `</p>
                                        <p class="b7 mb-0">IFO Port:</p>
                                        <p class="">` + obj1.ifo_port + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">MGO:</p>
                                        <p class="">` + obj1.mgo + `</p>
                                        <p class="b7 mb-0">MGO Laden:</p>
                                        <p class="">` + obj1.mgo_laden + `</p>
                                        <p class="b7 mb-0">MGO Port:</p>
                                        <p class="">` + obj1.mgo_port + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">P I Club:</p>
                                        <p class="">` + obj1.p_i_club + `</p>
                                        <p class="b7 mb-0">Classed By:</p>
                                        <p class="">` + obj1.classed_by + `</p>
                                    </td>
                                    <td></td>
                                    </tr>
                                    `;
                        });
                    });


                } //end else
                $("#all_records").html(post_str);

                $("#total_rec_found").html(json_data['data']['length'] + " EXACT MATCHES");

                $('.hide_detail_btn').hide();

            }
        });
    });






    //////////////////////////////////////
    // AJAX Request for delete a record of search history 
    //////////////////////////////////////
    $(document).on('click', '#ves_delete_rec', function(e) {
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
                success: function(response) {
                    // alert(response);
                    if (response == "1") {
                        // Remove row from HTML Table
                        table_row.css('background', 'red');
                        table_row.fadeOut(800, function() {
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
    $(document).on('click', '#ves_show_update_ser_hist_form_each', function(e) {
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
            success: function(response) {

                let json_data = $.parseJSON(response);
                var len = json_data.length;

                $("#laycan_date_from_" + uid).val(json_data['data']['laycan_date_from']);
                $("#laycan_date_to_" + uid).val(json_data['data']['laycan_date_to']);

                let arr = ["vessel_type_id", "charter_type_id", "region_id", "country_id", "port_id"];

                $.each(arr, function(i, obj1) {

                    let dd_id = "#" + obj1 + "_" + uid;
                    let dd_data = json_data['data'][obj1];
                    let dd_data_arr = dd_data.split(",");

                    $.each(dd_data_arr, function(i, obj2) {
                        $(dd_id + " option[value='" + obj2 + "']").attr("selected", "selected");
                    });

                    $(dd_id).siblings(".btn").attr("class", "btn dropdown-toggle btn-light");

                    if (dd_data_arr.length > 2) {
                        $(dd_id).siblings(".btn").attr("title", dd_data_arr.length + " items selected");
                        $(dd_id).siblings(".btn").find(".filter-option-inner-inner").html(dd_data_arr.length + " items selected");
                    } else {
                        $(dd_id).siblings(".btn").attr("title", dd_data);
                        $(dd_id).siblings(".btn").find(".filter-option-inner-inner").html(dd_data);
                    }
                });

            }
        });
    });



    //////////////////////////////////////
    // AJAX Request for updating search history recod
    //////////////////////////////////////
    $(document).on('click', '.ves_req_update_ser_hist_each', function(e) {
        e.preventDefault();
        let el = e.target;
        let uid = el.getAttribute('id').split("_")[1];

        $(".ser_hist_rec_each").show();
        $(".adv_ser_form_each").hide();

        let date_from = $("#laycan_date_from_" + uid).val();
        let date_to = $("#laycan_date_to_" + uid).val();



        let arr = ["vessel_type_id", "charter_type_id", "region_id", "country_id", "port_id"];

        let dd_str = new Array(5);
        let count = 0;

        $.each(arr, function(i, obj1) {
            let dd_id = "#" + obj1 + "_" + uid;
            var dd_data = $(dd_id).map(function() { return $(this).val(); }).get();
            dd_str[count] = "";
            $.each(dd_data, function(i, obj1) {
                dd_str[count] += obj1 + ",";
            });
            dd_str[count] = dd_str[count].replace(/,+$/, '');
            count++;
        });
        // console.log("cargo ", dd_str[1]);


        if (date_from == "") {
            alert("Please fill out all fields");
        } else {
            $.ajax({
                url: route('vessel.update_hist_data'),
                data: "id=" + uid + "&vessel_type_id=" + dd_str[0] + "&charter_type_id=" + dd_str[1] + "&laycan_date_from=" + date_from +
                    "&laycan_date_to=" + date_to + "&region_id=" + dd_str[2] + "&country_id=" + dd_str[3] +
                    "&port_id=" + dd_str[4],
                type: "get",
                success: function(response) {
                    if (response == false) {
                        alert("something went wrong. Please try again");
                    } else {
                        $("#vesseltype-" + uid).html(dd_str[0].replace(/,/g, ',<br>'));
                        $("#chartertype-" + uid).html(dd_str[1].replace(/,/g, ',<br>'));
                        $("#laycan_from-" + uid).html(date_from);
                        $("#laycan_to-" + uid).html(date_to);
                        $("#region-" + uid).html(dd_str[2].replace(/,/g, ',<br>'));
                        $("#country-" + uid).html(dd_str[3].replace(/,/g, ',<br>'));
                        $("#port-" + uid).html(dd_str[4].replace(/,/g, ',<br>'));

                        let json_data = $.parseJSON(response);
                        var len = json_data.length;
                        var post_str = "";
                        // console.log(json_data['data'][0]['cargo_name'])

                        if (json_data['data']['length'] == 0) {
                            post_str +=
                                '<tr class=""><td colspan="11"><i>No exact results. Try expanding your filters</i></td></tr>';
                        } else {
                            $.each(json_data, function(i, obj) {
                                $.each(obj, function(i, obj1) {
                                    // console.log(obj1);
                                    // console.log(i + "  " + obj1);
                                    post_str += `<tr class="">
                                    <td>` + obj1.ref_no + `</td>
                                    <td>` + obj1.vessel_name + `</td>
                                    <td>` + GetFormattedDate(obj1.laycan_date_from) + `</td>
                                    <td>` + GetFormattedDate(obj1.laycan_date_to) + `</td>
                                    <td>` + obj1.region_id.replace(/,/g, ',<br>') + `</td>
                                    <td>` + obj1.port_id.replace(/,/g, ',<br>') + `</td>
                                    <td>` + obj1.vessel_type_id.replace(/,/g, ',<br>') + `</td>
                                    <td>` + obj1.built_year + `</td>
                                    <td>` + obj1.deadweight + `</td>
                                    <td>` + obj1.created_at + `</td>
                                    <td class="text-center">
                                        <a href="` + obj1.vessel_id + `" class="show_detail_btn_` + obj1
                                        .vessel_id + ` show_detail_btn"><i class="fas fa-eye fa-2x"></i></a>
                                        <a href="` + obj1.vessel_id + `" class="hide_detail_btn_` + obj1
                                        .vessel_id + ` hide_detail_btn"><i class="fas fa-eye-slash fa-2x"></i></a>
                                    </td>
                                    </tr>
                                    
                                    <tr class="show_details show_details_` + obj1.vessel_id + ` tr_bg_cl d_n">
                                    <td></td>
                                    <td>
                                        <p class="b7 mb-0">Country:</p>
                                        <p class="">` + obj1.country_id.replace(/,/g, ',<br>') + `</p>
                                        <p class="b7 mb-0">Charter Type:</p>
                                        <p class="">` + obj1.charter_type_id.replace(/,/g, ',<br>') + `</p>
                                        <p class="b7 mb-0">IMO Number:</p>
                                        <p class="">` + obj1.imo_number + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">DWCC:</p>
                                        <p class="">` + obj1.dwcc + `</p>
                                        <p class="b7 mb-0">Call Sign:</p>
                                        <p class="">` + obj1.call_sign + `</p>
                                        <p class="b7 mb-0">Speed Ballast:</p>
                                        <p class="">` + obj1.speed_ballast + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Laden:</p>
                                        <p class="">` + obj1.laden + `</p>
                                        <p class="b7 mb-0">Gross:</p>
                                        <p class="">` + obj1.gross + `</p>
                                        <p class="b7 mb-0">Net Tonnage:</p>
                                        <p class="">` + obj1.net_tonnage + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">LOA:</p>
                                        <p class="">` + obj1.loa + `</p>
                                        <p class="b7 mb-0">Beam:</p>
                                        <p class="">` + obj1.beam + `</p>
                                        <p class="b7 mb-0">Draft:</p>
                                        <p class="">` + obj1.draft + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Depth:</p>
                                        <p class="">` + obj1.depth + `</p>
                                        <p class="b7 mb-0">Grain:</p>
                                        <p class="">` + obj1.grain + `</p>
                                        <p class="b7 mb-0">Bale Capacity:</p>
                                        <p class="">` + obj1.bale_capacity + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Lane Meters:</p>
                                        <p class="">` + obj1.lane_meters + `</p>
                                        <p class="b7 mb-0">Container Capacity:</p>
                                        <p class="">` + obj1.container_capacity + `</p>
                                        <p class="b7 mb-0">Passenger Capacity:</p>
                                        <p class="">` + obj1.passenger_capacity + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">IFO:</p>
                                        <p class="">` + obj1.ifo + `</p>
                                        <p class="b7 mb-0">IFO Laden:</p>
                                        <p class="">` + obj1.ifo_laden + `</p>
                                        <p class="b7 mb-0">IFO Port:</p>
                                        <p class="">` + obj1.ifo_port + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">MGO:</p>
                                        <p class="">` + obj1.mgo + `</p>
                                        <p class="b7 mb-0">MGO Laden:</p>
                                        <p class="">` + obj1.mgo_laden + `</p>
                                        <p class="b7 mb-0">MGO Port:</p>
                                        <p class="">` + obj1.mgo_port + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">P I Club:</p>
                                        <p class="">` + obj1.p_i_club + `</p>
                                        <p class="b7 mb-0">Classed By:</p>
                                        <p class="">` + obj1.classed_by + `</p>
                                    </td>
                                    <td></td>
                                    </tr>
                                    `;
                                });
                            });
                        } //end else
                        $("#all_records").html(post_str);

                        $("#total_rec_found").html(json_data['data']['length'] + " EXACT MATCHES");

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
    $(document).on("click", '.vsale_ser_hist_rec_req_each', function(e) {

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
            success: function(response) {

                let json_data = $.parseJSON(response);
                var len = json_data.length;
                var post_str = "";
                // console.log(json_data['data'][0]['cargo_name'])

                if (json_data['data']['length'] == 0) {
                    post_str +=
                        '<tr class=""><td colspan="11"><i>No exact results. Try expanding your filters</i></td></tr>';
                } else {
                    $.each(json_data, function(i, obj) {
                        $.each(obj, function(i, obj1) {
                            // console.log(obj1);
                            // console.log(i + "  " + obj1);
                            post_str += `<tr class="">
                                    <td>` + obj1.ref_no + `</td>
                                    <td>` + obj1.vessel_type_id.replace(/,/g, ',<br>') + `</td>
                                    <td>` + GetFormattedDate(obj1.date_available) + `</td>
                                    <td>` + GetFormattedDate(obj1.operations_date) + `</td>
                                    <td>` + obj1.region_id.replace(/,/g, ',<br>') + `</td>
                                    <td>` + obj1.country_id.replace(/,/g, ',<br>') + `</td>
                                    <td>` + obj1.port_id.replace(/,/g, ',<br>') + `</td>
                                    <td>` + obj1.built_year + `</td>
                                    <td>` + obj1.created_at + `</td>
                                    <td class="text-center">
                                        <a href="` + obj1.vessel_sale_id + `" class="show_detail_btn_` + obj1
                                .vessel_sale_id + ` show_detail_btn"><i class="fas fa-eye fa-2x"></i></a>
                                        <a href="` + obj1.vessel_sale_id + `" class="hide_detail_btn_` + obj1
                                .vessel_sale_id + ` hide_detail_btn"><i class="fas fa-eye-slash fa-2x"></i></a>
                                    </td>
                                    </tr>
                                    
                                    <tr class="show_details show_details_` + obj1.vessel_sale_id + ` tr_bg_cl d_n">
                                    <td></td>
                                    <td>
                                        <p class="b7 mb-0">Last Dry Docked:</p>
                                        <p class="">` + obj1.last_dry_docked + `</p>
                                        <p class="b7 mb-0">Last SS:</p>
                                        <p class="">` + obj1.last_ss + `</p>
                                        <p class="b7 mb-0">Classification:</p>
                                        <p class="">` + obj1.classification + `</p>
                                        <p class="b7 mb-0">GRT:</p>
                                        <p class="">` + obj1.GRT + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">NRT:</p>
                                        <p class="">` + obj1.NRT + `</p>
                                        <p class="b7 mb-0">DWT:</p>
                                        <p class="">` + obj1.dwt + `</p>
                                        <p class="b7 mb-0">Light Weight:</p>
                                        <p class="">` + obj1.lightweight + `</p>
                                        <p class="b7 mb-0">Speed:</p>
                                        <p class="">` + obj1.speed + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Consumption:</p>
                                        <p class="">` + obj1.consumption + `</p>
                                        <p class="b7 mb-0">LOA:</p>
                                        <p class="">` + obj1.loa + `</p>
                                        <p class="b7 mb-0">Breadth:</p>
                                        <p class="">` + obj1.breadth + `</p>
                                        <p class="b7 mb-0">Summer Draft:</p>
                                        <p class="">` + obj1.summer_draft + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">FW Draft:</p>
                                        <p class="">` + obj1.fw_draft + `</p>
                                        <p class="b7 mb-0">Main Engine:</p>
                                        <p class="">` + obj1.main_engine + `</p>
                                        <p class="b7 mb-0">AUX Engines:</p>
                                        <p class="">` + obj1.aux_engines + `</p>
                                        <p class="b7 mb-0">Bow Thruster:</p>
                                        <p class="">` + obj1.bow_thruster + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Gears:</p>
                                        <p class="">` + obj1.gears + `</p>
                                        <p class="b7 mb-0">Brief Description:</p>
                                        <p class="">` + obj1.brief_description + `</p>
                                        <p class="b7 mb-0">Propellers:</p>
                                        <p class="">` + obj1.propellers + `</p>
                                        <p class="b7 mb-0">Bunker Capacity:</p>
                                        <p class="">` + obj1.bunker_capacity + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">In Service:</p>
                                        <p class="">` + obj1.in_service + `</p>
                                        <p class="b7 mb-0">Date Available:</p>
                                        <p class="">` + obj1.date_available + `</p>
                                        <p class="b7 mb-0">Price:</p>
                                        <p class="">` + obj1.price + `</p>
                                        <p class="b7 mb-0">Operation Date:</p>
                                        <p class="">` + obj1.operations_date + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Cargo Capacity:</p>
                                        <p class="">` + obj1.cargo_capacity + `</p>
                                        <p class="b7 mb-0">Holds Hatch:</p>
                                        <p class="">` + obj1.holds_hatch + `</p>
                                        <p class="b7 mb-0">Cover Type:</p>
                                        <p class="">` + obj1.cover_type + `</p>
                                        <p class="b7 mb-0">Additional Description:</p>
                                        <p class="">` + obj1.additional_description + `</p>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    </tr>
                                    `;
                        });
                    });


                } //end else
                $("#all_records").html(post_str);

                $("#total_rec_found").html(json_data['data']['length'] + " EXACT MATCHES");

                $('.hide_detail_btn').hide();

            }
        });
    });






    //////////////////////////////////////
    // AJAX Request for delete a record of search history 
    //////////////////////////////////////
    $(document).on('click', '#vsale_delete_rec', function(e) {
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
                success: function(response) {
                    // alert(response);
                    if (response == "1") {
                        // Remove row from HTML Table
                        table_row.css('background', 'red');
                        table_row.fadeOut(800, function() {
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
    $(document).on('click', '#vsale_show_update_ser_hist_form_each', function(e) {
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
            success: function(response) {

                let json_data = $.parseJSON(response);
                var len = json_data.length;

                $("#date_available_" + uid).val(json_data['data']['date_available']);
                $("#operations_date_" + uid).val(json_data['data']['operations_date']);

                let arr = ["vessel_type_id", "region_id", "country_id", "port_id"];

                $.each(arr, function(i, obj1) {

                    let dd_id = "#" + obj1 + "_" + uid;
                    let dd_data = json_data['data'][obj1];
                    let dd_data_arr = dd_data.split(",");

                    $.each(dd_data_arr, function(i, obj2) {
                        $(dd_id + " option[value='" + obj2 + "']").attr("selected", "selected");
                    });

                    $(dd_id).siblings(".btn").attr("class", "btn dropdown-toggle btn-light");

                    if (dd_data_arr.length > 2) {
                        $(dd_id).siblings(".btn").attr("title", dd_data_arr.length + " items selected");
                        $(dd_id).siblings(".btn").find(".filter-option-inner-inner").html(dd_data_arr.length + " items selected");
                    } else {
                        $(dd_id).siblings(".btn").attr("title", dd_data);
                        $(dd_id).siblings(".btn").find(".filter-option-inner-inner").html(dd_data);
                    }
                });

            }
        });
    });



    //////////////////////////////////////
    // AJAX Request for updating search history recod
    //////////////////////////////////////
    $(document).on('click', '.vsale_req_update_ser_hist_each', function(e) {
        e.preventDefault();
        let el = e.target;
        let uid = el.getAttribute('id').split("_")[1];

        $(".ser_hist_rec_each").show();
        $(".adv_ser_form_each").hide();

        let date_from = $("#date_available_" + uid).val();
        let date_to = $("#operations_date_" + uid).val();



        let arr = ["vessel_type_id", "region_id", "country_id", "port_id"];

        let dd_str = new Array(4);
        let count = 0;

        $.each(arr, function(i, obj1) {
            let dd_id = "#" + obj1 + "_" + uid;
            var dd_data = $(dd_id).map(function() { return $(this).val(); }).get();
            dd_str[count] = "";
            $.each(dd_data, function(i, obj1) {
                dd_str[count] += obj1 + ",";
            });
            dd_str[count] = dd_str[count].replace(/,+$/, '');
            count++;
        });
        // console.log("cargo ", dd_str[1]);


        if (date_from == "") {
            alert("Please fill out all fields");
        } else {
            $.ajax({
                url: route('vessel_sale.update_hist_data'),
                data: "id=" + uid + "&vessel_type_id=" + dd_str[0] + "&date_available=" + date_from +
                    "&operations_date=" + date_to + "&region_id=" + dd_str[1] + "&country_id=" + dd_str[2] +
                    "&port_id=" + dd_str[3],
                type: "get",
                success: function(response) {
                    if (response == false) {
                        alert("something went wrong. Please try again");
                    } else {
                        $("#vesseltype-" + uid).html(dd_str[0].replace(/,/g, ',<br>'));
                        $("#date_available-" + uid).html(date_from);
                        $("#operations_date-" + uid).html(date_to);
                        $("#region-" + uid).html(dd_str[1].replace(/,/g, ',<br>'));
                        $("#country-" + uid).html(dd_str[2].replace(/,/g, ',<br>'));
                        $("#port-" + uid).html(dd_str[3].replace(/,/g, ',<br>'));

                        let json_data = $.parseJSON(response);
                        var len = json_data.length;
                        var post_str = "";
                        // console.log(json_data['data'][0]['cargo_name'])

                        if (json_data['data']['length'] == 0) {
                            post_str +=
                                '<tr class=""><td colspan="11"><i>No exact results. Try expanding your filters</i></td></tr>';
                        } else {
                            $.each(json_data, function(i, obj) {
                                $.each(obj, function(i, obj1) {
                                    // console.log(obj1);
                                    // console.log(i + "  " + obj1);
                                    post_str += `<tr class="">
                                    <td>` + obj1.ref_no + `</td>
                                    <td>` + obj1.vessel_type_id.replace(/,/g, ',<br>') + `</td>
                                    <td>` + GetFormattedDate(obj1.date_available) + `</td>
                                    <td>` + GetFormattedDate(obj1.operations_date) + `</td>
                                    <td>` + obj1.region_id.replace(/,/g, ',<br>') + `</td>
                                    <td>` + obj1.country_id.replace(/,/g, ',<br>') + `</td>
                                    <td>` + obj1.port_id.replace(/,/g, ',<br>') + `</td>
                                    <td>` + obj1.built_year + `</td>
                                    <td>` + obj1.created_at + `</td>
                                    <td class="text-center">
                                        <a href="` + obj1.vessel_sale_id + `" class="show_detail_btn_` + obj1
                                        .vessel_sale_id + ` show_detail_btn"><i class="fas fa-eye fa-2x"></i></a>
                                        <a href="` + obj1.vessel_sale_id + `" class="hide_detail_btn_` + obj1
                                        .vessel_sale_id + ` hide_detail_btn"><i class="fas fa-eye-slash fa-2x"></i></a>
                                    </td>
                                    </tr>
                                    
                                    <tr class="show_details show_details_` + obj1.vessel_sale_id + ` tr_bg_cl d_n">
                                    <td></td>
                                    <td>
                                        <p class="b7 mb-0">Last Dry Docked:</p>
                                        <p class="">` + obj1.last_dry_docked + `</p>
                                        <p class="b7 mb-0">Last SS:</p>
                                        <p class="">` + obj1.last_ss + `</p>
                                        <p class="b7 mb-0">Classification:</p>
                                        <p class="">` + obj1.classification + `</p>
                                        <p class="b7 mb-0">GRT:</p>
                                        <p class="">` + obj1.GRT + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">NRT:</p>
                                        <p class="">` + obj1.NRT + `</p>
                                        <p class="b7 mb-0">DWT:</p>
                                        <p class="">` + obj1.dwt + `</p>
                                        <p class="b7 mb-0">Light Weight:</p>
                                        <p class="">` + obj1.lightweight + `</p>
                                        <p class="b7 mb-0">Speed:</p>
                                        <p class="">` + obj1.speed + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Consumption:</p>
                                        <p class="">` + obj1.consumption + `</p>
                                        <p class="b7 mb-0">LOA:</p>
                                        <p class="">` + obj1.loa + `</p>
                                        <p class="b7 mb-0">Breadth:</p>
                                        <p class="">` + obj1.breadth + `</p>
                                        <p class="b7 mb-0">Summer Draft:</p>
                                        <p class="">` + obj1.summer_draft + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">FW Draft:</p>
                                        <p class="">` + obj1.fw_draft + `</p>
                                        <p class="b7 mb-0">Main Engine:</p>
                                        <p class="">` + obj1.main_engine + `</p>
                                        <p class="b7 mb-0">AUX Engines:</p>
                                        <p class="">` + obj1.aux_engines + `</p>
                                        <p class="b7 mb-0">Bow Thruster:</p>
                                        <p class="">` + obj1.bow_thruster + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Gears:</p>
                                        <p class="">` + obj1.gears + `</p>
                                        <p class="b7 mb-0">Brief Description:</p>
                                        <p class="">` + obj1.brief_description + `</p>
                                        <p class="b7 mb-0">Propellers:</p>
                                        <p class="">` + obj1.propellers + `</p>
                                        <p class="b7 mb-0">Bunker Capacity:</p>
                                        <p class="">` + obj1.bunker_capacity + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">In Service:</p>
                                        <p class="">` + obj1.in_service + `</p>
                                        <p class="b7 mb-0">Date Available:</p>
                                        <p class="">` + obj1.date_available + `</p>
                                        <p class="b7 mb-0">Price:</p>
                                        <p class="">` + obj1.price + `</p>
                                        <p class="b7 mb-0">Operation Date:</p>
                                        <p class="">` + obj1.operations_date + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Cargo Capacity:</p>
                                        <p class="">` + obj1.cargo_capacity + `</p>
                                        <p class="b7 mb-0">Holds Hatch:</p>
                                        <p class="">` + obj1.holds_hatch + `</p>
                                        <p class="b7 mb-0">Cover Type:</p>
                                        <p class="">` + obj1.cover_type + `</p>
                                        <p class="b7 mb-0">Additional Description:</p>
                                        <p class="">` + obj1.additional_description + `</p>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    </tr>
                                    `;
                                });
                            });
                        } //end else
                        $("#all_records").html(post_str);

                        $("#total_rec_found").html(json_data['data']['length'] + " EXACT MATCHES");

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
    //     $('#cargo_table').DataTable({
    //         // "paging": false,
    //         // "pagingType":"full_numbers",
    //         //   "lengthMenu":[[5,10,25],[5,10,25]],
    //         "lengthMenu": [
    //             [10, 25, 50, 100, -1],
    //             [10, 25, 50, 100, 'All']
    //         ],
    //         responsive: true,
    //         type: 'date'
    //         // stateSave: true
    //     });



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