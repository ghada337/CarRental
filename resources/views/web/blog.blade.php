@extends('web.layouts.pages')
@section('content')
    <div class="hero inner-page" style="background-image: url('{{asset('assets/images/hero_1_a.jpg')}}');">
        <div class="container">
            <div class="row align-items-end ">
                <div class="col-lg-5">

                    <div class="intro">
                        <h1><strong>Blog</strong></h1>
                        <div class="custom-breadcrumbs"><a href="{{route('index')}}">Home</a> <span class="mx-2">/</span>
                            <strong>Blog</strong></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('web.includes.posts')
@endsection
@section('title')
    Blog
@endsection
