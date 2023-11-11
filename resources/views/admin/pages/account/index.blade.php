@extends('admin.layouts.app_master_admin')
@section('content')
    <h2 class="mt-5" style="display: flex;justify-content: space-between"><span>Danh sách</span> <a href="{{ route('get_admin.account.create') }}" style="font-size: 16px;">Thêm mới</a></h2>
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
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($admins ?? [] as $item)
                <tr>
                    <td scope="row">{{ $item->id }}</td>
                    <td scope="row">{{ $item->name }}</td>
                    <td scope="row">{{ $item->email }}</td>
                    <td scope="row">{{ $item->phone }}</td>
                    <td scope="row">
                        @if ($item->status == 1)
                            <span class="text-danger">Hiển thị</span>
                        @else
                            <span class="text-pink">Ẩn</span>
                        @endif
                    </td>
                    <td scope="row">{{ $item->created_at }}</td>
                    <td scope="row">
                        <a href="{{ route('get_admin.account.update', $item->id) }}" class="text-blue">Edit</a>
                        <a href="{{ route('get_admin.account.delete', $item->id) }}" class="text-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $admins->appends($query ?? [])->links('vendor.pagination.simple-bootstrap-4') !!}
@stop