@extends('admin.layouts.pages')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Users</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit User</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="#">Settings 1</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />

                        <form method="POST" action="{{ route('admin.users.update',[$user->id]) }}">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">full name
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control  @error('FullName') is-invalid @enderror"
                                        required="" name="fullname" value="{{$user->fullname}}" required
                                        autocomplete="FullName" autofocus />
                                    @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="user-name">Username
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        required="" name="username" value="{{ $user->username }}" required
                                        autocomplete="username" autofocus />
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">email <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $user->email }}" required autocomplete="email" />

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
                                <div class="checkbox">
                                    <label>
                                        <div class="icheckbox_flat-green" style="position: relative;"><input
                                                name="Active" type="checkbox" @checked($user->Active) class="flat"
                                            style="position: absolute; opacity: 0;"><ins class="iCheck-helper"
                                                style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password"
                                        value="{{$user->password}}" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="{{route('Admin.User.List')}}"> <button class="btn btn-primary"
                                            type="button">Cancel</button></a>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>

                    @endsection

                    @section('title')
                    editUser
                    @endsection
