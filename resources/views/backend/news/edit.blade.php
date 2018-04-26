@extends('backend.layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('news.index') }}">Post</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <div class="row">
        <div class="col-12">
            <h1>Edit</h1>
            {{--Displaying The Validation Errors--}}
            @include('backend.partials.validate_errors')
            {{--End Displaying The Validation Errors--}}
            <form action="{{ route('news.update',$news->id) }}" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Title</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{!! old('title',$news->title) !!}"
                               id="example-text-input"
                               name="title">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Type</label>
                    <div class="col-10">
                        <select class="form-control custom-select" id="category_id" name="category_id">
                            <option value=0>None</option>
                            @php generateSelect($types, 0,"",old('category_id', $news->category_id)) @endphp
                        </select>
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="example-number-input" class="col-2 col-form-label">Order</label>
                    <div class="col-10">
                        <input class="form-control" type="number" value="{!! old('order', $news->order) !!}"
                               id="example-number-input"
                               name="order">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Intro</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{!! old('intro', $news->intro) !!}"
                               id="example-url-input" name="intro">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Keywords</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{!! old('keywords', $news->keywords) !!}"
                               id="example-url-input" name="keywords">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                            <input type="checkbox" class="custom-control-input"
                                   {!! old('highlights', $news->highlights) == true ? 'checked' : '' !!} name="highlights">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">This is highlights news</span>
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputFile" class="col-2">Image</label>
                    <input type="file" accept="image/*" class="form-control-file col-10" id="exampleInputFile"
                           aria-describedby="fileHelp" name="image">
                    <small id="fileHelp" class="form-text text-muted col-10 offset-2">This is some placeholder
                        block-level help text for the above input. It's a bit lighter and easily wraps to a new line.
                    </small>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Content</label>
                    <div class="col-10">
                        <textarea class="form-control" id="content"
                                  name="content"
                                  rows="5">{!! old('content', $news->content) !!}
                        </textarea>
                    </div>
                </div>
                {{--Khong dung nhieu submit action vi xung dot vs editor--}}
                <button type="submit" name="action" value="save_and_close" class="btn btn-success offset-2">Save &amp;
                    Close
                </button>
                <a href="{{ route('news.show',$news->id) }}" class="btn btn-info">Show</a>
                <a href="{{ route('news.index') }}" class="btn btn-danger">Close</a>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT"/>
            </form>
        </div>
    </div>
    <script type="text/javascript"
            src="{{ asset('public/backend/vendor/textboxio/textboxio.js') }}">
    </script>
    <script>
        // Create a Textbox.io Editor for the matched element(s)
        var textareaEditor = textboxio.replace('#content');
    </script>
@endsection