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
                    <a href="{{ route('category.create') }}" class="btn btn-success">Create</a>
                </div>
            </div>
            <div class="table-responsive" id="dataTables-example">
                <table class="table table-bordered" id="dataTable" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Order</th>
                        <th>Parent</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Order</th>
                        <th>Parent</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td {{ ($category->parent_id == 0) ? "class=text-primary" : "" }}>{{ $category->name }}</td>
                            <td class="text-center">{{ $category->order }}</td>
                            <td>
                                @if($category->parent_id == 0)
                                    {{ "None" }}
                                @else
                                    {{ DB::table('categories')
                                    ->select('name')
                                    ->where('id',$category->parent_id)
                                    ->first()
                                    ->name }}
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('category.show',$category->id) }}"
                                   class="btn btn-sm btn-info">Show</a>
                                <a href="{{ route('category.edit',$category->id) }}"
                                   class="btn btn-sm btn-warning">Edit</a>
                                <div class="btn btn-sm p-0 m-0">
                                    <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                        <button type="submit" name="action" value="delete"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirmDel('Are you sure delete record ?')">Delete
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