<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
/**
 * Class UserService
 * @package App\Services
 */
class UserService extends BaseService implements UserServiceInterface
{
    public function __construct(UserRepositoryInterface $userRepository)
    {
        parent::__construct($userRepository);
    }
    public function getAll()
    {
        return $this->repository->getAll();
    }
    public function create(array $data)
    {
        DB::beginTransaction();
        try {
            unset($data['password_confirmation']);
            // Mã hóa mật khẩu trước khi lưu
            $data['password'] = Hash::make($data['password']);
            // Tạo user
            $user = $this->repository->create($data);
            DB::commit();
            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception("Lỗi khi tạo người dùng: " . $e->getMessage());
        }
    }
    public function update($id, $data){
        DB::beginTransaction();
        try {
            // Mã hóa mật khẩu trước khi lưu
            $data['password'] = Hash::make($data['password']);
            // Tạo user
            $user = $this->repository->update($id, $data);
            DB::commit();
            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception("Lỗi khi sửa người dùng: " . $e->getMessage());
        }
    }

    public function deleteUser($id, $staus){
        DB::beginTransaction();
        try {
            // Tạo user
            $user = $this->repository->deleteUser($id, $staus);
            DB::commit();
            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception("Lỗi khi sửa người dùng: " . $e->getMessage());
        }
    }
}
