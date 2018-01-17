<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Modern Business - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('public/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('public/frontend/css/modern-business.css') }}" rel="stylesheet">
    <!-- My styles for this template -->
    <link href="{{ asset('public/frontend/css/my.css') }}" rel="stylesheet">
    {{--Font awesome--}}
    <link href="{{asset('public/frontend/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
</head>
<body>
<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <!-- <div class="container"> -->
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fa fa-home" aria-hidden="true"></i>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav navbar-nav ml-auto">
                {{-- Sinh tu dong --}}
                <?php
                $level_0 = DB::table('categories')->where('parent_id', 0)->orderBy('order')->get();
                ?>
                @foreach($level_0 as $item_0)
                    <?php
                    $level_1 = DB::table('categories')->where('parent_id', $item_0->id)->orderBy('order')->get();
                    ?>
                    @if(!empty($level_1->toArray()))
                        {{-- Co sub menu --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropdown-toggle" href="#"
                               id="navbarDropdown{{ $item_0->id }}"
                               data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                {{ $item_0->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-left"
                                 aria-labelledby="navbarDropdown{{ $item_0->id }}">
                                @foreach($level_1 as $item_1)
                                    <a class="dropdown-item"
                                       {{-- Neu co route name thi sinh route, khong co thi sinh # --}}
                                       href="{{ $item_1->strAttr != '' ? route($item_1->strAttr, [$item_1->alias, $item_1->id]) : '#' }}">{{ $item_1->name }}</a>
                                @endforeach
                            </div>
                        </li>
                    @else
                        {{-- Khong sub menu --}}
                        <li class="nav-item">
                            {{--<a class="nav-link" href="{{ asset('/static/'. $item_0->alias) }}">{{ $item_0->name }}</a>--}}
                            <a class="nav-link" href="{{ $item_0->strAttr != '' ? route($item_0->strAttr) : route('static', $item_0->alias) }}">{{ $item_0->name }}</a>
                        </li>
                    @endif
                @endforeach
                {{-- Ket thuc sinh --}}
            </ul>
        </div>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2 ctrl-small" type="text" placeholder="Tìm kiếm...">
            <button class="btn btn-outline-primary my-2 my-sm-0 btn-small" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>
    </div>
    <!-- </div> -->
</nav>

@yield('content')

<!-- Footer -->
<button onclick="javascript:void(0);" id="toTop" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i>
</button>
<footer class="py-5 bg-dark">
    <div class="container text-center text-light small">
        <p>
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam eos enim voluptatum.</p>
        <p>
            <i class="fa fa-phone" aria-hidden="true"></i>
            024 .6287.2079 - 024.2241.0795</p>
        <p>
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
            c1dllequydon-ntl@hanoiedu.vn.</p>
        <p class="m-0 text-center text-info">Copyright &copy; Edit by herotiep 2017</p>

    </div>
    <!-- /.container -->
</footer>
<!-- Bootstrap core JavaScript -->
<script src="{{ asset('public/frontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/my.js') }}"></script>
</body>
</html>