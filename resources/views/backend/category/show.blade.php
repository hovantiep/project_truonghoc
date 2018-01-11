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
        <li class="breadcrumb-item active">Show</li>
    </ol>
    <div class="row">
        <div class="col-12">
            <h1>Show</h1>
            <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                <div class="container">
                    <div class="row">
                        <label for="name" class="col-2">Name</label>
                        <div class="col-10">{{ $category->name }}</div>
                    </div>
                    <div class="row">
                        <label for="order" class="col-2">Order</label>
                        <div class="col-10">{{ $category->order }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="parentName" class="col-2">Parent</label>
                        <div class="col-10">{{ $parentName->name }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="keywords" class="col-2">Keywords</label>
                        <div class="col-10">{{ $category->keywords }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="description" class="col-2">Description</label>
                        <div class="col-10">{{ $category->description }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-2 col-10">
                            <a href="{{ route('category.index') }}" class="btn btn-info">Close</a>
                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-warning">Edit</a>
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