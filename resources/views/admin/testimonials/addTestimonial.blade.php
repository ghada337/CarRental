@extends('admin.layouts.pages')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Testimonials</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 form-group pull-right top_search">
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
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Testimonial</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="#">Settings 1</a></li>
                                    <li><a class="dropdown-item" href="#">Settings 2</a></li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="name" name="name" required="required" class="form-control" value="{{ old('name') }}">
                                    @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="position">Position <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="position" name="position" required="required" class="form-control" value="{{ old('position') }}">
                                    @error('position') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea id="content" name="content" required="required" class="form-control" rows="3">{{ old('content') }}</textarea>
                                    @error('content') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="published">Published</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="checkbox" name="published" class="flat" {{ old('published') ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="file" id="image" name="image" required="required" class="form-control">
                                    @error('image') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button type="submit" class="btn btn-success">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection
@section('title', 'Add Testimonials')

