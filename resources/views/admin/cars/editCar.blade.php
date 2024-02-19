@extends('admin.layouts.pages')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Car</h3>
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
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Car Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                        <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="title" name="title" required="required" class="form-control"  value="{{ old('title', $car->title) }}">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea id="content" name="content"  rows = "3" cols="60" placeholder="Enter content" value="{{ old('content', $car->content) }}" required="required" class="form-control">Contents</textarea>
                                    @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="luggage" class="col-form-label col-md-3 col-sm-3 label-align">Luggage <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="luggage" class="form-control" type="number" name="luggage"  value="{{old('luggage', $car->luggage)}}" required="required">
                                    @error('luggage')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="doors" class="col-form-label col-md-3 col-sm-3 label-align">Doors <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="doors" class="form-control" type="number" name="doors" value="{{old('doors', $car->doors) }}" required="required">
                                    @error('doors')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="passengers" class="col-form-label col-md-3 col-sm-3 label-align">Passengers <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="passengers" class="form-control" type="number" name="passengers" value="{{ old('passengers', $car->passengers) }}"  required="required">
                                    @error('passengers')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Price <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="price" class="form-control" type="number" name="price" value="{{old('title', $car->price) }}" required="required">
                                    @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <!-- Active Checkbox -->
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="checkbox" name="active" class="flat" {{ old('active', $car->active) ? 'checked' : '' }}>
                                </div>
                            </div>

                            <!-- Image Upload -->
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="file" id="image" name="image" class="form-control">
                                    @if($car->image)
                                    <img src="{{ asset('storage/' . $car->image) }}" alt="Car Image" style="width: 300px;">
                                    @endif

                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Category Select -->
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="category_id">Category <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="category_id" id="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $car->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button type="submit" class="btn btn-success">Update</button>
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
@section('title', 'Edit Car')
