@extends('frontend.layouts.master')

@section('top-content')
    <h1 class="mt-4 mb-3">{{ $parent->name }} </h1>
    <!-- Page Heading/Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">{{ $category->name }}</li>
    </ol>
@stop
@section('left-content')
    <!-- Blog Post -->
    @foreach($news as $article)
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <a href="{{ route('news.detail',[$article->categoryAlias,$article->postAlias, $article->id]) }}">
                            {{-- Hinh 700x400 --}}
                            <img class="img-fluid rounded pt-37"
                                 src="{{ asset('resources/upload/post/'.$article->image) }}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-8">
                        <h2 class="card-title">{{ $article->title }}</h2>
                        <p class="card-text">{{ $article->intro }}</p>
                        <a href="{{ route('news.detail',[$article->categoryAlias,$article->postAlias, $article->id]) }}"
                           class="btn btn-danger btn-sm">Chi tiết &rarr;</a>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted small">
                <i class="fa fa-clock-o" aria-hidden="true"></i> January 1, 2017 by {{ $article->user_id }}
            </div>
        </div>
    @endforeach

    <!-- Pagination -->
    @if($news->lastPage() != 1)
        <ul class="pagination justify-content-center mb-4">
            @if($news->currentPage() != 1)
                <li class="page-item">
                    <a class="page-link " href="{!! $news->url($news->currentPage() - 1) !!}">&larr;</a>
                </li>
            @endif
            @for($i = 1; $i <= $news->lastPage(); $i++)
                <li class="page-item {!! ($news->currentPage() == $i) ? 'active' : null !!}">
                    <a class="page-link" href="{{ $news->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            @if($news->currentPage() != $news->lastPage())
                <li class="page-item">
                    <a class="page-link" href="{!! $news->url($news->currentPage() + 1) !!}">&rarr;</a>
                </li>
            @endif
        </ul>
    @endif
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