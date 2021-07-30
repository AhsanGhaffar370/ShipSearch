$(document).ready(function() {

    //cargo
    $('.cargo_type_id').selectpicker();
    $('.loading_region_id').selectpicker();
    $('.loading_country_id').selectpicker();
    $('.loading_port_id').selectpicker();
    $('.discharge_region_id').selectpicker();
    $('.discharge_country_id').selectpicker();
    $('.discharge_port_id').selectpicker();





    function GetFormattedDate(date12) {
        // var dateAr = '2014-01-06'.split('-');
        var dateAr = date12.split('-');
        var mon21 = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', ];
        var newDate = dateAr[2] + '-' + mon21[parseInt(dateAr[1]) - 1] + '-' + dateAr[0];
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
    // AJAX Request for Searching records when user click on any record inside search history table.
    //////////////////////////////////////
    $(document).on("click", '.ser_hist_rec_req_each', function(e) {

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
                                    <td>` + obj1.cargo_name + `</td>
                                    <td>` + obj1.cargo_type_id.replace(/,/g, ',<br>') + `</td>
                                    <td>` + obj1.loading_region_id.replace(/,/g, ',<br>') + `</td>
                                    <td>` + obj1.discharge_region_id.replace(/,/g, ',<br>') + `</td>
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
                                    
                                    <tr class="show_details show_details_` + obj1.cargo_id + `" style="display: none; background-color: #F1F1F1;">
                                    <td></td>
                                    <td>
                                        <p class="b7 mb-0">Loading Country:</p>
                                        <p class="">` + obj1.loading_country_id.replace(/,/g, ',<br>') + `</p>
                                        <p class="b7 mb-0">Max LOA:</p>
                                        <p class="">` + obj1.max_loa + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Loading Port:</p>
                                        <p class="">` + obj1.loading_port_id.replace(/,/g, ',<br>') + `</p>
                                        <p class="b7 mb-0">Max Draft:</p>
                                        <p class="">` + obj1.max_draft + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Discharge Country:</p>
                                        <p class="">` + obj1.discharge_country_id.replace(/,/g, ',<br>') + `</p>
                                        <p class="b7 mb-0">Max Height:</p>
                                        <p class="">` + obj1.max_height + `</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Discharge Port:</p>
                                        <p class="">` + obj1.discharge_port_id.replace(/,/g, ',<br>') + `</p>
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

                $("#total_rec_found").html(json_data['data']['length'] + " EXACT MATCHES");

                $('.hide_detail_btn').hide();

            }
        });
    });





    //////////////////////////////////////
    // AJAX Request for delete a record of search history 
    //////////////////////////////////////
    $(document).on('click', '#delete_rec', function(e) {
        // $(".delete_rec").click(function(e){
        e.preventDefault();
        let el = e.target;
        let table_row = $(el).parent().parent().parent();
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
    $(document).on('click', '#show_update_ser_hist_form_each', function(e) {
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

                $("#laycan_date_from_" + uid).val(json_data['data']['laycan_date_from']);
                $("#laycan_date_to_" + uid).val(json_data['data']['laycan_date_to']);

                let arr = ["cargo_type_id", "loading_region_id", "loading_country_id", "loading_port_id",
                    "discharge_region_id", "discharge_country_id", "discharge_port_id"
                ];

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
    $(document).on('click', '.req_update_ser_hist_each', function(e) {
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
        let dd_str = new Array(7);
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
        console.log("cargo ", dd_str[1]);


        if (date_from == "") {
            alert("Please fill out all fields");
        } else {
            $.ajax({
                url: route('cargo.update_hist_data'),
                data: "id=" + uid + "&cargo_type_id=" + dd_str[0] + "&laycan_date_from=" + date_from +
                    "&laycan_date_to=" + date_to + "&loading_region_id=" + dd_str[1] + "&loading_country_id=" + dd_str[2] +
                    "&loading_port_id=" + dd_str[3] + "&discharge_region_id=" + dd_str[4] +
                    "&discharge_country_id=" + dd_str[5] + "&discharge_port_id=" + dd_str[6],
                type: "get",
                success: function(response) {
                    if (response == false) {
                        alert("something went wrong. Please try again");
                    } else {
                        $("#cargotype-" + uid).html(dd_str[0].replace(/,/g, ',<br>'));
                        $("#laycan_from-" + uid).html(date_from);
                        $("#laycan_to-" + uid).html(date_to);
                        $("#lregion-" + uid).html(dd_str[1].replace(/,/g, ',<br>'));
                        $("#lcountry-" + uid).html(dd_str[2].replace(/,/g, ',<br>'));
                        $("#lport-" + uid).html(dd_str[3].replace(/,/g, ',<br>'));
                        $("#dregion-" + uid).html(dd_str[4].replace(/,/g, ',<br>'));
                        $("#dcountry-" + uid).html(dd_str[5].replace(/,/g, ',<br>'));
                        $("#dport-" + uid).html(dd_str[6].replace(/,/g, ',<br>'));

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
                                                <td>` + obj1.cargo_name + `</td>
                                                <td>` + obj1.cargo_type_id.replace(/,/g, ',<br>') + `</td>
                                                <td>` + obj1.loading_region_id.replace(/,/g, ',<br>') + `</td>
                                                <td>` + obj1.discharge_region_id.replace(/,/g, ',<br>') + `</td>
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
                                                
                                                <tr class="show_details show_details_` + obj1.cargo_id + `" style="display: none; background-color: #F1F1F1;">
                                                <td></td>
                                                <td>
                                                    <p class="b7 mb-0">Loading Country:</p>
                                                    <p class="">` + obj1.loading_country_id.replace(/,/g, ',<br>') + `</p>
                                                    <p class="b7 mb-0">Max LOA:</p>
                                                    <p class="">` + obj1.max_loa + `</p>
                                                </td>
                                                <td>
                                                    <p class="b7 mb-0">Loading Port:</p>
                                                    <p class="">` + obj1.loading_port_id.replace(/,/g, ',<br>') + `</p>
                                                    <p class="b7 mb-0">Max Draft:</p>
                                                    <p class="">` + obj1.max_draft + `</p>
                                                </td>
                                                <td>
                                                    <p class="b7 mb-0">Discharge Country:</p>
                                                    <p class="">` + obj1.discharge_country_id.replace(/,/g, ',<br>') + `</p>
                                                    <p class="b7 mb-0">Max Height:</p>
                                                    <p class="">` + obj1.max_height + `</p>
                                                </td>
                                                <td>
                                                    <p class="b7 mb-0">Discharge Port:</p>
                                                    <p class="">` + obj1.discharge_port_id.replace(/,/g, ',<br>') + `</p>
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