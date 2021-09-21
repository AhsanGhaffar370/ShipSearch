@extends('front/layout/layout')

@section('page_title',"Sign Up")


@section('container')


<style>

    /* .ser_inp_fields21 {
        position: unset !important;
        width: 100% !important;
        display: none;
    }

    .ser_inp_fields21 button {
        padding: 2px 5px 2px 5px;
        border-radius: 2px;
        font-size: 14px !important;
        font-family: 'Lato', sans-serif;
    }

    .ser_inp_fields21 .inner {
        overflow-x: clip !important;
    }

    .ser_inp_fields21 button {
        padding: 7px 5px !important;
        border-radius: 2px;
        font-size: 14px !important;
        font-family: 'Lato', sans-serif;
    }

    .dropdown-menu li a span {
        font-family: 'Lato', sans-serif;
        font-size: 14px !important;
    }

    .ser_inp_fields21>div.dropdown-menu.show {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
        width: 100% !important;
        min-width: auto !important;
        border-radius: 0px 0px 7px 7px !important;
        margin-top: 0px !important;
        box-shadow: none !important;
    }

    .ser_inp_fields21 button:focus {
        box-shadow: none !important;
        outline-offset: -18px !important;
    }

    form div section{
        position: relative !important;
    } */

    label {
        /* color: white; */
        font-weight: 400;
        font-size: 15px;
        margin-bottom: 5px !important;
    }

    input, select{
        font-size: 14px !important;
    }

