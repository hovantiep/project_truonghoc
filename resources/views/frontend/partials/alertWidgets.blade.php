@php
    $alerts = \truonghoc\Post::all();
@endphp
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
                <a href="{{ route('page',[$alert->categoryAlias, $alert->categoryId, $alert->id]) }}">{{ $alert->title }}
                    {{-- Neu trong ngay thi hien thi nut new canh bao --}}
                    @if(time() - strtotime($alert->created_at) <= 86400)
                        <span class="badge badge-danger">New</span>@endif
                </a>
            </p>
        @endforeach
    </div>
</div>