@extends('backend.layout.master')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title mb-0">Danh sách người dùng</h5>
                    <a href="{{ route('user.create') }}" class="btn btn-danger">Thêm mới</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 10px;">
                                <div class="form-check">
                                    <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                </div>
                            </th>
                            <th data-ordering="false">SR No.</th>
                            <th data-ordering="false">Họ và tên</th>
                            <th data-ordering="false">Email</th>
                            <th data-ordering="false">Số điện thoại</th>
                            <th data-ordering="false">Chức vụ</th>
                            {{-- <th data-ordering="false">Địa chỉ</th> --}}
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                            value="option1">
                                    </div>
                                </th>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->role }}</td>
                                {{-- <td>Joseph Parker</td> --}}
                                <td>
                                    <div class="form-check form-switch form-switch-md mb-3 d-flex justify-content-center"
                                        dir="ltr">
                                        <input type="checkbox" class="form-check-input customSwitchsizemds"
                                            id="customSwitchsizemd" @checked($item->status)
                                            data-id='{{ $item->id }}'>
                                    </div>
                                </td>
                                {{-- <td><span class="badge bg-danger">High</span></td> --}}
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="#!" class="dropdown-item"><i
                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                            </li>
                                            <li><a href="{{ route('user.edit', $item->id) }}"
                                                    class="dropdown-item edit-item-btn"><i
                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Edit</a></li>
                                            <li>
                                                <a class="dropdown-item remove-item-btn">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!--end col-->
    <!--end row-->
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.customSwitchsizemds').on('change', function() {
                let $this = $(this);
                let userId = $(this).data('id');
                if (userId) {
                    $.ajax({
                        url: '/user/' + userId,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _method: 'DELETE',
                            status: $(this).is(':checked')? 1 : 0,
                            _token: '{{ csrf_token() }}',
                            id: userId,
                        },
                        success: function(data) {
                            if(data.success){
                                alert('Cập nhật thành công!');
                                $this.prop('checked', data.status == true);
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
