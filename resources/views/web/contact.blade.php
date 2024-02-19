@extends('web.layouts.pages')
@section('content')
    <div class="hero inner-page" style="background-image: url('{{asset('assets/images/hero_1_a.jpg')}}');">
        <div class="container">
            <div class="row align-items-end ">
                <div class="col-lg-5">

                    <div class="intro">
                        <h1><strong>Contact</strong></h1>
                        <div class="custom-breadcrumbs"><a href="{{route('index')}}">Home</a> <span
                                class="mx-2">/</span>
                            <strong>Contact</strong></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('web.includes.contactUs')
@endsection
@section('rentNowSection')
@endsection
@section('title')
    ContactUs
@endsection
