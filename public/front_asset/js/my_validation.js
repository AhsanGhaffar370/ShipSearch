$(document).ready(function () {


    // $(function(){
    //     // Enables popover
    //     $("[data-toggle=popover]").popover();
    // });




    $(document).on("change", 'select.ser_inp_fields', function (e) {

        let selected_name = $("option:selected", this).text(); //OR  $(this).find('option:selected').text();

        if (selected_name.trim() !== 'Any') {

            let rcp_ids = $(this).val();
            let rcp_name = $(this).attr('id');

            let n_prefix = "";
            if (rcp_name.includes("loading"))
                n_prefix = "loading_";
            else if (rcp_name.includes("discharge"))
                n_prefix = "discharge_";

            $.ajax({
                url: route('cargo.get_country_port'),
                data: "rcp_ids=" + rcp_ids + "&rcp_name=" + rcp_name,
                type: "get",
                success: function (response) {

                    let json_data = $.parseJSON(response);
                    var post_str = "";

                    let names = [];
                    if (rcp_name.includes("region"))
                        names = ['country', 'port'];
                    if (rcp_name.includes("country"))
                        names = ['region', 'port'];
                    if (rcp_name.includes("port"))
                        names = ['region', 'country'];

                    $.each(names, function (i, n_list) {
                        // get selected data of country/port
                        let dd_id = "#" + n_prefix + n_list + "_id";
                        let dd_data = $(dd_id + " option:selected").map(function () { return $.trim($(this).text()); }).get().join(',');
                        let dd_data_arr = $(dd_id).val();
                        post_str = "";
                        post_str += `
                        <select name="` + n_prefix + n_list + `_id[]" id="` + n_prefix + n_list + `_id" class="` + n_prefix + n_list + `_id ser_inp_fields" form="search_cvs_form"
                            multiple title="Choose" data-size="5" data-selected-text-format="count > 2" data-live-search="true">`;


                        // console.log(json_data['data'][n_list].length);
                        if (n_list == 'region' && json_data['data']['region'].length > 1)
                            post_str += `<option value="26">Any</option>`;
                        if (n_list == 'country' && json_data['data']['country'].length > 1)
                            post_str += `<option value="197">Any</option>`;
                        if (n_list == 'port' && json_data['data']['port'].length > 1)
                            post_str += `<option value="5638">Any</option>`;

                        if (rcp_ids.length < 1) {
                            $.each(json_data['data'][n_list], function (i, obj1) {
                                if (n_list == 'region' && json_data['data']['region'].length == 1)
                                    post_str += `<option value="` + obj1.region_id + `" selected>` + obj1.region_name + `</option>`;
                                else if (n_list == 'region')
                                    post_str += `<option value="` + obj1.region_id + `">` + obj1.region_name + `</option>`;

                                if (n_list == 'country' && json_data['data']['country'].length == 1)
                                    post_str += `<option value="` + obj1.country_id + `" selected>` + obj1.country_name + `</option>`;
                                else if (n_list == 'country')
                                    post_str += `<option value="` + obj1.country_id + `">` + obj1.country_name + `</option>`;

                                if (n_list == 'port' && json_data['data']['port'].length == 1)
                                    post_str += `<option value="` + obj1.port_id + `" selected>` + obj1.port_name + `</option>`;
                                else if (n_list == 'port')
                                    post_str += `<option value="` + obj1.port_id + `">` + obj1.port_name + `</option>`;
                            });
                        } else {
                            $.each(json_data['data'][n_list], function (i, obj1) {
                                if (n_list == 'region' && json_data['data']['region'].length == 1)
                                    post_str += `<option value="` + obj1.region_rel.region_id + `" selected>` + obj1.region_rel.region_name + `</option>`;
                                else if (n_list == 'region')
                                    post_str += `<option value="` + obj1.region_rel.region_id + `">` + obj1.region_rel.region_name + `</option>`;

                                if (n_list == 'country' && json_data['data']['country'].length == 1)
                                    post_str += `<option value="` + obj1.country_rel.country_id + `" selected>` + obj1.country_rel.country_name + `</option>`;
                                else if (n_list == 'country')
                                    post_str += `<option value="` + obj1.country_rel.country_id + `">` + obj1.country_rel.country_name + `</option>`;

                                if (n_list == 'port' && json_data['data']['port'].length == 1)
                                    post_str += `<option value="` + obj1.port_rel.port_id + `" selected>` + obj1.port_rel.port_name + `</option>`;
                                else if (n_list == 'port')
                                    post_str += `<option value="` + obj1.port_rel.port_id + `">` + obj1.port_rel.port_name + `</option>`;

                            });
                        }

                        post_str += `</select>`;
                        $("." + n_prefix + n_list + "_id_par").html(post_str);

                        // populate selected data in their dropdown
                        $.each(dd_data_arr, function (i, obj2) {
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

                        $("." + n_prefix + n_list + "_id").selectpicker();
                    });
                }
            });
        }
    });

    $(document).on("change", 'select.ser_inp_fields_each', function (e) {
        

        let selected_name = $("option:selected", this).text(); //OR  $(this).find('option:selected').text();

        if (selected_name.trim() !== 'Any') {

            let rcp_ids = $(this).val();
            let rcp_name = $(this).attr('id');

            let id1 = rcp_name.split('_');
            let id = id1[id1.length - 1];

            let n_prefix = "";
            if (rcp_name.includes("loading"))
                n_prefix = "loading_";
            else if (rcp_name.includes("discharge"))
                n_prefix = "discharge_";

            $.ajax({
                url: route('cargo.get_country_port'),
                data: "rcp_ids=" + rcp_ids + "&rcp_name=" + rcp_name,
                type: "get",
                success: function (response) {

                    let json_data = $.parseJSON(response);
                    var post_str = "";

                    let names = [];
                    if (rcp_name.includes("region"))
                        names = ['country', 'port'];
                    if (rcp_name.includes("country"))
                        names = ['region', 'port'];
                    if (rcp_name.includes("port"))
                        names = ['region', 'country'];

                    $.each(names, function (i, n_list) {
                        // get selected data of country/port
                        let dd_id = "#" + n_prefix + n_list + "_id_" + id;
                        let dd_data = $(dd_id + " option:selected").map(function () { return $.trim($(this).text()); }).get().join(',');
                        let dd_data_arr = $(dd_id).val();
                        post_str = "";
                        post_str += `
                        <select name="` + n_prefix + n_list + `_id[]" id="` + n_prefix + n_list + `_id_` + id + `" class="` + n_prefix + n_list + `_id ser_inp_fields_each" form="search_cvs_form_` + id + `" 
                            multiple title="Choose" data-size="5" data-selected-text-format="count > 2" data-live-search="true">`;

                        // console.log(json_data['data'][n_list].length);
                        if (n_list == 'region' && json_data['data']['region'].length > 1)
                            post_str += `<option value="26">Any</option>`;
                        if (n_list == 'country' && json_data['data']['country'].length > 1)
                            post_str += `<option value="197">Any</option>`;
                        if (n_list == 'port' && json_data['data']['port'].length > 1)
                            post_str += `<option value="5638">Any</option>`;

                        if (rcp_ids.length < 1) {
                            $.each(json_data['data'][n_list], function (i, obj1) {
                                if (n_list == 'region' && json_data['data']['region'].length == 1)
                                    post_str += `<option value="` + obj1.region_id + `" selected>` + obj1.region_name + `</option>`;
                                else if (n_list == 'region')
                                    post_str += `<option value="` + obj1.region_id + `">` + obj1.region_name + `</option>`;

                                if (n_list == 'country' && json_data['data']['country'].length == 1)
                                    post_str += `<option value="` + obj1.country_id + `" selected>` + obj1.country_name + `</option>`;
                                else if (n_list == 'country')
                                    post_str += `<option value="` + obj1.country_id + `">` + obj1.country_name + `</option>`;

                                if (n_list == 'port' && json_data['data']['port'].length == 1)
                                    post_str += `<option value="` + obj1.port_id + `" selected>` + obj1.port_name + `</option>`;
                                else if (n_list == 'port')
                                    post_str += `<option value="` + obj1.port_id + `">` + obj1.port_name + `</option>`;
                            });
                        } else {
                            $.each(json_data['data'][n_list], function (i, obj1) {
                                if (n_list == 'region' && json_data['data']['region'].length == 1)
                                    post_str += `<option value="` + obj1.region_rel.region_id + `" selected>` + obj1.region_rel.region_name + `</option>`;
                                else if (n_list == 'region')
                                    post_str += `<option value="` + obj1.region_rel.region_id + `">` + obj1.region_rel.region_name + `</option>`;

                                if (n_list == 'country' && json_data['data']['country'].length == 1)
                                    post_str += `<option value="` + obj1.country_rel.country_id + `" selected>` + obj1.country_rel.country_name + `</option>`;
                                else if (n_list == 'country')
                                    post_str += `<option value="` + obj1.country_rel.country_id + `">` + obj1.country_rel.country_name + `</option>`;

                                if (n_list == 'port' && json_data['data']['port'].length == 1)
                                    post_str += `<option value="` + obj1.port_rel.port_id + `" selected>` + obj1.port_rel.port_name + `</option>`;
                                else if (n_list == 'port')
                                    post_str += `<option value="` + obj1.port_rel.port_id + `">` + obj1.port_rel.port_name + `</option>`;

                            });
                        }

                        post_str += `</select>`;
                        $("." + n_prefix + n_list + "_id_par_" + id).html(post_str);

                        // populate selected data in their dropdown
                        $.each(dd_data_arr, function (i, obj2) {
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

                        $("." + n_prefix + n_list + "_id").selectpicker();
                    });
                }
            });
        }
    });


    $(document).on("change", 'select.add_cvs_inp_fields', function (e) {

        let selected_name = $("option:selected", this).text(); //OR  $(this).find('option:selected').text();
        
        var all_country = []
        var all_cargo = []
        var all_region = []
        var all_port = []

        $("#loading_country_id option").each(function () {
            all_country.push({ id: $(this).val(), text: $(this).text() });
        });
        
        $("#loading_port_id option").each(function () {
            all_port.push({ id: $(this).val(), text: $(this).text() });
        });
        $("#loading_region_id option").each(function () {
            all_region.push({ id: $(this).val(), text: $(this).text() });
        });
        // $("#cargo_type_id option").each(function () {
        //     all_cargo.push({ id: $(this).val(), text: $(this).text() });
        // });

        var skip_country = [];
        if (selected_name.trim() !== 'Any') {
            let rcp_ids = $(this).val();
            let rcp_name = $(this).attr('id');


            let form_id1 = $(this).closest('form').parent('div').attr('id');
            let form_id = "";
            if (form_id1.includes("cargo"))
                form_id = "search_cargo_form";
            if (form_id1.includes("vessel"))
                form_id = "search_vessel_form";
            if (form_id1.includes("vsale"))
                form_id = "search_vsale_form";

            let n_prefix = "";
            if (rcp_name.includes("loading"))
                n_prefix = "loading_";
            else if (rcp_name.includes("discharge"))
                n_prefix = "discharge_";

            $.ajax({
                url: route('cargo.get_country_port'),
                data: "rcp_ids=" + rcp_ids + "&rcp_name=" + rcp_name,
                type: "get",
                success: function (response) {

                    let json_data = $.parseJSON(response);
                    var post_str = "";

                    let names = [];
                    if (rcp_name.includes("region"))
                        names = ['country', 'port'];
                    if (rcp_name.includes("country"))
                        names = ['region', 'port'];
                    if (rcp_name.includes("port"))
                        names = ['region', 'country'];

                    $.each(names, function (i, n_list) {
                        // get selected data of country/port
                        let dd_id = "#" + form_id + " #" + n_prefix + n_list + "_id";
                        let dd_data = $(dd_id + " option:selected").map(function () { return $.trim($(this).text()); }).get().join(',');
                        let dd_data_arr = $(dd_id).val();
                        post_str = "";
                        post_str += `
                        <select name="` + n_prefix + n_list + `_id[]" id="` + n_prefix + n_list + `_id" class="form-control ` + n_prefix + n_list + `_id add_cvs_inp_fields ser_inp_fields21 mb-2" 
                            multiple form="` + form_id + `" title="Choose" data-size="5" data-selected-text-format="count > 2" data-live-search="true">`;

                        // console.log(json_data['data'][n_list].length);
                        if (n_list == 'region' && json_data['data']['region'].length > 1)
                            post_str += `<option value="26">Any</option>`;
                        if (n_list == 'country' && json_data['data']['country'].length > 1)
                            post_str += `<option value="197">Any</option>`;
                        if (n_list == 'port' && json_data['data']['port'].length > 1)
                            post_str += `<option value="5638">Any</option>`;

                        if (rcp_ids.length < 1) {

                            $.each(json_data['data'][n_list], function (i, obj1) {
                                if (n_list == 'region') {
                                    all_region.splice(all_region.findIndex(item => item.id == obj1.region_id),1);
                                    // all_region = all_region.filter(function (obj) {
                                    //     return obj.value !== obj1.region_id;
                                    // });
                                }
                                if (n_list == 'region' && json_data['data']['region'].length == 1) {

                                    post_str += `<option value="` + obj1.region_id + `" selected>` + obj1.region_name + `</option>`;

                                }
                                else if (n_list == 'region') {
                                    
                                    post_str += `<option value="` + obj1.region_id + `">` + obj1.region_name + `</option>`;
                                }
                                if(n_list == 'country'){
                                    all_country.splice(all_country.findIndex(item => item.id == obj1.country_id),1);
                                   
                                }
                                if (n_list == 'country' && json_data['data']['country'].length == 1) {
                                    // all_country = all_country.filter(function (obj) {
                                    //     return obj.id !== obj1.country_id;
                                    // });
                                    // skip_country.append(obj1.country_id)
                                    post_str += `<option value="` + obj1.country_id + `" selected>` + obj1.country_name + `</option>`;
                                }

                                else if (n_list == 'country') {
                                  
                                    post_str += `<option value="` + obj1.country_id + `">` + obj1.country_name + `</option>`;
                                }
                                if (n_list == 'port') {
                                    all_port.splice(all_port.findIndex(item => item.id == obj1.port_id),1);
                                }
                                if (n_list == 'port' && json_data['data']['port'].length == 1)
                                    post_str += `<option value="` + obj1.port_id + `" selected>` + obj1.port_name + `</option>`;
                                else if (n_list == 'port')
                                    post_str += `<option value="` + obj1.port_id + `">` + obj1.port_name + `</option>`;

                            });


                        } else {
                            $.each(json_data['data'][n_list], function (i, obj1) {
                                 
                                if (n_list == 'region') {
                                    all_region.splice(all_region.findIndex(item => item.id == obj1.region_rel.region_id),1);
                                }
                                if (n_list == 'region' && json_data['data']['region'].length == 1)
                                    post_str += `<option value="` + obj1.region_rel.region_id + `" selected>` + obj1.region_rel.region_name + `</option>`;
                                else if (n_list == 'region')
                                    post_str += `<option value="` + obj1.region_rel.region_id + `">` + obj1.region_rel.region_name + `</option>`;
                                if(n_list == 'country'){
                                    all_country.splice(all_country.findIndex(item => item.id == obj1.country_rel.country_id),1);
                                }
                                if (n_list == 'country' && json_data['data']['country'].length == 1) {
                                    
                                    post_str += `<option value="` + obj1.country_rel.country_id + `" selected>` + obj1.country_rel.country_name + `</option>`;

                                }
                                else if (n_list == 'country') {
                                    // all_country = all_country.filter(function (obj) {
                                    //     return obj.id !== obj1.country_rel.country_id;
                                    // });
                                    post_str += `<option value="` + obj1.country_rel.country_id + `">` + obj1.country_rel.country_name + `</option>`;

                                }
                                if (n_list == 'port') {
                                    all_port.splice(all_port.findIndex(item => item.id == obj1.port_rel.port_id),1);
                                }
                                if (n_list == 'port' && json_data['data']['port'].length == 1)
                                    post_str += `<option value="` + obj1.port_rel.port_id + `" selected>` + obj1.port_rel.port_name + `</option>`;
                                else if (n_list == 'port')
                                    post_str += `<option value="` + obj1.port_rel.port_id + `">` + obj1.port_rel.port_name + `</option>`;

                            });
                        }
                        post_str += `</select>`;
                        $("#" + form_id + " ." + n_prefix + n_list + "_id_par").html(post_str);

                        // populate selected data in their dropdown
                        $.each(dd_data_arr, function (i, obj2) {
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

                        $("." + n_prefix + n_list + "_id").selectpicker();
                        
                        
                        // all_cargo.forEach(element => {
                        //     $('#cargo_type_id').append($('<option>', {
                        //         value: element.id,
                        //         text: element.text
                        //     }));
                        // });
                        
                       
                        if(n_list == "country"){
                            all_country.forEach(element => {
                                $("#" + n_prefix + n_list + "_id").append($('<option>', {
                                    value: element.id,
                                    text: element.text
                                }));
                            });
                        }
                        else if (n_list == "region"){
                            all_region.forEach(element => {
                                $("#" + n_prefix + n_list + "_id").append($('<option>', {
                                    value: element.id,
                                    text: element.text
                                }));
                            });
                        }
                        else if (n_list == "port"){
                            all_port.forEach(element => {
                                $("#" + n_prefix + n_list + "_id").append($('<option>', {
                                    value: element.id,
                                    text: element.text
                                }));
                            });
                        }
                        
                        $("." + n_prefix + n_list + "_id").selectpicker("refresh");
                    });
                }
            });
        }
    });

    // $(document).on("change", 'select.add_cvs_inp_fields', function(e) {

    //     let selected_name = $("option:selected", this).text(); //OR  $(this).find('option:selected').text();


    //     if (selected_name.trim() !== 'Any') {
    //         let rcp_ids = $(this).val();
    //         let rcp_name = $(this).attr('id');

    //         let form_id1 = $(this).closest('form').parent('div').attr('id');
    //         let form_id = "";
    //         if (form_id1.includes("cargo"))
    //             form_id = "search_cargo_form";
    //         if (form_id1.includes("vessel"))
    //             form_id = "search_vessel_form";
    //         if (form_id1.includes("vsale"))
    //             form_id = "search_vsale_form";

    //         let n_prefix = "";
    //         if (rcp_name.includes("loading"))
    //             n_prefix = "loading_";
    //         else if (rcp_name.includes("discharge"))
    //             n_prefix = "discharge_";

    //         $.ajax({
    //             url: route('cargo.get_country_port'),
    //             data: "rcp_ids=" + rcp_ids + "&rcp_name=" + rcp_name,
    //             type: "get",
    //             success: function(response) {

    //                 let json_data = $.parseJSON(response);
    //                 var post_str = "";

    //                 let names = [];
    //                 if (rcp_name.includes("region"))
    //                     names = ['country', 'port'];
    //                 if (rcp_name.includes("country"))
    //                     names = ['region', 'port'];
    //                 if (rcp_name.includes("port"))
    //                     names = ['region', 'country'];

    //                 $.each(names, function(i, n_list) {
    //                     // get selected data of country/port
    //                     let dd_id = "#" + n_prefix + n_list + "_id";
    //                     let dd_data = $(dd_id + " option:selected").map(function() { return $.trim($(this).text()); }).get().join(',');
    //                     let dd_data_arr = $(dd_id).val();
    //                     post_str = "";
    //                     post_str += `
    //                     <select name="` + n_prefix + n_list + `_id[]" id="` + n_prefix + n_list + `_id" class="form-control ` + n_prefix + n_list + `_id add_cvs_inp_fields ser_inp_fields21 mb-2" 
    //                         multiple form="` + form_id + `" title="Choose" data-size="5" data-selected-text-format="count > 2" data-live-search="true">`;

    //                     if (rcp_ids.length < 1) {
    //                         $.each(json_data['data'][n_list], function(i, obj1) {
    //                             if (n_list == 'region')
    //                                 post_str += `<option value="` + obj1.region_id + `">` + obj1.region_name + `</option>`;
    //                             if (n_list == 'country')
    //                                 post_str += `<option value="` + obj1.country_id + `">` + obj1.country_name + `</option>`;
    //                             if (n_list == 'port')
    //                                 post_str += `<option value="` + obj1.port_id + `">` + obj1.port_name + `</option>`;
    //                         });
    //                     } else {
    //                         $.each(json_data['data'][n_list], function(i, obj1) {
    //                             if (n_list == 'region')
    //                                 post_str += `<option value="` + obj1.region_rel.region_id + `">` + obj1.region_rel.region_name + `</option>`;
    //                             if (n_list == 'country')
    //                                 post_str += `<option value="` + obj1.country_rel.country_id + `">` + obj1.country_rel.country_name + `</option>`;
    //                             if (n_list == 'port')
    //                                 post_str += `<option value="` + obj1.port_rel.port_id + `">` + obj1.port_rel.port_name + `</option>`;
    //                         });
    //                     }
    //                     post_str += `</select>`;
    //                     $("." + n_prefix + n_list + "_id_par").html(post_str);

    //                     // populate selected data in their dropdown
    //                     $.each(dd_data_arr, function(i, obj2) {
    //                         $(dd_id + " option[value='" + obj2 + "']").attr("selected", "selected");
    //                     });
    //                     $(dd_id).siblings(".btn").attr("class", "btn dropdown-toggle btn-light");
    //                     if (dd_data_arr.length > 2) {
    //                         $(dd_id).siblings(".btn").attr("title", dd_data_arr.length + " items selected");
    //                         $(dd_id).siblings(".btn").find(".filter-option-inner-inner").html(dd_data_arr.length + " items selected");
    //                     } else {
    //                         $(dd_id).siblings(".btn").attr("title", dd_data);
    //                         $(dd_id).siblings(".btn").find(".filter-option-inner-inner").html(dd_data);
    //                     }

    //                     $("." + n_prefix + n_list + "_id").selectpicker();
    //                 });
    //             }
    //         });
    //     }else{
    //         console.log('asdfdsfd');
    //     }
    // });


























    // $('.country_id').prop('disabled', true);
    // $('.port_id').prop('disabled', true);
    // $('#loading_country_id').prop('disabled', true);
    // $('#loading_port_id').prop('disabled', true);
    // $('#discharge_country_id').prop('disabled', true);
    // $('#discharge_port_id').prop('disabled', true);


    // $(document).on("change", 'select.ser_inp_fields', function(e) {

    //     var region_country_id = $(this).val();
    //     let country_port_attr = $(this).closest('section').parent().next().children('section').children('div').children('select').attr('id');
    //     let country_port_par_attr = "." + $(this).closest('td').next().children('section').attr('class');

    //     // get selected data of country/port
    //     let dd_id = "#" + country_port_attr;
    //     var dd_data = $("#" + country_port_attr + " option:selected").map(function() { return $.trim($(this).text()); }).get().join(',');
    //     let dd_data_arr = $("#" + country_port_attr).val();


    //     if (country_port_attr !== "discharge_region_id" && country_port_attr != undefined) {
    //         $.ajax({
    //             url: route('cargo.get_country_port'),
    //             data: "region_country_id=" + region_country_id + "&country_port_name=" + country_port_attr,
    //             type: "get",
    //             success: function(response) {

    //                 let json_data = $.parseJSON(response);
    //                 var post_str = "";

    //                 post_str += `
    //                 <select name="` + country_port_attr + `[]" id="` + country_port_attr + `" form="search_cvs_form"
    //                     class="` + country_port_attr + ` ser_inp_fields" multiple title="Choose" data-size="5"
    //                     data-selected-text-format="count > 2" data-live-search="true">`;

    //                     $.each(json_data, function(i, obj1) {
    //                         if (country_port_attr.includes('country'))
    //                             post_str += `<option value="` + obj1.country_rel.country_id + `">` + obj1.country_rel.country_name + `</option>`;
    //                         else if (country_port_attr.includes('port'))
    //                             post_str += `<option value="` + obj1.port_rel.port_id + `">` + obj1.port_rel.port_name + `</option>`;
    //                     });

    //                 post_str += 
    //                 `</select>`;

    //                 $(country_port_par_attr).html(post_str);


    //                 // populate selected data in their dropdown
    //                 $.each(dd_data_arr, function(i, obj2) {
    //                     $(dd_id + " option[value='" + obj2 + "']").attr("selected", "selected");
    //                 });
    //                 $(dd_id).siblings(".btn").attr("class", "btn dropdown-toggle btn-light");
    //                 if (dd_data_arr.length > 2) {
    //                     $(dd_id).siblings(".btn").attr("title", dd_data_arr.length + " items selected");
    //                     $(dd_id).siblings(".btn").find(".filter-option-inner-inner").html(dd_data_arr.length + " items selected");
    //                 } else {
    //                     $(dd_id).siblings(".btn").attr("title", dd_data);
    //                     $(dd_id).siblings(".btn").find(".filter-option-inner-inner").html(dd_data);
    //                 }

    //                 // if (region_country_id.length == 0) {
    //                     // $('#' + country_port_attr).prop('disabled', true);

    //                     // if (country_port_attr.includes('loading')) {
    //                     //     $('#loading_port_id').siblings('button').prop('disabled', true);
    //                     //     $('#loading_port_id').siblings(".btn").find(".filter-option-inner-inner").html("Choose");
    //                     // }
    //                     // if (country_port_attr.includes('discharge')) {
    //                     //     $('#discharge_port_id').siblings('button').prop('disabled', true);
    //                     //     $('#discharge_port_id').siblings(".btn").find(".filter-option-inner-inner").html("Choose");
    //                     // }
    //                 // }

    //                 $('.' + country_port_attr).selectpicker();
    //             }
    //         });
    //     }
    // });


    // $(document).on("change", 'select.ser_inp_fields_each', function(e) {

    //     var region_country_id = $(this).val();
    //     let country_port_attr = $(this).closest('section').parent().next().children('section').children('div').children('select').attr('id');
    //     let country_port_par_attr = "." + $(this).closest('td').next().children('section').attr('class');


    //     let id1 = country_port_attr.split('_');
    //     let id = id1[id1.length - 1];

    //     // console.log(id);
    //     // console.log(country_port_par_attr);

    //     // get selected data of country/port
    //     let dd_id = "#" + country_port_attr;
    //     var dd_data = $("#" + country_port_attr + " option:selected").map(function() { return $.trim($(this).text()); }).get().join(',');
    //     let dd_data_arr = $("#" + country_port_attr).val();

    //     if (country_port_attr !== "discharge_region_id_" + id && country_port_attr != undefined) {
    //         $.ajax({
    //             url: route('cargo.get_country_port'),
    //             data: "region_country_id=" + region_country_id + "&country_port_name=" + country_port_attr,
    //             type: "get",
    //             success: function(response) {

    //                 let json_data = $.parseJSON(response);
    //                 var post_str = "";

    //                 post_str += `
    //                 <select name="` + country_port_attr + `[]" id="` + country_port_attr + `" form="search_cvs_form"
    //                     class="` + country_port_attr + ` ser_inp_fields_each" multiple title="Choose" data-size="5"
    //                     data-selected-text-format="count > 2" data-live-search="true">`;

    //                 $.each(json_data, function(i, obj1) {
    //                     if (country_port_attr.includes('country'))
    //                         post_str += `<option value="` + obj1.country_rel.country_id + `">` + obj1.country_rel.country_name + `</option>`;
    //                     else if (country_port_attr.includes('port'))
    //                         post_str += `<option value="` + obj1.port_rel.port_id + `">` + obj1.port_rel.port_name + `</option>`;
    //                 });

    //                 post_str += `</select>`;

    //                 $(country_port_par_attr).html(post_str);

    //                 // populate selected data in their dropdown
    //                 $.each(dd_data_arr, function(i, obj2) {
    //                     $(dd_id + " option[value='" + obj2 + "']").attr("selected", "selected");
    //                 });
    //                 $(dd_id).siblings(".btn").attr("class", "btn dropdown-toggle btn-light");
    //                 if (dd_data_arr.length > 2) {
    //                     $(dd_id).siblings(".btn").attr("title", dd_data_arr.length + " items selected");
    //                     $(dd_id).siblings(".btn").find(".filter-option-inner-inner").html(dd_data_arr.length + " items selected");
    //                 } else {
    //                     $(dd_id).siblings(".btn").attr("title", dd_data);
    //                     $(dd_id).siblings(".btn").find(".filter-option-inner-inner").html(dd_data);
    //                 }



    //                 // if (region_country_id.length == 0) {
    //                 //     $('#' + country_port_attr).prop('disabled', true);

    //                 //     if (country_port_attr.includes('loading')) {
    //                 //         $('#loading_port_id_' + id).siblings('button').prop('disabled', true);
    //                 //         $('#loading_port_id_' + id).siblings(".btn").find(".filter-option-inner-inner").html("Choose");
    //                 //     }

    //                 //     if (country_port_attr.includes('discharge')) {
    //                 //         $('#discharge_port_id_' + id).siblings('button').prop('disabled', true);
    //                 //         $('#discharge_port_id_' + id).siblings(".btn").find(".filter-option-inner-inner").html("Choose");
    //                 //     }
    //                 // } else
    //                 //     $('#' + country_port_attr).prop('disabled', false);


    //                 $('.' + country_port_attr).selectpicker();


    //             }
    //         });
    //     }
    // });



    // $(document).on("change", 'select.add_cvs_inp_fields', function(e) {

    //     var region_country_id = $(this).val();
    //     let country_port_attr = $(this).closest('section').parent().next().children('section').children('div').children('select').attr('id');
    //     let country_port_par_attr = "." + $(this).closest('section').parent().next().children('section').attr('class');

    //     // get selected data of country/port
    //     let dd_id = "#" + country_port_attr;
    //     var dd_data = $("#" + country_port_attr + " option:selected").map(function() { return $.trim($(this).text()); }).get().join(',');
    //     let dd_data_arr = $("#" + country_port_attr).val();


    //     if (country_port_attr !== "discharge_region_id" && country_port_attr != undefined) {
    //         $.ajax({
    //             url: route('cargo.get_country_port'),
    //             data: "region_country_id=" + region_country_id + "&country_port_name=" + country_port_attr,
    //             type: "get",
    //             success: function(response) {

    //                 let json_data = $.parseJSON(response);
    //                 var post_str = "";

    //                 post_str += `
    //             <select name="` + country_port_attr + `[]" id="` + country_port_attr + `"
    //                 class="form-control ` + country_port_attr + ` add_cvs_inp_fields ser_inp_fields21 mb-2" multiple title="Choose" data-size="5"
    //                 data-selected-text-format="count > 2" data-live-search="true">`;

    //                 $.each(json_data, function(i, obj1) {
    //                     if (country_port_attr.includes('country'))
    //                         post_str += `<option value="` + obj1.country_rel.country_id + `">` + obj1.country_rel.country_name + `</option>`;
    //                     else if (country_port_attr.includes('port'))
    //                         post_str += `<option value="` + obj1.port_rel.port_id + `">` + obj1.port_rel.port_name + `</option>`;
    //                 });

    //                 post_str += `</select>`;

    //                 $(country_port_par_attr).html(post_str);


    //                 // populate selected data in their dropdown
    //                 $.each(dd_data_arr, function(i, obj2) {
    //                     $(dd_id + " option[value='" + obj2 + "']").attr("selected", "selected");
    //                 });
    //                 $(dd_id).siblings(".btn").attr("class", "btn dropdown-toggle btn-light");
    //                 if (dd_data_arr.length > 2) {
    //                     $(dd_id).siblings(".btn").attr("title", dd_data_arr.length + " items selected");
    //                     $(dd_id).siblings(".btn").find(".filter-option-inner-inner").html(dd_data_arr.length + " items selected");
    //                 } else {
    //                     $(dd_id).siblings(".btn").attr("title", dd_data);
    //                     $(dd_id).siblings(".btn").find(".filter-option-inner-inner").html(dd_data);
    //                 }

    //                 $('.' + country_port_attr).selectpicker();
    //             }
    //         });
    //     }
    // });












    //////////////////////////////////////
    // AJAX Request for checking email is already exist or not on signup page
    //////////////////////////////////////
    $("#email31").keyup(function () {
        let ser = $('#email31').val();

        $.ajax({
            url: 'checkmail',
            type: 'get',
            data: 'email=' + ser,
            success: function (response) {
                if (response == "exist") {
                    $("#msg21").html(
                        '<div class="alert alert-warning"><i class="fas fa-info-circle"></i> Email Already Exist</div>'
                    );
                    $('#sign12').attr('disabled', 'disabled');
                } else if (response == "not exist") {
                    $("#msg21").html('');
                    $('#sign12').removeAttr('disabled');
                } else {
                    // console.log("else : ",response);
                }
            }
        });
    });



    //////////////////////////////////////
    // Confirm password validation on signup page
    //////////////////////////////////////
    $('#reg_form21').submit(function (e) {
        check_cfrmPass();

        if (check_cfrmPass() === true) {
            return;
        } else {
            e.preventDefault();
        }
    });
    // validate confirm password function
    function check_cfrmPass() {
        var cfrm_border = $('#cfrm_border');
        var pass1 = $("#org_pass");
        var pass2 = $("#cfrm_pass");
        var pass1_val = pass1.val();
        var pass2_val = pass2.val();

        if (pass2_val != pass1_val) {
            $("#pass_msg").html(
                '<div class="alert alert-warning"><i class="fas fa-info-circle"></i> Password & Confirm Password should be same</div>'
            );
            cfrm_border.css({
                "border": "1px solid red",
                "border-radius": "5px"
            });
            return false;
        } else {
            $("#pass_msg").html('');
            cfrm_border.css({
                "border": "none"
            });
            return true;
        }
    }











    //////////////////////////////////////
    //will work on form validation at the end
    //////////////////////////////////////
    $('#search_cargo_form').submit(function (e) {
        // e.preventDefault();
        var flag = true;
        var ids = ["cargo_type_id", "loading_region_id", "loading_country_id", "loading_port_id", "discharge_region_id", "discharge_country_id", "discharge_port_id"];

        for (var i = 0; i < ids.length; i++) {
            check_dropdowns(ids[i]);
        }

        for (var i = 0; i < ids.length; i++) {
            if (check_dropdowns(ids[i]) == false) {
                flag = false;
                break;
            }
        }

        if (flag === true) {
            return;
        } else {
            alert('Please fill out all input fields to proceed.');
            e.preventDefault();
        }
    });




    //////////////////////////////////////
    //will work on form validation at the end
    //////////////////////////////////////
    $('#search_cvs_form_removed').submit(function (e) {

        var flag = true;
        var ids = ["laycan_date", "loading_region_id", "loading_country_id", "loading_port_id_1", "loading_port_id_2", "discharge_region_id", "discharge_country_id", "discharge_port_id_1", "discharge_port_id_2"];

        for (var i = 0; i < ids.length; i++) {
            check_dropdowns(ids[i]);
        }

        for (var i = 0; i < ids.length; i++) {
            if (check_dropdowns(ids[i]) == false) {
                flag = false;
                break;
            }
        }

        if (flag === true) {
            return;
        } else {
            e.preventDefault();
        }
    });


    $('.datepicker').datepicker({
        autoclose: true,
    });



});// jquery end



function check_dropdowns(id) {
    var dd_type = $("#" + id);
    var dd_type_val = dd_type.val();

    if (dd_type_val.length < 1) {
        // dd_type.parent().css({ "border": "2px solid red" });
        dd_type.focus();
        return false;
    } else {
        return true;
    }
} //end of function


function check_eqp_req() {
    var eqp_req = $("input[name='loading_discharge_equipment_req[]']:checked").map(function () { return $(this).val(); }).get();

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