<script src="{{asset('public/backend/vendor/toastr/js/toastr.min.js')}}"></script>
<link href="{{asset('public/backend/vendor/toastr/css/toastr.css')}}" rel="stylesheet">
<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @php
            session()->forget('success');
        @endphp
    @endif

    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
        @php
            session()->forget('info');
        @endphp
    @endif

    @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
        @php
            session()->forget('warning');
        @endphp
    @endif

    @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
        @php
            session()->forget('error');
        @endphp
    @endif
</script>