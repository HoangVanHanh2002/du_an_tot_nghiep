@extends('admin.layouts.app_master_admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-3" style="display: flex;justify-content: space-between"><span>Danh sách bài viết</span> <a href="{{ route('get_admin.article.create') }}" style="font-size: 16px;">Thêm mới</a></h2>
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
                            <th style="width: 20px;">#</th>
                            <th style="width: 80px;">Avatar</th>
                            <th style="width: 65%;">Thông tin</th>
                            <th style="width: 200px">Ngày tạo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles ?? [] as $item)
                            <tr>
                                <td scope="row">{{ $item->id }}</td>
                                <td scope="row">
                                    <img src="{{ pare_url_file($item->avatar) }}" alt="" style="display: block;width: 100px;height: auto;object-fit: cover;">
                                </td>
                                <td scope="row">
                                    <h5>{{ $item->name }}</h5>
                                    <p>{{ $item->description }}</p>
                                </td>
                                <td scope="row">{{ $item->created_at }}</td>
                                <td scope="row">
                                    <a href="{{ route('get_admin.article.update', $item->id) }}" class="text-blue"><button type="button" class="btn btn-primary">Edit</button></a>
                                    <p></p>
                                    <a href="{{ route('get_admin.article.delete', $item->id) }}" class="text-danger"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
    
    
    
@stop