</style>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">

        <div class="col-12 col-lg-8">
            <div class="animate form login_form bg-white shadow-sm rounded-lg border mt-4">
                <p class="bg_gdd text-white size36 text-center b7 m-0 p-3">
                    Register
                </p>
                <form method="post" action={{route('signup_req')}} id="reg_form21" class="p-4">
                    @csrf
                    

                    {{-- Personal Details --}}
                    <h4 class="m-0 pt-3 pl-1">Personal Details</h4>
                    <hr class="mt-2 mb-3 p-0">
                    <div class="p-0 mt-2">
                        <div class="row m-0">
                            <div class="col-6 p-1">
                                <label for="first_name" class="size14 mb-1">First Name</label>
                                <input type="text" name="first_name" class="form-control" required />
                            </div>
                            <div class="col-6 p-1"> 
                                <label for="last_name" class="size14 mb-1">Last Name</label>
                                <input type="text" name="last_name" class="form-control" required />
                            </div>
                        </div>
                    </div>
                    <div class="p-1 mt-2">
                        <label for="phone" class="size14 mb-1">Phone Number</label>
                        <input type="tel" name="phone" id="phone" class="form-control" required />
                    </div>
                    <div class="p-1 mt-2">
                        <label for="mobile" class="size14 mb-1">Mobile Number</label>
                        <input type="tel" name="mobile" id="mobile" class="form-control" required />
                    </div>
                    <div class="p-1 mt-2">
                        <label for="date_of_birth" class="size14 mb-1">Date of Birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required />
                    </div>
                    <div class="p-1 mt-2">
                        <label for="job_title" class="size14 mb-1">Job Title</label>
                        <input type="text" name="job_title" id="job_title" class="form-control" required />
                    </div>
                    <div class="p-1 mt-2">
                        <label for="post_number" class="size14 mb-1">Post Number</label>
                        <input type="text" name="post_number" id="post_number" class="form-control" required />
                    </div>
                    <div class="p-1 mt-2">
                        <label for="" class="size14 mb-1">Country</label>
                        <select name="country_id" id="country_id" class="form-control" 
                            {{-- onmousedown="if(this.options.length>8){this.size=8;}"  
                            onchange='this.size=0;' 
                            onblur="this.size=0;" --}}
                            >
                            <option value="-1" disabled selected>Choose</option>
                            @foreach ($country as $row)
                                <option value="{{ $row->country_id }}">{{ $row->country_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="p-1 mt-2">
                        <label for="" class="size14 mb-1">State</label>
                        <select name="state_id" id="state_id" class="form-control">
                            <option value="-1" disabled selected>Choose</option>
                            @foreach ($state as $row)
                                <option value="{{ $row->state_id }}">{{ $row->state_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="p-1 mt-2">
                        <label for="" class="size14 mb-1">City</label>
                        <select name="city_id" id="city_id" class="form-control">
                            <option value="-1" disabled selected>Choose</option>
                            @foreach ($city as $row)
                                <option value="{{ $row->city_id }}">{{ $row->city_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="p-1 mt-2">
                        <label for="zip_code" class="size14 mb-1">Zip Code</label>
                        <input type="text" name="zip_code" id="zip_code" class="form-control" required />
                    </div>
                    <div class="p-1 mt-2">
                        <label for="permanent_address" class="size14 mb-1">Permanent Address</label>
                        <input type="text" name="permanent_address" id="permanent_address" class="form-control" required />
                    </div>
                    <div class="p-1 mt-2">
                        <label for="temporary_address" class="size14 mb-1">Temporary Address</label>
                        <input type="text" name="temporary_address" id="temporary_address" class="form-control" required />
                    </div>
                    <div class="p-1 mt-2">
                        <label for="mail_address" class="size14 mb-1">Mail Address</label>
                        <input type="text" name="mail_address" id="mail_address" class="form-control" required />
                    </div>
                    <div class="p-1 mt-2">
                        <label for="fax" class="size14 mb-1">Fax</label>
                        <input type="text" name="fax" id="fax" class="form-control" required />
                    </div>
                    <div class="p-1 mt-2">
                        <label for="description" class="size14 mb-1">Description</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="3" maxlength = "250"></textarea>
                    </div>




                    {{-- Login Details --}}
                    <h4 class="m-0 pt-5 pl-1">Company Details</h4>
                    <hr class="mt-2 mb-3 p-0">
                    
                    <div class="p-1 mt-2">
                        <label for="company_name" class="size14 mb-1">Company Nmae</label>
                        <input type="text" name="company_name" id="company_name" class="form-control" required />
                    </div> 
                    <div class="p-1 mt-2">
                        <label for="company_email" class="size14 mb-1">Company Email</label>
                        <input type="email" name="company_email" id="company_email" class="form-control" required />
                    </div>
                    <div class="p-0 mt-2">
                        <div class="row m-0">
                            <div class="col-6 p-1">
                                <label for="contact_person_first_name" class="size14 mb-1">Contact Person First Name</label>
                                <input type="text" name="contact_person_first_name" class="form-control" required />
                            </div>
                            <div class="col-6 p-1"> 
                                <label for="contact_person_last_name" class="size14 mb-1">Contact Person Last Name</label>
                                <input type="text" name="contact_person_last_name" class="form-control" required />
                            </div>
                        </div>
                    </div>
                    <div class="p-1 mt-2">
                        <label for="company_phone" class="size14 mb-1">Company Phone Number</label>
                        <input type="tel" name="company_phone" id="company_phone" class="form-control" required />
                    </div>
                   
                    <div class="p-1 mt-2">
                        <label for="" class="size14 mb-1">Region</label>
                        <select name="company_region_id" id="company_region_id" class="form-control">
                            <option value="-1" disabled selected>Choose</option>
                            @foreach ($region as $row)
                                <option value="{{ $row->region_id }}">{{ $row->region_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="p-1 mt-2">
                        <label for="" class="size14 mb-1">Country</label>
                        <select name="company_country_id" id="company_country_id" class="form-control">
                            <option value="-1" disabled selected>Choose</option>
                            @foreach ($country as $row)
                                <option value="{{ $row->country_id }}">{{ $row->country_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="p-1 mt-2">
                        <label for="" class="size14 mb-1">Port</label>
                        <select name="company_port_id" id="company_port_id" class="form-control">
                            <option value="-1" disabled selected>Choose</option>
                            @foreach ($port as $row)
                                <option value="{{ $row->port_id }}">{{ $row->port_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="p-1 mt-2">
                        <label for="bussiness_address" class="size14 mb-1">business Address</label>
                        <input type="text" name="bussiness_address" id="bussiness_address" class="form-control" required />
                    </div>
                    <div class="p-1 mt-2">
                        <label for="company_fax" class="size14 mb-1">Comapany Fax</label>
                        <input type="text" name="company_fax" id="company_fax" class="form-control" required />
                    </div>
                    <div class="p-1 mt-2">
                        <label for="company_website" class="size14 mb-1">Comapany Website</label>
                        <input type="text" name="company_website" id="company_website" class="form-control" required />
                    </div>




                    {{-- Login Details --}}
                    <h4 class="m-0 pt-5 pl-1">Membership Details</h4>
                    <hr class="mt-2 mb-3 p-0">

                    <div class="p-1 mt-2">
                        <label for="member_type" class="size14 mb-1">Select Plan</label>
                        <select name="member_type_id" id="member_type_id" class="form-control member_type ">
                            <option value="-1" disabled selected>Choose</option>
                            @foreach ($member_type as $row)
                                <option value="{{ $row->user_member_type_id }}">{{ $row->member_type }}</option>
                            @endforeach
                            {{-- <option value="1">Monthly</option>
                            <option value="2">Yearly</option>
                            <option value="3">Free</option> --}}
                        </select>
                    </div>




                    {{-- Login Details --}}
                    <h4 class="m-0 pt-5 pl-1">Login Details</h4>
                    <hr class="mt-2 mb-3 p-0">

                    {{-- Error Msg --}}
                    <span id="msg21" class="size11"></span>
                    <span id="pass_msg" class="size11"></span>

                    <div class="p-1 mt-2">
                        <label for="email" class="size14 mb-1">Login Email</label>
                        <input type="email" name="email" id="email31" class="form-control" required />
                    </div>
                    <div class="p-1 mt-2">
                        <label for="org_pass" class="size14 mb-1">Password</label>
                        <input type="password" name="pass" id="org_pass" class="form-control" required />
                    </div>
                    <div class="p-1 mt-2">
                        <label for="cfrm_pass" class="size14 mb-1">Confirm Password</label>
                        <input type="password" name="c_pass" id="cfrm_pass" class="form-control" required />
                    </div>

                    
                    <div class="text-center d-flex justify-content-center mt-5">
                        <input type="submit" id="sign12" class="btn btn-info bg_gd submit m-0 pl-4 pr-4" value="Register"
                            name="register">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection