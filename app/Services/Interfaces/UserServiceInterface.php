<?php

namespace App\Services\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface UserServiceInterface extends BaseServiceInterface
{
   public function deleteUser($id,$status);
}
