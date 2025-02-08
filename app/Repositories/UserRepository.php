<?php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function findByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }
    public function deleteUser($id, $status){
        $model = $this->findById($id);
        $model->update(['status' => $status]);
        return $model;
    }
}
