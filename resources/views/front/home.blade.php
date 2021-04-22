@extends('front/layout/layout')

@section('page_title','Home Page')


@section('container')

@foreach($data as $list)
<div class="post-preview">
    <a href="post/{{$list->slug}}">
    <h2 class="post-title">
        {{$list->title}}
    </h2>
    <h3 class="post-subtitle">
    {{$list->short_desc}}
    </h3>
    </a>
    <p class="post-meta">Posted on {{date("M d, Y", strtotime($list->post_date)) }}</p>
</div>
<hr>

@endforeach
<!-- Pager -->
<div class="clearfix">
    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
</div>

@endsection
