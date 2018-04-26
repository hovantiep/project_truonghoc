@extends('frontend.layouts.master')
@section('top-content')
    <!-- Page Content -->
    <h1 class="mt-4 mb-3">{{ $category->name }} </h1>
    <!-- Page Heading/Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">{{ $parent->name }}</li>
    </ol>
@stop
@section('left-content')
    <!-- Post Content Column -->
    <!-- Date/Time -->
    <p class="text-right text-muted">Posted on January 1, 2017 at 12:00 PM</p>
    <!-- Post Content -->
    {!! $news->content !!}
    <hr>
    <!-- Comments Form -->
    <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!-- Comment with nested comments -->
    <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
            purus odio, vestibulum in
            vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
            lacinia
            congue felis in faucibus.
            <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                    sollicitudin. Cras purus odio, vestibulum in
                    vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla.
                    Donec lacinia congue felis in faucibus.
                </div>
            </div>
        </div>
    </div>
@stop

@section('right-content')
    <!-- Message Widget -->
    <div class="card my-4 mt-0">
        <div class="none-decor ribbon">
            <h5 class="card-header">
                <i class="fa fa-bell-o" aria-hidden="true"></i>
                Thông báo</h5>
        </div>
        <!-- thong bao trong thang -->
        <div class="card-body overflow">
            @foreach( $alerts as $alert)
                <p>
                    <a href="#">{{ $alert->title }}
                        {{-- Neu trong ngay thi hien thi nut new canh bao --}}
                        @if(time() - strtotime($alert->created_at) <= 86400)
                            <span class="badge badge-danger">New</span>@endif
                    </a>
                </p>
            @endforeach
        </div>
    </div>
    <!-- News docunents Widget -->
    <div class="card mb-4">
        <div href="#" class="none-decor ribbon">
            <h5 class="card-header">
                <i class="fa fa-file-text" aria-hidden="true"></i>
                Văn bản mới</h5>
        </div>
        <!-- van ban quan trong -->
        <div class="card-body overflow">
            @foreach( $documents as $document)
                <p>
                    <a href="#">{{ $document->title }}
                        {{-- Neu trong tuan thi hien thi nut new canh bao --}}
                        @if(time() - strtotime($document->created_at) <= 604800)
                            <span class="badge badge-info">New</span>@endif
                    </a>
                </p>
            @endforeach
        </div>
    </div>
    <!-- Most View Widget -->
    <div class="card my-4">
        <div href="" class="none-decor ribbon">
            <h5 class="card-header">
                <i class="fa fa-eye" aria-hidden="true"></i>
                Tin đọc nhiều</h5>
        </div>
        <!-- top 10 -->
        <div class="card-body">
            @foreach( $views as $view)
                <p>
                    <a href="#">{{ $view->title }}
                        <span class="badge badge-warning">{{ $view->views }}</span>
                    </a>
                </p>
            @endforeach
        </div>
    </div>
    <!-- Image Widget -->
    <div class="card my-4">
        <div href="#" class="none-decor ribbon">
            <h5 class="card-header">
                <i class="fa fa-camera" aria-hidden="true"></i>
                Hình ảnh hoạt động</h5>
        </div>
        <div class="card-body text-center">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('public/frontend/img/128x128.svg') }}" alt="">
                        <p>Sinh hoat he...</p>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6">
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('public/frontend/img/128x128.svg') }}" alt="">
                        <p>Sinh hoat he...</p>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6">
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('public/frontend/img/128x128.svg') }}" alt="">
                        <p>Sinh hoat he...</p>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6">
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('public/frontend/img/128x128.svg') }}" alt="">
                        <p>Sinh hoat he...</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Widget -->
    <div class="card my-4">
        <div href="" class="none-decor ribbon">
            <h5 class="card-header">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
                Danh mục</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#">Web Design</a>
                        </li>
                        <li>
                            <a href="#">HTML</a>
                        </li>
                        <li>
                            <a href="#">Freebies</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#">JavaScript</a>
                        </li>
                        <li>
                            <a href="#">CSS</a>
                        </li>
                        <li>
                            <a href="#">Tutorials</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection