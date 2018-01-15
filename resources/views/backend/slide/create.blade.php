@extends('backend.layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('slide.index') }}">Slide</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
    <div class="row">
        <div class="col-12">
            <h1>Create</h1>
            {{--Displaying The Validation Errors--}}
            @include('backend.partials.validate_errors')
            {{--End Displaying The Validation Errors--}}
            <form action="{{ route('slide.store') }}" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Name</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{!! old('name') !!}" id="example-text-input"
                               name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-number-input" class="col-2 col-form-label">Order</label>
                    <div class="col-10">
                        <input class="form-control" type="number" value="{!! old('order', 1) !!}" id="example-number-input" name="order">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputFile" class="col-2">Image</label>
                    <input type="file" accept="image/*" class="form-control-file col-10" id="exampleInputFile"
                           aria-describedby="fileHelp" name="image">
                    <small id="fileHelp" class="form-text text-muted col-10 offset-2">This is some placeholder
                        block-level help text for the above input. It's a bit lighter and easily wraps to a new line.
                    </small>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Link</label>
                    <div class="col-10">
                        <input class="form-control" type="url" value="{!! old('link',asset('/')) !!}"
                               id="example-url-input" name="link">
                    </div>
                </div>
                <button type="submit" name="action" value="save" class="btn btn-primary offset-2">Save</button>
                <button type="submit" name="action" value="save_and_close" class="btn btn-success">Save &amp; Close</button>
                <a href="{{ route('slide.index') }}" class="btn btn-danger">Close</a>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
@endsection