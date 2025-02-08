@extends('backend.layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Sửa người dùng</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Người dùng</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 bg-white p-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data" method="POST">
                @method('PUT')
                @csrf
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="nameInput" class="form-label">Họ và tên</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" id="nameInput" placeholder="Nhập họ và tên"
                            value="{{ $user->name }}" name="name">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="leaveemails" class="form-label">Email</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" id="leaveemails" placeholder="Nhập email"
                            value="{{ $user->email }}" name="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="websiteUrl" class="form-label">Mật khẩu hiện tại</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password-old" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="websiteUrl" class="form-label">Mật khẩu mới</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="password" class="form-control" id="websiteUrl" placeholder="Nhập mật khẩu"
                            name="password">
                    </div>
                </div>
               
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="dateInput" class="form-label">Ngày sinh</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="date" class="form-control"  value="{{ Carbon\Carbon::parse($user->birthday)->format('d/m/Y')  }}"
                            name="birthday">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="contactNumber" class="form-label">Số điện thoại</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="number" class="form-control" id="contactNumber" placeholder="+91 9876543210"
                            value="{{ $user->phone }}" name="phone">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="contactNumber" class="form-label">Chức vụ</label>
                    </div>
                    <div class="col-lg-9">
                        <select class="form-select mb-3" aria-label=".form-select-lg example" name="role">
                            <option value="customer" @checked($user->role == 'customer')>Khách hàng</option>
                            <option value="contributor" @checked($user->role == 'contributor')>Cộng tác viên</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="contactNumber" class="form-label">Ảnh đại diện</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="provices" class="form-label">Thành phố</label>
                        <select class="form-select mb-3" aria-label=".form-select-lg example" name="province_code"
                            id="province">

                            @foreach ($provinces as $province)
                                <option value="{{ $province->code }}" @checked($user->province_code == $province->code)>{{ $province->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label">Huyện\Quận</label>
                        <select class="form-select mb-3" aria-label=".form-select-lg example" name="district_code"
                            id="district">
                            @foreach ($districts as $item)
                                <option value="{{ $item->code }}" @checked($user->district_code == $item->code)>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="provices" class="form-label">Thị xã</label>
                        <select class="form-select mb-3" aria-label=".form-select-lg example" name="ward_code"
                            id="ward">
                            @foreach ($wards as $item)
                                <option value="{{ $item->code }}" @checked($user->ward_code == $item->code)>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="contactNumber" class="form-label">Trạng thái</label>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd" @checked($user->status)>
                            <input type="hidden" name="status" id="status" value="1">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="" class="form-label">Mô tả</label>
                    </div>
                    <div class="col-lg-9">
                        <textarea name="description" id="" class="form-control" rows="3">{{$user->description}}</textarea>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let selecteDistricts = "{{$user->district_code ??''}}"
            let selectedWard = "{{ $user->ward_code ?? '' }}";
            
            $('#customSwitchsizemd').on('change', function() {
                $('#status').val(this.checked ? '1' : '0');
            });
            // Khi chọn Tỉnh/Thành phố
            $('#province').on('change', function() {
                var province_code = $(this).val();
                if (province_code) {
                    $.ajax({
                        url: '/get-districts/' + province_code,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#district').empty().append(
                                '<option value="">Chọn Huyện/Quận</option>');
                            $('#ward').empty().append(
                                '<option value="">Chọn Thị xã</option>'); // Reset Ward
                            $.each(data, function(key, value) {
                                $('#district').append('<option value="' + value.code +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#district, #ward').empty().append('<option value="">Chọn</option>');
                }
            });

            // Khi chọn Huyện/Quận
            $('#district').on('change', function() {
                var district_code = $(this).val();
                if (district_code) {
                    $.ajax({
                        url: '/get-wards/' + district_code,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#ward').empty().append('<option value="">Chọn Thị xã</option>');
                            $.each(data, function(key, value) {
                                $('#ward').append('<option value="' + value.code +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#ward').empty().append('<option value="">Chọn</option>');
                }
            });
        });
    </script>
@endsection
