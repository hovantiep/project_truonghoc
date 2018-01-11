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
        <li class="breadcrumb-item active">Create</li>
    </ol>
    <div class="row">
        <div class="col-12">
            <h1>Create</h1>
            {{--Displaying The Validation Errors--}}
            @include('backend.partials.validate_errors')
            {{--End Displaying The Validation Errors--}}
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Name</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{!! old('name') !!}" id="example-text-input"
                               name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Parent</label>
                    <div class="col-10">
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option value=0>None</option>
                            @foreach($parentAbles as $parentAble)
                                <option value="{{ $parentAble->id }}" {{ old('parent_id') == $parentAble->id ? 'selected' : '' }}>{{ $parentAble->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="example-number-input" class="col-2 col-form-label">Order</label>
                    <div class="col-10">
                        <input class="form-control" type="number" value="{!! old('order', 1) !!}"
                               id="example-number-input"
                               name="order">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Keywords</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{!! old('keywords') !!}"
                               id="example-url-input" name="keywords">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Description</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{!! old('description') !!}"
                               id="example-url-input" name="description">
                    </div>
                </div>
                <button type="submit" name="action" value="save" class="btn btn-primary offset-2">Save</button>
                <button type="submit" name="action" value="save_and_close" class="btn btn-success">Save &amp; Close
                </button>
                <a href="{{ route('category.index') }}" class="btn btn-danger">Close</a>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
@endsection