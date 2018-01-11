@extends('backend.layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.blade.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Form Page</li>
    </ol>

    <div class="row">
        <div class="col-12">
            <h1>Form show</h1>
            <form action="{{ route('slide.destroy',$slide->id) }}" method="POST">
                <div class="container">
                    <div class="row">
                        <label for="name" class="col-2">Name</label>
                        <div class="col-10">{{ $slide->name }}</div>
                    </div>
                    <div class="row">
                        <label for="order" class="col-2">Order</label>
                        <div class="col-10">{{ $slide->order }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="link" class="col-2">Link</label>
                        <a href="{{ $slide->link }}" class="col-10">{{ $slide->link }}</a>
                    </div>
                    <div class="row mb-2">
                        <div class="offset-md-2">
                            <img src="{{ asset('resources/upload/slide/' . $slide->image) }}" alt="image"
                                 class="img-responsive img-thumbnail">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-2 col-10">
                            <a href="{{ route('slide.index') }}" class="btn btn-info">Close</a>
                            <a href="{{ route('slide.edit',$slide->id) }}" class="btn btn-warning">Edit</a>
                            <button type="submit" name="action" value="delete"
                                    class="btn btn-danger"
                                    onclick="return confirmDel('Are you sure delete record ?')">Delete
                            </button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE"/>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
            </form>
        </div>
    </div>
@endsection