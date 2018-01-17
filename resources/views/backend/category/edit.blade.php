@extends('backend.layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a>
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
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Name</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{!! old('name', $category->name) !!}"
                               id="example-text-input"
                               name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Parent</label>
                    <div class="col-10">
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option value=0>None</option>
                            {{--Luu gia tri cu khi validate va de gia tri mac dinh chinh xac--}}
                            @foreach($parentAbles as $parentAble)
                                <option value="{{ $parentAble->id }}" {{ old('parent_id', $category->parent_id) == $parentAble->id ? 'selected' : '' }}>{{ $parentAble->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="example-number-input" class="col-2 col-form-label">Order</label>
                    <div class="col-10">
                        <input class="form-control" type="number" value="{!! old('order', $category->order) !!}"
                               id="example-number-input"
                               name="order">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Route name</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{!! old('strAttr',$category->strAttr) !!}"
                               id="example-url-input" name="strAttr">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Keywords</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{!! old('keywords',$category->keywords) !!}"
                               id="example-url-input" name="keywords">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Description</label>
                    <div class="col-10">
                        <input class="form-control" type="text"
                               value="{!! old('description',$category->description) !!}"
                               id="example-url-input" name="description">
                    </div>
                </div>
                <button type="submit" name="action" value="save_and_close" class="btn btn-success offset-2">Save &amp;
                    Close
                </button>
                <button type="submit" name="action" value="save_and_show" class="btn btn-primary">Save &amp;
                    Show
                </button>
                <a href="{{ route('category.show',$category->id) }}" class="btn btn-info">Show</a>
                <a href="{{ route('category.index') }}" class="btn btn-danger">Close</a>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT"/>
            </form>
        </div>
    </div>
@endsection