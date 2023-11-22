@extends('admin.layouts.app_master_admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-5" style="display: flex;justify-content: space-between"><span>Danh sách</span> <a href="{{ route('get_admin.role.create') }}" style="font-size: 16px;">Thêm mới</a></h2>
        <div class="">
            <form action="" class="row">
                <div class="col-sm-3">
                    <input type="text" placeholder="Name" value="{{ Request::get('n') }}" name="n" class="form-control">
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">Find</button>
                </div>
            </form>
        </div>
        <h1 class="mt-4"></h1>
        
       
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable 
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="datatable-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Ngày tạo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles ?? [] as $item)
                            <tr>
                                <td scope="row">{{ $item->id }}</td>
                                <td scope="row">{{ $item->name }}</td>
                                <td scope="row">{{ $item->created_at }}</td>
                                <td scope="row">
                                    <a href="{{ route('get_admin.role.update', $item->id) }}" class="text-blue"><button type="button" class="btn btn-primary">Edit</button></a>
                                    <a href="{{ route('get_admin.role.delete', $item->id) }}" class="text-danger"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $roles->appends($query ?? [])->links('vendor.pagination.simple-bootstrap-4') !!}
            </div>
        </div>
    </div>
</main>
   
    
    
    
@stop
