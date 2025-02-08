<?php

namespace App\Http\Requests\Backend\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->segment(2);
        return [
            'name'          => 'sometimes|string|max:255',
            'email'         => 'sometimes|email|unique:users,email,' .  $userId,
            'password'      => 'nullable|string|min:6',
            'status'        => 'sometimes',
            'phone'         => 'nullable|regex:/^0[0-9]{9}$/',
            'birthday'      => 'nullable|date|before:today',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description'   => 'nullable|string|max:500',
            'ward_code'     => 'sometimes|exists:wards,code',
            'district_code' => 'sometimes|exists:districts,code',
            'province_code' => 'sometimes|exists:provinces,code',
            'role'          => 'required|in:admin,customer,contributor',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'          => 'Tên là bắt buộc.',
            'name.string'            => 'Tên phải là chuỗi ký tự.',
            'name.max'               => 'Tên không được vượt quá 255 ký tự.',

            'email.required'         => 'Email là bắt buộc.',
            'email.email'            => 'Email không hợp lệ.',
            'email.unique'           => 'Email đã tồn tại trong hệ thống.',

            'password.required'      => 'Mật khẩu là bắt buộc.',
            'password.string'        => 'Mật khẩu phải là chuỗi.',
            'password.min'           => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed'     => 'Mật khẩu xác nhận không khớp.',

            'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu.',
            'password_confirmation.string'   => 'Mật khẩu xác nhận phải là chuỗi.',
            'password_confirmation.min'      => 'Mật khẩu xác nhận phải có ít nhất 6 ký tự.',

            'status.required'        => 'Trạng thái là bắt buộc.',

            'phone.required'         => 'Số điện thoại là bắt buộc.',
            'phone.regex'            => 'Số điện thoại không hợp lệ. Phải bắt đầu bằng 0 và có 10 chữ số.',

            'birthday.date'          => 'Ngày sinh không hợp lệ.',
            'birthday.before'        => 'Ngày sinh phải trước ngày hôm nay.',

            'image.image'            => 'Ảnh không hợp lệ.',
            'image.mimes'            => 'Ảnh phải có định dạng jpeg, png, jpg, gif.',
            'image.max'              => 'Ảnh không được lớn hơn 2MB.',

            'description.string'     => 'Mô tả phải là chuỗi ký tự.',
            'description.max'        => 'Mô tả không được vượt quá 500 ký tự.',

            'ward_code.required'     => 'Xã/Phường là bắt buộc.',
            'ward_code.exists'       => 'Xã/Phường không tồn tại.',

            'district_code.required' => 'Quận/Huyện là bắt buộc.',
            'district_code.exists'   => 'Quận/Huyện không tồn tại.',

            'province_code.required' => 'Tỉnh/Thành phố là bắt buộc.',
            'province_code.exists'   => 'Tỉnh/Thành phố không tồn tại.',

            'role.required'          => 'Vai trò là bắt buộc.',
            'role.in'                => 'Vai trò không hợp lệ (chỉ nhận customer, editor).',
        ];
    }
}
