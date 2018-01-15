@extends('backend.layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('slide.index') }}">Slide</a>
        </li>
        <li class="breadcrumb-item active">Index</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Index
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-1 offset-md-10 col-sm-12">
                    <a href="{{ route('slide.create') }}" class="btn btn-success">Create</a>
                </div>
            </div>
            <div class="table-responsive" id="dataTables-example">
                <table class="table table-bordered" id="dataTable" cellspacing="0">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Order</th>
                        <th>Image</th>
                        <th>Link</th>
                        <th width="90px">Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Order</th>
                        <th>Image</th>
                        <th>Link</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($slides as $slide)
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td>{{ $slide->name }}</td>
                            <td class="text-center">{{ $slide->order }}</td>
                            <td>
                                <img src="{!! asset('resources/upload/slide/' . $slide->image) !!}" alt=""
                                     class="img-responsive text-center size-image-2">
                            </td>
                            <td>{{ $slide->link }}</td>
                            <td class="text-center">
                                <a href="{{ route('slide.show',$slide->id) }}" class="btn btn-sm btn-info"><i
                                            class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="{{ route('slide.edit',$slide->id) }}" class="btn btn-sm btn-warning"><i
                                            class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></a>
                                <div class="btn btn-sm p-0 m-0">
                                    <form action="{{ route('slide.destroy',$slide->id) }}" method="POST">
                                        <button style="width: 30px;height: 29px;" type="submit" name="action"
                                                value="delete"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirmDel('Are you sure delete record ?')"><i
                                                    class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="DELETE"/>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
@endsection