@extends('backend.layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('post.index') }}">Post</a>
        </li>
        <li class="breadcrumb-item active">Show</li>
    </ol>
    <div class="row">
        <div class="col-12">
            <h1>Show</h1>
            <form action="{{ route('post.destroy',$post->id) }}" method="POST">
                <div class="container">
                    <div class="row">
                        <label for="name" class="col-2">Title</label>
                        <div class="col-10">{{ $post->title }}</div>
                    </div>
                    <div class="row">
                        <label for="order" class="col-2">Type</label>
                        <div class="col-10">{{ $post->category->name }}</div>
                    </div>
                    <div class="row">
                        <label for="order" class="col-2">Order</label>
                        <div class="col-10">{{ $post->order }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="order" class="col-2">Intro</label>
                        <div class="col-10">{{ $post->intro }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="order" class="col-2">Keywords</label>
                        <div class="col-10">{{ $post->keywords }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="keywords" class="col-2">Views</label>
                        <div class="col-10">{{ $post->views }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="keywords" class="col-2">Highlights</label>
                        <div class="col-10">{{ ($post->highlights == true)?'Yes':'No' }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="order" class="col-2">Image</label>
                        <div class="col-10"><img src="{{ asset('resources/upload/post/'.$post->image) }}"
                                                 alt="image" class="img-responsive img-thumbnail size-image-8"></div>
                    </div>
                    <div class="row">
                        <label for="keywords" class="col-10">Content</label>
                        <div class="col-12 content-view">{!!$post->content  !!}</div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-2 col-10">
                            <a href="{{ route('post.index') }}" class="btn btn-info">Close</a>
                            <a href="{{ route('post.edit',$post->id) }}" class="btn btn-warning">Edit</a>
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