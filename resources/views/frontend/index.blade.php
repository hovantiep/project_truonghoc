@extends('frontend.layouts.master')
@section('description', 'Trang web trường Tiểu học Thủy Đông A, xã Thủy Đông, huyện Thạnh Hóa, tỉnh Long An')
@section('top-content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>First Slide</h3>
                    <p>This is a description for the first slide.</p>
                </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Second Slide</h3>
                    <p>This is a description for the second slide.</p>
                </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Third Slide</h3>
                    <p>This is a description for the third slide.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@stop

@section('left-content')
    <h2 class="ribbon">
        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
        Tin tức</h2>
    <!-- Portfolio Section 1-->
    <div class="row">
        @foreach($news as $article)
            <div class="col-sm-12 portfolio-item">
                <div class="media">
                    <a href="{{ route('news.detail',[$article->categoryAlias,$article->postAlias, $article->id]) }}">
                        {{-- Hinh 200x140 --}}
                        <img class="d-flex mr-3 pt-25 img-responsive img-200x140"
                             src="{{ asset('resources/upload/post/'.$article->image) }}"
                             alt="image">
                    </a>
                    <div class="media-body text-justify">
                        <a href="{{ route('news.detail',[$article->categoryAlias,$article->postAlias, $article->id]) }}">
                            <h5 class="mt-0">{{ $article->title }}</h5>
                        </a>
                        <a href="{{ route('news',[$article->categoryAlias, $article->categoryId]) }}"
                           class="small text-muted">{{ $article->name }}</a><br>
                        {{ $article->intro }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- /.row -->
    <h2 class="ribbon">
        <i class="fa fa-leanpub" aria-hidden="true"></i>
        Nổi bật</h2>
    <!-- Portfolio Section 1-->
    <div class="row">
        @foreach($highlights as $highlight)
            <div class="col-sm-4 portfolio-item">
                <div class="card h-100">
                    <a href="{{ route('news.detail',[$highlight->categoryAlias,$highlight->postAlias, $highlight->id]) }}">
                        {{-- 700 x 400 --}}
                        <img class="card-img-top img-700x400"
                             src="{{ asset('resources/upload/post/'.$highlight->image) }}" alt="image">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('news.detail',[$highlight->categoryAlias,$highlight->postAlias, $highlight->id]) }}">{{ $highlight->title }}</a>
                        </h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet
                            numquam
                            aspernatur eum quasi sapiente nesciunt?</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- /.row -->
    <!-- /.row -->
    <h2 class="ribbon">
        <i class="fa fa-calendar-o" aria-hidden="true"></i>
        Sự kiện</h2>
    <!-- Portfolio Section 1-->
    <div class="row">
        <div class="col-md-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <h4 class="card-header">
                    <a href="#">Project One</a>
                </h4>
                <div class="card-body">
                    <p class="card-text text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit.
                        Amet numquam aspernatur eum quasi sapiente nesciunt?</p>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <h4 class="card-header">
                    <a href="#">Project One</a>
                </h4>
                <div class="card-body">
                    <p class="card-text text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit.
                        Amet numquam aspernatur eum quasi sapiente nesciunt?</p>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <h4 class="card-header">
                    <a href="#">Project One</a>
                </h4>
                <div class="card-body">
                    <p class="card-text text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit.
                        Amet numquam aspernatur eum quasi sapiente nesciunt?</p>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
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
@stop

@section('bottom-content')
    <!-- Features Section -->
    <div class="container">
        <h2 class="ribbon">
            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
            Thành tích tiêu biểu</h2>
        <div class="jumbotron">
            <div class="row">
                <div class="col-lg-6">
                    <p>The Modern Business template by Start Bootstrap includes:</p>
                    <ul>
                        <li>
                            <strong>Bootstrap v4</strong>
                        </li>
                        <li>jQuery</li>
                        <li>Font Awesome</li>
                        <li>Working contact form with validation</li>
                        <li>Unstyled page elements for easy customization</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id
                        reprehenderit,
                        quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum
                        ducimus
                        unde.</p>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <hr>
    <!-- Links Section -->
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-2 text-center">
                <a href="#">
                    <img class="img-thumbnail" src="{{ asset('public/frontend/img/128x128.svg') }}" alt="">
                    <p>Bộ GD&ĐT</p>
                </a>
            </div>
            <div class="col-sm-6 col-md-2 text-center">
                <a href="#">
                    <img class="img-thumbnail" src="{{ asset('public/frontend/img/128x128.svg') }}" alt="">
                    <p>Sở GD&ĐT</p>
                </a>
            </div>
            <div class="col-sm-6 col-md-2 text-center">
                <a href="#">
                    <img class="img-thumbnail" src="{{ asset('public/frontend/img/128x128.svg') }}" alt="">
                    <p>Phòng GD&ĐT</p>
                </a>
            </div>
            <div class="col-sm-6 col-md-2 text-center">
                <a href="#">
                    <img class="img-thumbnail" src="{{ asset('public/frontend/img/128x128.svg') }}" alt="">
                    <p>Violet</p>
                </a>
            </div>
            <div class="col-sm-6 col-md-2 text-center">
                <a href="#">
                    <img class="img-thumbnail" src="{{ asset('public/frontend/img/128x128.svg') }}" alt="">
                    <p>Wikimedia</p>
                </a>
            </div>
            <div class="col-sm-6 col-md-2 text-center">
                <a href="#">
                    <img class="img-thumbnail" src="{{ asset('public/frontend/img/128x128.svg') }}" alt="">
                    <p>Violympic</p>
                </a>
            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection