@extends('front/layout/layout')

@section('page_title','Home Page')


@section('container')

<style>
.paddings {
    padding-top: 90px;
    padding-bottom: 90px;
}

.blog_bg {
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
    url("{{asset('front_asset/images/banner-img.jpg')}}");
    background-attachment: fixed;
    width: 100%;
    height: auto;
    background-repeat: no-repeat;
    background-size: cover !important;
    padding: 8% 2px;
}
</style>

<div class="jumbotron jumbotron-fluid bg1 blog_bg border-0">
    <div class="container paddings text-left">
        <p class="size54 text-white text-left b6 m-0" style="line-height: 1.3;"><span class="cl_bd b6">MANAGE LOADS <br>
            </span>DRIVE PROFITS</p>
        <a href={{route('login')}} class="btn btn-primary text-white b8  pl-5 pr-5 pt-4 pb-4 mt-5 btn-lg text-center"
            style="border-radius: 38px;">Sign Up Now
        </a>
    </div>
</div>


<div class="m-5">
    <h1>Home Page</h1>
    <p class="text-justify">

        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sagittis augue non ex accumsan lobortis. Morbi a
        tortor aliquet, sollicitudin urna nec, fringilla lorem. Aliquam erat volutpat. Ut rutrum risus tellus. Proin
        gravida volutpat accumsan. Praesent ultricies finibus sodales. Mauris sed ex a neque tristique aliquam. Morbi
        dolor ipsum, ultricies ut fringilla sed, cursus eget urna.

        Donec sagittis id magna vitae laoreet. Proin ut mi eu nisi aliquam lacinia in feugiat lacus. Mauris tempor ut
        arcu at bibendum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu hendrerit odio. Nunc ultrices
        velit tortor, at ultricies diam tincidunt et. Cras faucibus diam vel ex eleifend, in mollis ex consectetur.
        Mauris eget imperdiet velit, suscipit vehicula ante. In hac habitasse platea dictumst. Ut tempor tellus nibh,
        quis luctus purus molestie vel. Duis euismod mauris ac laoreet eleifend. Curabitur semper orci posuere ante
        aliquet, sit amet semper sem vestibulum. Sed consectetur odio eu leo ultrices, ac elementum lectus pretium. Cras
        sed sollicitudin nibh, quis molestie quam. Pellentesque id massa nec lorem dignissim varius id in turpis.
        Phasellus massa metus, eleifend bibendum fringilla ullamcorper, dictum molestie neque.

        Quisque purus mauris, feugiat quis magna eleifend, rhoncus scelerisque augue. Cras volutpat nisi mauris, ac
        euismod urna consequat sit amet. Mauris vitae faucibus orci. Nullam laoreet placerat elit sed suscipit. Nulla
        nec viverra neque, et tristique orci. Suspendisse ac fringilla metus, et ullamcorper lacus. Quisque ac molestie
        magna. Nullam rhoncus pretium est, consectetur vulputate tellus eleifend nec.
    </p>
    <p class="text-justify">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sagittis augue non ex accumsan lobortis. Morbi a
        tortor aliquet, sollicitudin urna nec, fringilla lorem. Aliquam erat volutpat. Ut rutrum risus tellus. Proin
        gravida volutpat accumsan. Praesent ultricies finibus sodales. Mauris sed ex a neque tristique aliquam. Morbi
        dolor ipsum, ultricies ut fringilla sed, cursus eget urna.

        Donec sagittis id magna vitae laoreet. Proin ut mi eu nisi aliquam lacinia in feugiat lacus. Mauris tempor ut
        arcu at bibendum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu hendrerit odio. Nunc ultrices
        velit tortor, at ultricies diam tincidunt et. Cras faucibus diam vel ex eleifend, in mollis ex consectetur.
        Mauris eget imperdiet velit, suscipit vehicula ante. In hac habitasse platea dictumst. Ut tempor tellus nibh,
        quis luctus purus molestie vel. Duis euismod mauris ac laoreet eleifend. Curabitur semper orci posuere ante
        aliquet, sit amet semper sem vestibulum. Sed consectetur odio eu leo ultrices, ac elementum lectus pretium. Cras
        sed sollicitudin nibh, quis molestie quam. Pellentesque id massa nec lorem dignissim varius id in turpis.
        Phasellus massa metus, eleifend bibendum fringilla ullamcorper, dictum molestie neque.

        Quisque purus mauris, feugiat quis magna eleifend, rhoncus scelerisque augue. Cras volutpat nisi mauris, ac
        euismod urna consequat sit amet. Mauris vitae faucibus orci. Nullam laoreet placerat elit sed suscipit. Nulla
        nec viverra neque, et tristique orci. Suspendisse ac fringilla metus, et ullamcorper lacus. Quisque ac molestie
        magna. Nullam rhoncus pretium est, consectetur vulputate tellus eleifend nec.
    </p>
</div>

@endsection