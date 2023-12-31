@extends('admin.layouts.app_master_admin')
@section('content')
<main>
    <div class="container-fluid">
        <h2 class="mt-3" style="display: flex;justify-content: space-between"><span>Danh sách nạp tiền</span> <a href="{{ route('get_admin.recharge.create') }}" style="font-size: 16px;">Thêm mới</a></h2>
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
                            <th>Mã giao dịch</th>
                            <th>Hình thức</th>
                            <th>Khách hàng</th>
                            <th>Số tiền</th>
                            <th>Khuyến mãi</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Ghi chú</th>
                            <th>Ngày tạo</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rechargeHistory ?? [] as $item)
                            <tr>
                                <td scope="row">{{ $item->code }}</td>
                                <td>
                                    @if ($item->type == 1)
                                        <span>Chuyển khoản</span>
                                    @elseif($item->type == 2)
                                        <span>Tiền mặt</span>
                                    @elseif($item->type == 3)
                                        <span>Thẻ ATM Internet Banking</span>
                                    @else
                                    @endif
                                </td>
                                <td scope="row">{{ $item->user->name ?? "..." }}</td>
                                <td scope="row">{{ number_format($item->money,0,',','.') }}đ</td>
                                <td scope="row">{{ number_format($item->discount,0,',','.') }}đ</td>
                                <td scope="row"><span class="text-danger text-bold">{{ number_format($item->total_money,0,',','.') }}đ</span></td>
                                <td scope="row"><span class="{{ $item->getStatus($item->status)['class'] }}">{{ $item->getStatus($item->status)['name'] }}</span></td>
                                <td scope="row">
                                    @if ($item->status == \App\Models\RechargeHistory::STATUS_CANCEL)
                                        <span class="text-danger" style="font-size: 13px;">{{ $item->note }}</span>
                                    @endif
                                </td>
                                <td scope="row">{{ $item->created_at }}</td>
                                <td scope="row">
                                    @if ($item->status != \App\Models\RechargeHistory::STATUS_SUCCESS)
                                        <a href="{{ route('get_admin.recharge.update', $item->id) }}" class="text-blue"><button type="button" class="btn btn-primary">Edit</button></a>
                                        
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    
                </table>
                <div>
                    {!! $rechargeHistory->appends($query ?? [])->links('vendor.pagination.bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
</main>
    
    
    
@stop
