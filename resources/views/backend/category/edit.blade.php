@extends('backend.layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('category.index') }}">Category</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <div class="row">
        <div class="col-12">
            <h1>Edit</h1>
            {{--Displaying The Validation Errors--}}
            @include('backend.partials.validate_errors')
            {{--End Displaying The Validation Errors--}}
            <form action="{{ route('slide.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Name</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{!! old('name', $slide->name) !!}"
                               id="example-text-input"
                               name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-number-input" class="col-2 col-form-label">Order</label>
                    <div class="col-10">
                        <input class="form-control" type="number" value="{!! old('order', $slide->order) !!}" id="example-number-input" name="order">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputFile" class="col-2">Image</label>
                    <input type="file" class="form-control-file col-4" id="exampleInputFile"
                           aria-describedby="fileHelp" name="image">
                    <div class="col-sm-4 text-center">
                        <img src="{!! asset('resources/upload/slide/' . $slide->image) !!}" alt="image" class="img-thumbnail img-responsive size-image-8">
                    </div>
                    <small id="fileHelp" class="form-text text-muted col-10 offset-2">This is some placeholder
                        block-level help text for the above input. It's a bit lighter and easily wraps to a new line.
                    </small>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Link</label>
                    <div class="col-10">
                        <input class="form-control" type="url" value="{!! old('link', $slide->link) !!}"
                               id="example-url-input" name="link">
                    </div>
                </div>
                <button type="submit" name="action" value="save_and_close" class="btn btn-success offset-2">Save &amp;
                    Close
                </button>
                <button type="submit" name="action" value="save_and_show" class="btn btn-primary">Save &amp;
                    Show
                </button>
                <a href="{{ route('slide.show',$slide->id) }}" class="btn btn-info">Show</a>
                <a href="{{ route('slide.index') }}" class="btn btn-danger">Close</a>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT"/>
            </form>
        </div>
    </div>
@endsection